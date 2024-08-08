<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nível 1</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body id="nivel1">
    <div>
        <h1>Level 1</h1>
        <form method="POST" action="verificar.php">
            <input type="text" name="resposta" placeholder="Digite a resposta">
            <button type="submit" name="submit">Confirmar</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $resposta = $_POST['resposta'];
            if (strtolower($resposta) === 'Level 1') {
                header("Location: nivel2.php");
                exit();
            } else {
                echo "<p>Boa ideia, mas a resposta não é essa, tente novamente</p>";
            }
        }
        ?>
        <p class="frase-binaria">01001100 01100101 01110110 01100101 01101100 00100000 00110001</p>
    </div>
</body>
</html>
