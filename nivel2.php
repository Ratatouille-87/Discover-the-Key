<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nível 2</title>
    <style>
        /* Estilo para a animação de fundo da galáxia com estrelas */
        body {
            margin: 0;
            overflow: hidden;
            background: radial-gradient(circle at 50% 50%, #000000, #0d0d34, #3b006a, #000000);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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

        /* Estilo do conteúdo centralizado */
        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
        }

        .content img {
            max-width: 200px; /* Ajuste o tamanho da imagem conforme necessário */
            height: auto;
            margin-bottom: 20px;
        }

        .content input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 80%;
            max-width: 300px;
            margin-bottom: 10px;
        }

        .content button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .content p {
            margin-top: 10px;
        }
    </style>
</head>
<body id="nivel2">
    <!-- Contêiner para estrelas -->
    <div class="stars">
        <?php for ($i = 0; $i < 100; $i++): ?>
            <div class="star"></div>
        <?php endfor; ?>
    </div>

    <!-- Conteúdo centralizado -->
    <div class="content">
        <h1>ycvej?x=ULGgq1YoeXy</h1>
        <form method="POST" action="">
            <input type="hidden" name="nivel" value="2">
            <input type="text" name="resposta" placeholder="Digite a resposta">
            <button type="submit" name="submit">Confirmar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resposta = strtolower(trim($_POST['resposta']));
            if ($resposta === 'esses recordes olímpicos nunca vão ser quebrados') {
                header("Location: vitoria");
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
