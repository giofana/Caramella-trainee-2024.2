<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Caramella</title>
    <link rel="stylesheet" href="../../../public/css/posts-page-user.css" />
  </head>
  <body>

  <?php include "navbar.php"; ?>

    <div class="search-bar">
      <form action="/posts" method="GET">
        <input type="text" name="search" placeholder="Buscar" class="txt-search" value="<?= htmlspecialchars($search) ?>" />
      </form>
    </div>
    
    <div class="post-container">
      <?php 
      $cont = $startPage + 1;
      foreach ($posts as $post): ?>
        <a href="?id-post=<?= $post->id ?>" class="post-box">
          <div class="post-title"><?= $post->title ?></div>
          <img src="<?= $post->image ?>" alt="Imagem do post" class="post-img" />
          <div class="post-description">
            <p class="description">
              <?= strlen($post->history) > 150 ? substr($post->history, 0, 150) . "..." : $post->history ?>
            </p>
          </div>
          <div class="author">
            <img src="../../../public/assets/author-icon.png" alt="author-icon" />
            <p class="author-name"><?= $post->author ?></p>
          </div>
        </a>
      <?php endforeach ?>
    </div>

    <div class="pagination">
      <a class="page-previous<?= $page <= 1 ? " disabled" : "" ?>" href="?paginaLista=<?= $page - 1 ?>">&laquo;</a>
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a class="link_pagination <?= $i == $page ? "active" : "" ?>" href="?paginaLista=<?= $i ?>"><?= $i ?></a>
      <?php endfor ?>
      <a class="page-next<?= $page >= $total_pages ? " disabled" : "" ?>" href="?paginaLista=<?= $page + 1 ?>">&raquo;</a>
    </div>

  </body>
</html>