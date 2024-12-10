<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/visu-indivi.css">
    <title>Caramella</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../public/assets/icon-logo.png" type="image/png">
</head>

<body>

<?php include "navbar.php"; ?>

<div class="receitas">
    <?php foreach ($posts as $post): ?>
        <div class="img_receita">
            <?php if ($post->image != ""): ?>
                <img src="<?= $post->image ?>" alt="Imagem da receita">
            <?php else: ?>
                <img src="../../../public/assets/no-image.png" alt="Imagem não disponível">
            <?php endif; ?>
        </div>

        <div class="inf_post">
            <div>
                <h2><?= $post->title ?></h2>
                <div class="t1">
                    <p>Por: <?= $post->author ?></p>
                    <p><?= date("d/m/Y", strtotime($post->date)) ?></p> 
                </div>
                <div class="t2">
                    <p>Dificuldade: <strong><?= $post->difficulty == 0 ? 'Fácil' : ($post->difficulty == 1 ? 'Médio' : 'Difícil') ?></strong></p>
                    <p>Tempo: <strong><?= $post->time ?> Min</strong></p>
                    <p>Custo: <strong><?= $post->cost == 0 ? 'Barato' : ($post->cost == 1 ? 'Intermediário' : 'Caro') ?></strong></p>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="inf_receitas">
        
        <div class="ingredientes">
            <h2>Ingredientes:</h2>
            
            <?php
            $ingredientesList = json_decode($post->ingredients);
            foreach ($ingredientesList as $ingrediente):
            ?>
                <div class="mp">
                    <div class="cb">
                        <div><input type="checkbox"></div>
                        <div><label><?= trim($ingrediente) ?></label></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="modoprepa">
            <ol>                
                <h2>Modo de Preparo:</h2>
                <div class="mop">
                    <?php
                    $modo_preparo = explode("\n", $post->prepare);
                    foreach ($modo_preparo as $passo):
                    ?>
                        <li><?= nl2br(trim($passo)) ?></li>
                    <?php endforeach; ?>
                </div>
            </ol>
        </div>
        
        <div class="hist">
            <h2>História</h2>
            <div class="histp">
                <p><?= $post->history ?></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    
    <div class="VMR">
            <button onclick="window.location.href='/posts';" type="submit">Veja mais Receitas</button>
    </div>

    <?php include 'C:/Users/guilh/Desktop/Antigo PC/crml/Caramella-trainee-2024.2/app/views/site/footer.view.php';
 ?>

</body>
</html>