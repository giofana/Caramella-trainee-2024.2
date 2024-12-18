<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/adm-tab-usu.css" />
    <link rel="stylesheet" href="../../../public/css/sidebar.css" />
    <title>Admin | Users Table</title>
    <link rel="icon" type="image/png" href="/public/assets/users.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <?php include "sidebar.view.php"; ?>

      <div class="content-container">
        <div class="corpo">
          <div class="topo">
            <p style="font-family: Abril Fatface" class="texto-sombra">
              Tabela de Usuários
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
          <div class="barras">
            <div class="barra1">
              <div class="id"><p>ID</p></div>
              <div class="nome"><p>NOME</p></div>
              <div class="email"><p>EMAIL</p></div>
              <div class="acoes"><p>AÇÕES</p></div>
            </div>

            <?php
            foreach($users as $user) :
            ?>
            <div class="barra2">
              <div class="idb"><p><?= $user->id ?></p></div>
              <div class="nomeb"><p><?= strlen($user->name) > 12 ? substr($user->name, 0, 12) . "..." : $user->name ?>
              </p></div>
              
              <div class="emailb"><p><?= $user->email ?></p></div>
              <div class="barra2b">
                <button
                  class="button"
                  id="openModalView"
                  onclick="openModal('modalView<?= $user->id ?>')"
                >
                  <img src="../../../public/assets/visu.png" />
                </button>
                <button
                  class="button2"
                  id="openModalEdit"
                  onclick="openModal('modalEdit-<?= $user->id ?>')"
                >
                  <img src="../../../public/assets/edit.png" />
                </button>
                <button
                  class="button3"
                  id="openModalDel"
                  onclick="openModal('modalDel-<?= $user->id ?>')"
                >
                  <img src="../../../public/assets/lixo.png" />
                </button>
              </div>
            </div>
            <?php endforeach; ?>

            <!-- paginação -->
            <div class="pagina ativo">
              <a class="pagina <?= $page <= 1 ? "disable" : "" ?>" href="?paginacaoNumero=<?= $page - 1 ?>">&laquo;</a>
              <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                <a class="pag-number <?= $page_number == $page ? "active" : "" ?>" href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a>
              <?php endfor; ?>
              <a class="pagina <?= $page >= $total_pages ? "disable" : "" ?>" href="?paginacaoNumero=<?= $page + 1 ?>">&raquo;</a>
            </div>
            <!-- fim paginação -->

            <!-- modal criar -->
            <div class="modal modal-criar" id="modalCriar">
              <div class="modal-content modal-content-criar">
                <form action="/creat" method="post">
                  <h2>Criar usuário</h2>
                  <!-- inputs do modal -->
                  <div class="input-box-create">
                    <label for="create-user-name">Nome:</label>
                    <input type="text" name="name" id="name-create-user" />
                    <label for="email-create-user">Email:</label>
                    <input type="email" name="email" id="email-create-user" />
                    <label for="password-create-user">Senha:</label>
                    <input type="password" name="password" id="password-create-user" />
                  </div>
                  <div class="button-box">
                    <button type="button" class="cancel-button" onclick="closeModal('modalCriar')">Cancelar</button>
                    <button id="criar-button">Criar</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- fim modal criar -->

            <!-- modal view -->
            <?php foreach($users as $user) : ?>
              <?php if (($_SESSION['id'] == $user->id) || (isset($_SESSION['email']) && $_SESSION['email'] == "admin@admin")): ?>
            <div class="modal modal-view modalView" id="modalView<?= $user->id ?>">
              <div class="modal-content modal-content-view">
                <form class="form-view" action="">
                  <h2>Detalhes do Usuário</h2>
                  <div class="row-view-info">
                    <label for="">Nome:</label>
                    <div class="bg-view"><label for=""><?= $user->name ?></label></div>
                  </div>
                  <div class="row-view-info">
                    <label for="">E-mail:</label>
                    <div class="bg-view"><label for=""><?= $user->email ?></label></div>
                  </div>
                  <div class="row-view-info">
                    <label for="">Senha:</label>
                    <div class="input-senha">
                      <input class="bg-view senha" id="senhaInput" type="password" value="<?= $user->password ?>" disabled>
                      <div class="view1">
                        <img src="../../../public/assets/visua.svg" alt="Visualizar senha" id="viewSenha">
                      </div>
                    </div>
                  </div>
                  <div class="button-box">
                    <button type="button" class="close-button" onclick="closeModal('modalView<?= $user->id ?>')">Fechar</button>
                  </div>
                </form>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <!-- fim modal view -->

            <!-- modal excluir -->
            
            <?php foreach ($users as $user): ?>
              <?php if (($_SESSION['id'] == $user->id) || (isset($_SESSION['email']) && $_SESSION['email'] == "admin@admin")): ?>
  <div class="modal modal-del" id="modalDel-<?= $user->id ?>">
    <div class="modal-content modal-content-del">
      <form action="/delete" method="post">
      <h2>Excluir Usuário</h2>
      <img src="../../../public/assets/trash.png" alt="Ícone de lixeira" />
      <p>Tem certeza que deseja excluir este usuário?</p>
        <input type="hidden" name="id" value="<?= $user->id ?>"> 
        <div class="button-box">
          <button
            type="button"
            class="cancel-button"
            onclick="closeModal('modalDel-<?= $user->id ?>')">
            Cancelar
          </button>
          <button
            type="submit"
            id="excluir-button-<?= $user->id ?>">
            Excluir
          </button>
        </div>
      </form>
    </div>
  </div>
  <?php endif; ?>
<?php endforeach; ?>

            <!-- fim modal excluir -->

            <!-- modal editar -->
            <?php foreach($users as $user): ?>
              <?php if (($_SESSION['id'] == $user->id) || (isset($_SESSION['email']) && $_SESSION['email'] == "admin@admin")): ?>
            <div class="modal modal-edit" id="modalEdit-<?= $user->id ?>">
              <div class="modal-content modal-content-edit">
                <form action="/edit" method="post">
                  <input type="hidden" name="id" value="<?= $user->id ?>"> <!-- Input oculto para ID -->
                  <h2>Editar usuário</h2>
                  <!-- Campos do formulário -->
                  <div class="input-box-edit">
                    <label for="edit-name-<?= $user->id ?>">Nome:</label>
                    <input type="text" id="edit-name-<?= $user->id ?>" name="name" value="<?= $user->name ?>" />
                    <label for="edit-email-<?= $user->id ?>">Email:</label>
                    <input type="email" id="edit-email-<?= $user->id ?>" name="email" value="<?= $user->email ?>" />
                    <label for="edit-password-<?= $user->id ?>">Senha:</label>
                    <input type="password" id="edit-password-<?= $user->id ?>" name="password" value="" />
                  </div>
                  <!-- Botões -->
                  <div class="button-box">
                    <button type="button" class="cancel-button" onclick="closeModal('modalEdit-<?= $user->id ?>')">Cancelar</button>
                    <button type="submit" id="save-button-<?= $user->id ?>">Salvar</button>
                  </div>
                </form>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <!-- fim modal editar -->
          </div>
        </div>
      </div>
    </div>
    <script src="/public/js/adm-tabela-usu.js"></script>
  </body>
</html>