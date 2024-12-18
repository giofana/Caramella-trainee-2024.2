<?php
    session_start();

    if(!isset($_SESSION['id'])){
      header('Location: /login');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kurale&display=swap" rel="stylesheet">
    <title>Caramella | Dashboard</title>
    <link rel="icon" href="../../../public/assets/icon-logo.png" type="image/png">
  </head>
  <body>
    <main>
      <div id="dashboard">
        


        <div class="botoes">
          <form action="/posts-list" method="POST">
            <button class="postsbutton" type="submit">
              <img src="/public/assets/posts.png" alt="">
              <label>Lista de publicações</label>
            </button>
          </form>
        </div>


        <div class="botoes">
          <form action="/users" method="POST">
            <button class="usersbutton" type="submit">
              <img src="/public/assets/users.png" alt="">
              <label>Lista de usuários</label>
            </button>
          </form>
        </div>


        <div class="botoes">
          <form action="/logout" method="POST">
            <button class="logout" type="submit">
              <img src="/public/assets/logout.png" alt="Logout">
              <label>Logout</label>
            </button>
          </form>
        </div>


      </div>
    </main>
  </body>
</html>
