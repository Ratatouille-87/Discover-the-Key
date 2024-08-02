<?php
session_start();
$conn = new mysqli('localhost', 'username', 'password', 'discover_the_key');

if ($conn->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$resposta = $_POST['resposta'];
$nivel = $_SESSION['nivel'];

if ($nivel == 1) {
    if ($resposta == 'Level 1') {
        $_SESSION['nivel'] = 2;
        header("Location: nivel2.php");
    } else {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = 0;
        $stmt->execute();
        echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='index.php';</script>";
    }
} elseif ($nivel == 2) {
    if ($resposta == 'How to Solve Caesar Cipher') { // título do vídeo
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = 1;
        $stmt->execute();
        header("Location: vitoria.php");
    } else {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = 0;
        $stmt->execute();
        if (strpos($resposta, 'youtube.com/watch') !== false) {
            echo "<script>alert('YT'); window.location.href='nivel2.php';</script>";
        } else {
            echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='nivel2.php';</script>";
        }
    }
}

$conn->close();
?>
