<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'discover_the_key');

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

if (!isset($_SESSION['nivel'])) {
    $_SESSION['nivel'] = 1;
}

$resposta = $_POST['resposta'];
$nivel = $_SESSION['nivel'];

if ($nivel == 1) {
    if ($resposta == 'Level 1') {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = true;
        $stmt->execute();
        header("Location: nivel2.php");
    } else {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = false;
        $stmt->execute();
        echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='index.php';</script>";
    }
} elseif ($nivel == 2) {
    if ($resposta == 'Esses RECORDES OLÍMPICOS nunca vão ser quebrados') {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = true;
        $stmt->execute();
        header("Location: vitoria.php");
    } else {
        $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $nivel, $resposta, $correta);
        $correta = false;
        $stmt->execute();
        if (strpos($resposta, 'watch?v=SJEeo1WmcVw&t=3s') !== false) {
            $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $nivel, $resposta, $correta);
            $correta = false;
            $stmt->execute();
            echo "<script>alert('YT'); window.location.href='nivel2.php';</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO tentativas (nivel, resposta, correta) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $nivel, $resposta, $correta);
            $correta = false;
            $stmt->execute();
            echo "<script>alert('Boa ideia, mas a resposta não é essa, tente novamente'); window.location.href='nivel2.php';</script>";
        }
    }
}

$conn->close();
