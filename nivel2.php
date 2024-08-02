<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nível 2</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body id="nivel2">
    <div>
        <h1>ycvej?x=ULGgq1YoeXy</h1>
        <form method="POST" action="verificar.php">
            <input type="text" name="resposta" placeholder="Digite a resposta">
            <button type="submit">Confirmar</button>
        </form>
        <?php
    if (isset($_POST['submit'])) {
        $resposta = $_POST['resposta'];
        if (strtolower($resposta) === 'Esses RECORDES OLÍMPICOS nunca vão ser quebrados') {
            header("Location: vitoria.php");
            exit();
        } else {
            echo "<p>Boa ideia, mas a resposta não é essa, tente novamente</p>";
        }
    }
    ?>
        <img src="https://aventurasnahistoria.com.br/media/uploads/1c442ae541.jpg" alt="Imperador César">
    </div>
</body>
</html>
