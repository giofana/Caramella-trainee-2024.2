<?php use App\Core\App; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/posts-page.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Admin | Posts Table</title>
    <link rel="icon" type="image/png" href="/public/assets/posts.png" />
  </head>
  <body>
    <div class="container">
      <?php include "sidebar.view.php"; ?>

      <div class="content-container">
        <div class="card">
          <div class="top">
            <p style="font-family: Abril Fatface" class="texto-sombra">
              Tabela de Posts
            </p>

            <div class="botao-criar">
              <button
                class="button"
                onclick="openModal('modalCriar')"
                id="openModalCriar"
              >
                <img src="../../../public/assets/add.png" />
              </button>
            </div>
          </div>
          <div class="center">
            <table class="tabela">
              <thead>
                <tr class="linha-header">
                  <th class="celula-id" style="font-weight: normal">ID</th>
                  <th class="celula-titulo" style="font-weight: normal">
                    TÍTULO
                  </th>
                  <th class="celula-autor" style="font-weight: normal">AUTOR</th>
                  <th class="celula-data" style="font-weight: normal">DATA</th>
                  <th class="celula-acoes" style="font-weight: normal">AÇÕES</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $cont = $startPage + 1;
                foreach ($posts as $post):?>
                <tr class="linha-comum">
                  <td class="celula-id"><?= $cont++ ?></td>
                  <td class="celula-titulo">
                      <?= strlen($post->title) > 10 ? substr($post->title, 0, 10) . "..." : $post->title ?>
                  </td>
                  <td class="celula-autor"><?= App::get('database')->select('users', $post->author)[0]->name?></td>
                  <td class="celula-data"><?php $date=new DateTime($post->date); echo $date->format('d/m/Y');?></td>
                  <td class="celula-acoes">
                    <div class="square" onclick='openModal("modalVisu<?= $post->id ?>", "view", <?= $post->ingredients ?>, <?= $post->id ?>)'>
                    <img class='view' src="../../../public/assets/visu.png" />
                    </div>
                    <div class="square" onclick='openModal("modalEditar<?= $post->id ?>", "edit", <?= $post->ingredients ?>, <?= $post->id ?>)'>
                    <img class='edit' src="../../../public/assets/edit.png" />
                    </div>
                    <div class="square" onclick="openModal('modalDel<?= $post->id ?>')">
                      <img class='delete' src="../../../public/assets/lixo.png" />
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="bottom">
            <div class="pagination">
              <a class="page-previous<?= $page <= 1 ? " disabled" : "" ?>" href="?paginaLista=<?= $page - 1 ?>">&laquo;</a>

              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a class="link_pagination <?= $i == $page ? "active" : "" ?>" href="?paginaLista=<?=$i ?>"><?= $i ?></a>
              <?php endfor ?>

              <a class="page-next<?= $page >= $total_pages ? " disabled" : "" ?>" href="?paginaLista=<?= $page + 1 ?>">&raquo;</a>
            </div>
          </div>  
        </div>
      </div>
    </div>

    <!-- modal criar -->
    <?php include "adm-post-create.php"; ?>
    <!-- fim modal criar -->

    <?php foreach ($posts as $post) : ?>
      <!-- modal editar -->
      <?php include "adm-post-edit.php"; ?>
      <!-- fim modal editar -->
    
      <!-- modal view -->
      <?php include "adm-post-view.php"; ?>
      <!-- fim modal view-->

      <!-- modal excluir -->
      <?php include "adm-post-delete.php"; ?>
      <!-- fim modal excluir -->
    <?php endforeach; ?>

    <script src="/public/js/adm-tabela-posts.js"></script>
  </body>
</html>