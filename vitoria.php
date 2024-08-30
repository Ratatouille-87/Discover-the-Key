<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Vitória!</title>
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
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
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
            padding: 20px;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInBounce 3s forwards;
        }

        p {
            font-size: 1.5em;
            opacity: 0;
            animation: fadeInBounce 3s 1s forwards;
        }

        @keyframes fadeInBounce {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            50% {
                opacity: 0.7;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Contêiner para estrelas -->
    <div class="stars">
        <?php for ($i = 0; $i < 100; $i++): ?>
            <div class="star"></div>
        <?php endfor; ?>
    </div>

    <!-- Conteúdo centralizado -->
<body id="vitoria">
<input type="hidden" name="nivel" value="0">
    <div>
        <h1>Parabéns! Você venceu o jogo!</h1>
    </div>
</body>
</html>

