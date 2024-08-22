<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'discover_the_key');

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

// Verifique se o campo 'nivel' está presente no $_POST
if (!isset($_POST['nivel'])) {
    die('Erro: Nível não definido. Por favor, tente novamente.');
}

$nivel = $_POST['nivel'];
$resposta = strtolower(trim($_POST['resposta']));
$correta = false;

// Verificação das respostas
if ($nivel == 1 && $resposta === strtolower('Level 1')) {
    $correta = true;
    $_SESSION['nivel'] = 2;
    $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $nivel, $resposta, $correta);
    $stmt->execute();
    header("Location: nivel2.php");
    exit();
} elseif ($nivel == 2 && $resposta === strtolower('Esses RECORDES OLÍMPICOS nunca vão ser quebrados')) {
    $correta = true;
    $_SESSION['nivel'] = 0;
    $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $nivel, $resposta, $correta);
    $stmt->execute();
    header("Location: vitoria.php");
    exit();
} else {
    // Registro de tentativa incorreta
    $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $nivel, $resposta, $correta);
    $stmt->execute();

    // Redirecionamento com mensagem de erro
    if ($nivel == 1) {
        header("Location: index.php?erro=1");
    } elseif ($nivel == 2) {
        header("Location: nivel2.php?erro=1");
    }
    exit();
}

$conn->close();
