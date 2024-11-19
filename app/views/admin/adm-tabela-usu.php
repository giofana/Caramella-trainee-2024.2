<?php
// Informações do banco de dados
$servername = "localhost";
$username = "root";
$password = "senhafake"; // Substitua pela sua senha do MySQL
$dbname = "caramella";  // Nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} 

// Consultar todos os usuários da tabela 'users'
$sql = "SELECT id, name, email, password FROM users";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

// Criar um array para armazenar os usuários
$users = [];

// Verificar se existem resultados e armazená-los no array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Adiciona o usuário ao array $users
        $users[] = $row;
    }
} else {
    echo "0 resultados encontrados.";
}

// Fechar a conexão com o banco
$conn->close();
?>

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

        <!-- Iterando os usuários -->
        <?php foreach ($users as $user): ?>
          <div class="barra2">
            <div class="idb"><p><?= $user['id'] ?></p></div>
            <div class="nomeb"><p><?= htmlspecialchars($user['name']) ?></p></div>
            <div class="emailb"><p><?= htmlspecialchars($user['email']) ?></p></div>
            <div class="barra2b">
              <!-- Botão para abrir o modal de visualização -->
              <button
                class="button"
                id="openModalView-<?= $user['id'] ?>"
                onclick="openModal('modalView-<?= $user['id'] ?>')"
              >
                <img src="../../../public/assets/visu.png" />
              </button>

              <!-- Botão para abrir o modal de edição -->
              <button
                class="button2"
                id="openModalEdit"
                onclick="openModal('modalEdit')"
              >
                <img src="../../../public/assets/edit.png" />
              </button>

              <!-- Botão para abrir o modal de exclusão -->
              <button
                class="button3"
                id="openModalDel"
                onclick="openModal('modalDel')"
              >
                <img src="../../../public/assets/lixo.png" />
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Navegação de páginas -->
      <div class="pagina">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">&raquo;</a>
      </div>

      <!-- Modal Criar -->
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

      <!-- Modais de Detalhes do Usuário -->
      <?php foreach ($users as $user): ?>
        <div class="modal modal-view" id="modalView-<?= $user['id'] ?>" style="display: none;">
          <div class="modal-content modal-content-view">
            <form class="form-view" action="">
              <h2>Detalhes do Usuário</h2>
              <div class="row-view-info">
                <label for="">Nome:</label>
                <div class="bg-view"><label for=""><?= htmlspecialchars($user['name']) ?></label></div>
              </div>
              <div class="row-view-info">
                <label for="">E-mail:</label>
                <div class="bg-view"><label for=""><?= htmlspecialchars($user['email']) ?></label></div>
              </div>
              <div class="row-view-info">
                <label for="">Senha:</label>
                <div class="bg-view"><label for=""><?= htmlspecialchars($user['password']) ?></label></div>
              </div>
              <div class="button-box">
                <button class="close-button" onclick="closeModal('modalView-<?= $user['id'] ?>')">
                  Fechar
                </button>
              </div>
            </form>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Modal Excluir -->
      <div class="modal modal-del" id="modalDel">
        <div class="modal-content excluir">
          <h2>Excluir Usuario</h2>
          <img src="../../../public/assets/trash.png" />
          <p>Tem certeza que deseja excluir este usuario?</p>
          <div class="button-box">
            <button class="cancel-button" onclick="closeModal('modalDel')">
              Cancelar
            </button>
            <button id="excluir-button">Excluir</button>
          </div>
        </div>
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


