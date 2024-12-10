<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caramella - Home</title>
    <link rel="stylesheet" href="/public/css/landing-page.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>

<body>

    <!-------------------------------------NAVBAR---------------------------------->

    <?php include "navbar.php"; ?>

    <!-------------------------------------FIM-NAVBAR---------------------------------->

    <!-----------------------------------------BANNER------------------------------------>
    <div id="banner">
        <h2>CONHEÇA O LADO MAIS DOCE DA VIDA</h2>
        <p>Fique à vontade para ver nossas receitas, dicas e histórias de vida.</p>
        <button>Ver mais</button>
    </div>
    <!-----------------------------------------FIM BANNER------------------------------------>

    <!-----------------------------------------POST-ROWS------------------------------------>
    <div id="classificacao-posts">
        <h2>ÚLTIMOS POSTS</h2>
        <div id="post-row">

            <!----------------------------------------CARD DE POST------------------------------------>
            <?php for ($i = count($posts)-1; $i >= count($posts) - 5; $i = $i - 1): ?>
            <div class="posts">
                <a href="/vdpi?id-post=<?= $posts[$i]->id ?>">
                <img src="<?= $posts[$i]->image ?>" alt="">
                <h3><?= $posts[$i]->title ?></h3>
                </a>

                <?php if ($posts[$i]->difficulty == 0){
                    echo "<label>Dificuldade: <div style='color: green'>Fácil</div></label>";

                } elseif ($posts[$i]->difficulty == 1){
                    echo "<label>Dificuldade: <div style='color: orange'>Média</div></label>";

                } else{
                    echo "<label>Dificuldade: <div style='color: red'>Difícil</div></label>";

                }?>

                <?php if (strlen($posts[$i]->history) > 200): ?>
                    <p><?= substr($posts[$i]->history, 0, 200) ?>... </p>
                <?php else: ?>
                    <p><?= $posts[$i]->history; ?></p>
                <?php endif; ?>
            </div>

        <?php endfor; ?>
            <!-----------------------------------------FIM CARD DE POST------------------------------------>
        </div>
    </div>
    <!-----------------------------------------FIM POST ROWS------------------------------------>

    <!-------------------------------------FOOTER---------------------------------->

    <?php include "footer.view.php"; ?>

    <!-------------------------------------FIM-FOOTER---------------------------------->

</body>

</html>