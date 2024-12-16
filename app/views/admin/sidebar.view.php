<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../../public/css/sidebar.css" />
  </head>
  <body>
    <div class="sidebar-container">
      <nav id="sidebar" class="close">
        <div class="logo-container">
          <img
            src="../../../public/assets/logo-png.svg"
            alt="logo"
            id="sidebar-logo"
          />
        </div>
        <ul id="sidebar-itens">
          <a class="" href="/dashboard">
            <li class="side-item">
                <i class="fa-solid fa-chart-line"></i>
                <p class="item-title">Dashboard</p>
              </li>
          </a>
          <a class="" href="/posts-list">
            <li class="side-item">
              <i class="fa-regular fa-pen-to-square"></i>
              <p class="item-title">Publicações</p>
            </li>
          </a>
          <a href="/users">
            <li class="side-item">
              <i class="fa-solid fa-users"></i>
              <p class="item-title">Usuários</p>
            </li>
          </a>
        </ul>
        <div id="logout-container">
          <form action="/logout" method="POST">
            <button id="logout-button" type="submit">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <p class="item-title">Logout</p>
            </button>
          </form>
        </div>
        <button id="open-button">
          <i id="open-button-icon" class="fa-solid fa-chevron-right open"></i>
          <i id="close-button-icon" class="fa-solid fa-chevron-left close"></i>
          <i class="fa-solid fa-bars" id="menu-icon"></i>
        </button>
      </nav>
    </div>
  </body>
  <script src="../../../public/js/sidebar.js"></script>
</html>
