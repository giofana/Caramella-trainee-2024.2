<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/adm-tab-usu.css" />
    <title>Caramella</title>
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
    <div class="corpo">
      <div class="topo">
        <p style="font-family: Abril Fatface" class="texto-sombra">
          Tabela de Usuarios
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

    <?php if (empty($users)): ?>
        <div class="barra2">
            <p style="text-align: center; width: 100%; color: red;">Nenhum usuário encontrado.</p>
        </div>
        <?php else: ?>
        <!-- Iterando os usuários -->
        <?php foreach ($users as $user): ?>
            <div class="barra2">
                <div class="idb"><p><?= htmlspecialchars($user->id) ?></p></div>
                <div class="nomeb"><p><?= htmlspecialchars($user->name) ?></p></div>
                <div class="emailb"><p><?= htmlspecialchars($user->email) ?></p></div>
                <div class="barra2b">
                    <button
                        class="button"
                        id="openModalView-<?= $user->id ?>"
                        onclick="openModal('modalView-<?= $user->id ?>')"
                    >
                        <img src="../../../public/assets/visu.png" />
                    </button>
                    <button
                        class="button2"
                        id="openModalEdit-<?= $user->id ?>"
                        onclick="openModal('modalEdit-<?= $user->id ?>')"
                    >
                        <img src="../../../public/assets/edit.png" />
                    </button>
                    <button
                        class="button3"
                        id="openModalDel-<?= $user->id ?>"
                        onclick="openModal('modalDel-<?= $user->id ?>')"
                    >
                        <img src="../../../public/assets/lixo.png" />
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
</div>


      <div class="pagina">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">&raquo;</a>
      </div>

      <!-- Modal de Criar -->
      <div class="modal modal-criar" id="modalCriar">
        <div class="modal-content modal-content-criar">
          <form>
            <h2>Criar usuário</h2>
            <div class="input-box-create">
              <label for="create-user-name">Nome:</label>
              <input type="text" name="" id="name-create-user" />
              <label for="email-create-user">Email:</label>
              <input type="email" id="email-create-user" />
              <label for="password-create-user">Senha:</label>
              <input type="password" name="" id="password-create-user" />
            </div>
            <div class="button-box">
              <button class="cancel-button" onclick="closeModal('modalCriar')">
                Cancelar
              </button>
              <button id="criar-button">Criar</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal de Visualização -->
      <div class="modal modal-view" id="modalView">
        <div class="modal-content modal-content-view">
          <form class="form-view" action="">
            <h2>Detalhes do Usuário</h2>
            <div class="row-view-info">
              <label for="">Nome:</label>
              <div class="bg-view"><label for="">fulano</label></div>
            </div>
            <div class="row-view-info">
              <label for="">E-mail:</label>
              <div class="bg-view"><label for="">fulano@gmail.com</label></div>
            </div>
            <div class="row-view-info">
              <label for="">Senha:</label>
              <div class="bg-view"><label for="">adminadmin</label></div>
            </div>
            <div class="button-box">
              <button class="close-button" onclick="closeModal('modalView')">
                Fechar
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal Excluir -->
      <div class="modal modal-del" id="modalDel">
        <form action="/delete" method="post">
            <div class="modal-content excluir">
                <h2>Excluir Usuário</h2>
                <img src="../../../public/assets/trash.png" alt="Ícone de lixeira" />
                <p>Tem certeza que deseja excluir este usuário?</p>
                <div class="button-box">
                    <button 
                        type="button" 
                        class="cancel-button" 
                        onclick="closeModal('modalDel')">
                        Cancelar
                    </button>
                    <button 
                        type="submit" 
                        id="excluir-button">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </div>

      <!-- Modal Editar -->
      <div class="modal modal-edit" id="modalEdit">
        <div class="modal-content modal-content-edit">
          <form>
            <h2>Editar usuário</h2>
            <div class="input-box-edit">
              <label for="edit-name">Nome:</label>
              <input type="text" id="edit-name" value="Fulano" />
              <label for="edit-email">Email:</label>
              <input type="email" id="edit-email" value="fulano@gmail.com" />
              <label for="edit-password">Senha:</label>
              <input type="password" id="edit-password" value="muitodificil" />
            </div>
            <div class="button-box">
              <button class="cancel-button" onclick="closeModal('modalEdit')">
                Cancelar
              </button>
              <button id="save-button">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="/public/js/adm-tabela-usu.js"></script>
  </body>
</html>