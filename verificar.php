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
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("iss", $nivel, $resposta, $correta);
    $stmt->execute();
    header("Location: nivel2");
    exit();
} elseif ($nivel == 2 && $resposta === strtolower('Esses RECORDES OLÍMPICOS nunca vão ser quebrados')) {
    $correta = true;
    $_SESSION['nivel'] = 0;
    $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("iss", $nivel, $resposta, $correta);
    $stmt->execute();
    header("Location: vitoria");
    exit();
} else {
    // Registro de tentativa incorreta
    $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("iss", $nivel, $resposta, $correta);
    $stmt->execute();

    // Redirecionamento com mensagem de erro
    if ($nivel == 1) {
        echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='nivel1';</script>";
    } elseif ($nivel == 2) {
        echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='nivel2';</script>";
    }
    exit();
}

$conn->close();
