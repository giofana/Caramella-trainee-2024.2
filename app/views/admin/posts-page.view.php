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
    <div class="modal" id="modalCriar">
      <form>
        <h2>Preencha todos os campos abaixo para criar post:</h2>
        <div class="inputModal">
          <label for="Título">Título da receita</label
          ><input id="Título" type="text" />
        </div>
        <div class="auxSubForm">
          <div class="subForm">
            <div class="inputModal" id="autor">
              <label for="Autor">Autor</label><input id="Autor" type="text" />
            </div>
            <div class="inputModal" id="tempo">
              <label for="Tempo">Tempo</label><input id="Tempo" type="text" />
            </div>
          </div>
          <div class="subForm">
            <div class="inputModal" id="custo">
              <label for="Custo">Custo</label>
              <select id="Custo">
                <option value="#" selected></option>
                <option value="0">Barato</option>
                <option value="1">Intermediário</option>
                <option value="2">Caro</option>
              </select>
            </div>
            <div class="inputModal" id="dificuldade">
              <label for="Dificuldade">Dificuldade</label
              ><select id="Dificuldade">
                <option value="#" selected></option>
                <option value="0">Fácil</option>
                <option value="1">Médio</option>
                <option value="2">Difícil</option>
              </select>
            </div>
          </div>
        </div>
        <div class="inputModal">
          <label for="Ingredientes">Ingredientes</label>
          <input id="ingredienteInput" type="text" />

          <div class="btt-ingredient">
            <button
              type="button"
              onclick="addIngredient()"
              id="create-ingredient"
            >
              Adicionar Ingrediente
            </button>

            <button
              type="button"
              onclick="deleteLastIngredient()"
              id="delete-ingredient"
              style="display: none"
            >
              Deletar último ingrediente
            </button>
          </div>
        </div>
        <ul id="ingredientesList"></ul>
        <input type="hidden" id="ingredientes" name="ingredientes" />

        <div class="inputModal">
          <label for="Modo">Modo de preparo</label
          ><textarea id="Modo" rows="3"></textarea>
        </div>
        <div class="inputModal">
          <label for="História">História</label
          ><textarea id="História" rows="3"></textarea>
        </div>
        <div class="inputModal">
          <label for="Imagem">Imagem</label><input id="Imagem" type="file" />
        </div>
        <div id="btCC">
          <button>Criar</button>
          <button onclick="closeModal('modalCriar')">Cancelar</button>
        </div>
      </form>
    </div>

    <div class="modal" id="modalEditar">
      <form action="posts-list/edit-post" method="POST">
        <?php foreach ($posts as $post) : ?>
        <h2>Preencha todos os campos abaixo para criar post:</h2>
        <div class="inputModal">
          <label for="Título1">Título da receita</label
          ><input id="Título1" type="text" name="editTitulo" value="<?= $post->title ?>"/>
        </div>
        <div class="auxSubForm">
          <div class="subForm">
            <div class="inputModal" id="autor1">
              <label for="Autor1">Autor</label><input id="Autor1" type="text" name="editAutor" value="<?= $post->author ?>" />
            </div>
            <div class="inputModal" id="tempo1">
              <label for="Tempo1">Tempo</label><input id="Tempo1" type="text" name="editTempo" value="<?= $post->time ?>" />
            </div>
          </div>
          <div class="subForm">
          <div class="inputModal" id="custo">
              <label for="Custo">Custo</label>
              <select id="Custo" name="editCusto">
                <?php if($post->cost == 0) :?>
                <option value="0" selected>Barato</option>
                <option value="1">Intermediário</option>
                <option value="2">Caro</option>
                <?php endif ?>
                <?php if($post->cost == 1) :?>
                <option value="0">Barato</option>
                <option value="1" selected>Intermediário</option>
                <option value="2">Caro</option>
                <?php endif ?>
                <?php if ($post->cost == 2) :?>
                <option value="0">Barato</option>
                <option value="1">Intermediário</option>
                <option value="2" selected>Caro</option>
                <?php endif ?>
              </select>
            </div>
            <div class="inputModal" id="dificuldade1">
              <label for="Dificuldade1">Dificuldade</label
              ><select id="Dificuldade1" name="editDificuldade">
              <?php if($post->difficulty == 0) :?>
                <option value="0" selected>Fácil</option>
                <option value="1">Médio</option>
                <option value="2">Difícil</option>
                <?php endif ?>
                <?php if($post->difficulty == 1) :?>
                <option value="0">Fácil</option>
                <option value="1" selected>Médio</option>
                <option value="2">Difícil</option>
                <?php endif ?>
                <?php if($post->difficulty == 2) :?>
                <option value="0">Fácil</option>
                <option value="1">Médio</option>
                <option value="2" selected>Difícil</option>
                <?php endif ?>
              </select>
            </div>
          </div>
        </div>

        <div class="inputModal">
          <label for="Ingredientes">Ingredientes</label>
          <input id="ingredienteInput" type="text" />

          <div class="btt-ingredient">
            <button
              type="button"
              onclick="addIngredient()"
              id="create-ingredient"
            >
              Adicionar Ingrediente
            </button>

            <button
              type="button"
              onclick="deleteLastIngredient()"
              id="delete-ingredient"
              style="display: none"
            >
              Deletar último ingrediente
            </button>
          </div>
        </div>
        <ul id="ingredientesList"></ul>
        <input type="hidden" id="ingredientes" name="ingredientes" />
        
        <div class="inputModal">
          <label for="Modo1">Modo de preparo</label
          ><textarea id="Modo1" rows="3" name="editPreparo"><?= $post->prepare ?></textarea>
        </div>
        <div class="inputModal">
          <label for="História1">História</label
          ><textarea id="História1" rows="3" name="editHistoria"><?= $post->history ?></textarea>
        </div>
        <div class="inputModal">
          <label for="Imagem1">Imagem</label><input id="Imagem1" type="file" name="editImagem" value="<?= $post->image ?>" />
        </div>
        <input type="hidden" name="editId" value="<?= $post->id ?>">
        <div id="btCC">
          <button type="submit">Editar</button>
          <button onclick="closeModal('modalCriar')">Cancelar</button>
        </div>
        <?php endforeach; ?>
      </form>
    </div>

    <div class="modal" id="modalVisu">
      <form>
        <?php foreach ($posts as $post) : ?>
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

          <div class="btt-ingredient">
            <button
              type="button"
              onclick="addIngredient()"
              id="create-ingredient"
            >
              Adicionar Ingrediente
            </button>

            <button
              type="button"
              onclick="deleteLastIngredient()"
              id="delete-ingredient"
              style="display: none"
            >
              Deletar último ingrediente
            </button>
          </div>
        </div>
        <ul id="ingredientesList"></ul>
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
        <?php endforeach; ?>
      </form>
    </div>

    <!-------------- Modal Excluir ------------------>

    <div class="modall modal-del" id="modalDel">
      <div class="modal-content excluir">
        <h1>Excluir Usuario</h1>
        <img src="../../../public/assets/trash.png" />

        <p>Tem certeza que deseja excluir este usuario?</p>
        <form action="posts-list/delete" method="POST">
          <?php foreach ($posts as $post): ?>
          <input type="hidden" name="idDelete" value="<?= $post->id ?>">
          <div id="btCC">
            <button class="canc" onclick="closeModal('modalDel')">
              Cancelar
            </button>
            <button class="exc" type="submit">Excluir</button>
          </div>
          <?php endforeach; ?>
        </form>
      </div>
    </div>
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
                  <div class="square" onclick="openModal('modalVisu')">
                    <img class="view" src="/public/assets/view.svg" alt="" />
                  </div>
                  <div class="square" onclick="openModal('modalEditar')">
                    <img class="edit" src="/public/assets/edit.svg" alt="" />
                  </div>
                  <div class="square" onclick="openModal('modalDel')">
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
