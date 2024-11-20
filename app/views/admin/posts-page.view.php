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
    <title>Admin | Posts Page</title>
  </head>
  <body>
    <div id="tela"></div>

  <!-- modal criar -->
  <?php include "adm-post-create.php"; ?>
  <!-- fim modal criar -->

   <?php foreach ($posts as $post) : ?>

    <!-- modal editar -->
      <?php include "adm-post-edit.php"; ?>
    <!-- fim moidal editar -->
  
    
    <div class="modal" id="modalVisu<?= $post->id ?>">
      <form>
        <h2>Preencha todos os campos abaixo para criar post:</h2>
        <div class="inputModal">
          <label for="Título2">Título da receita</label
          ><input id="Título2" type="text" value="<?= $post->title ?>" disabled/>
        </div>
        <div class="auxSubForm">
          <div class="subForm">
            <div class="inputModal" id="autor2">
              <label for="Autor2">Autor</label><input id="Autor2" type="text" value="<?= $post->author ?>"disabled />
            </div>
            <div class="inputModal" id="tempo2">
              <label for="Tempo2">Tempo</label><input id="Tempo2" type="text" value="<?= $post->time ?>"disabled />
            </div>
          </div>
          <div class="subForm">
          <div class="inputModal" id="custo">
              <label for="Custo">Custo</label>
              <select id="Custo" disabled>
                <?php if($post->cost == 0) :?>
                <option value="0" selected>Barato</option>
                <?php endif ?>
                <?php if($post->cost == 1) :?>
                <option value="1" selected>Intermediário</option>
                <?php endif ?>
                <?php if ($post->cost == 2) :?>
                <option value="2" selected>Caro</option>
                <?php endif ?>
              </select>
            </div>
            <div class="inputModal" id="dificuldade2">
              <label for="Dificuldade2">Dificuldade</label
              ><select id="Dificuldade2" disabled>
              <?php if($post->difficulty == 0) :?>
                <option value="0" selected>Fácil</option>
                <?php endif ?>
                <?php if($post->difficulty == 1) :?>
                <option value="1" selected>Médio</option>
                <?php endif ?>
                <?php if ($post->difficulty == 2) :?>
                <option value="2" selected>Difícil</option>
                <?php endif ?>
              </select>
            </div>
          </div>
        </div>


        <div class="inputModal">
          <label for="Ingredientes">Ingredientes</label>
          <input id="ingredienteInput" type="text" />
        </div>
        <ul id="ingredientesListView<?= $post->id ; ?>"></ul>
        <input type="hidden" id="ingredientes" name="ingredientes" />


        <div class="inputModal">
          <label for="Modo2">Modo de preparo</label
          ><textarea id="Modo2" rows="3" disabled><?= $post->prepare ?></textarea>
        </div>
        <div class="inputModal">
          <label for="História2">História</label
          ><textarea id="História2" rows="3" disabled><?= $post->history ?></textarea>
        </div>
        <div class="inputModal" id="imgEnviada">
          <label for="Imagem">Imagem</label
          ><img src="/public/assets/cake.png" value="<?= $post->image ?>"/>
        </div>
        <div class="btnf">
          <button class="btnfechar" onclick="closeModal('modalCriar')">
            Fechar
          </button>
        </div>
      </form>
    </div>

    <!-------------- Modal Excluir ------------------>

    <div class="modall modal-del" id="modalDel<?= $post->id ?>">
      <div class="modal-content excluir">
        <h1>Excluir Usuario</h1>
        <img src="../../../public/assets/trash.png" />

        <p>Tem certeza que deseja excluir este usuario?</p>
        <form action="posts-list/delete" method="POST">
          <input type="hidden" name="idDelete" value="<?= $post->id ?>">
          <div id="btCC">
            <button class="canc" type="button" onclick="closeModal('modalDel<?= $post->id ?>')">
              Cancelar
            </button>
            <button class="exc" type="submit">Excluir</button>
          </div>
        </form>
      </div>
    </div>

    <?php endforeach; ?>

    <!-------------- Fim Modal Excluir ------------------>

    <div class="container">
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
              <?php foreach ($posts as $post):?>
              <tr class="linha-comum">
                <td class="celula-id"><?= $post->id?></td>
                <td class="celula-titulo"><?= $post->title?></td>
                <td class="celula-autor"><?= $post->author?></td>
                <td class="celula-data"><?= $post->date?></td>
                <td class="celula-acoes">
                  <div class="square" onclick='openModal("modalVisu<?= $post->id ?>", "view", <?= $post->ingredients ?>, <?= $post->id ?>)'>
                    <img class="view" src="/public/assets/view.svg" alt="" />
                  </div>
                  <div class="square" onclick='openModal("modalEditar<?= $post->id ?>", "edit", <?= $post->ingredients ?>, <?= $post->id ?>)'>
                    <img class="edit" src="/public/assets/edit.svg" alt="" />
                  </div>
                  <div class="square" onclick="openModal('modalDel<?= $post->id ?>')">
                    <img
                      class="delete"
                      src="/public/assets/delete.svg"
                      alt=""
                    />
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="bottom">
          <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
          </div>
        </div>
      </div>
    </div>

    <script src="/public/js/adm-tabela-posts.js"></script>
  </body>
</html>
