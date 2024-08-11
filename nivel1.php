<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nível 1</title>
    <style>
        /* Estilo para a animação de fundo da galáxia com estrelas */
        body {
            margin: 0;
            overflow: hidden;
            background: radial-gradient(circle at 50% 50%, #000000, #0d0d34, #3b006a, #000000);
            height: 100vh;
            position: relative;
        }

        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            overflow: hidden;
            z-index: 1;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            opacity: 0.8;
            border-radius: 50%;
            animation: twinkle 5s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% {
                transform: scale(1);
                opacity: 0.8;
            }
            50% {
                transform: scale(1.5);
                opacity: 1;
            }
        }

        /* Geração de múltiplas estrelas */
        <?php for ($i = 0; $i < 100; $i++): ?>
            .star:nth-child(<?= $i + 1 ?>) {
                left: <?= rand(0, 100) ?>vw;
                top: <?= rand(0, 100) ?>vh;
                animation-delay: <?= rand(0, 5) ?>s;
                animation-duration: <?= rand(3, 6) ?>s;
            }
        <?php endfor; ?>
    </style>
</head>
<body>
    <!-- Contêiner para estrelas -->
    <div class="stars">
        <?php for ($i = 0; $i < 100; $i++): ?>
            <div class="star"></div>
        <?php endfor; ?>
    </div>

    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; z-index: 2;">
        <h1>Level 1</h1>
        <form method="POST" action="verificar.php">
            <input type="text" name="resposta" placeholder="Digite a resposta" style="padding: 10px; border-radius: 5px; border: none;">
            <button type="submit" name="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Confirmar</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $resposta = $_POST['resposta'];
            if (strtolower($resposta) === 'level 1') {
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
