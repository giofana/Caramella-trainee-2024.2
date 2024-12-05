<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/login_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Caramella | Login</title>
</head>
<body>
    <div class="body">
        <form action="/login" method="POST">
            <div class="form">
                <div class="form-header">
                    <h2>Login</h2>
                    <div class="mensagem-erro">
                    <p>
                        <?php
                            //session_start();
                            if(isset($_SESSION['mensagem-erro']))
                                echo $_SESSION['mensagem-erro'];
                            unset($_SESSION['mensagem-erro']);
                        ?>
                    </p>
                </div>
                </div>
                <div class="email-group">
                    <h3>Email</h3>
                    <input type="text" name="email" id="email" placeholder="exemplo@email.com">
                </div>
                <div class="senha-group">
                    <h3>Senha</h3>
                    <div class="input-container">
                        <input type="password" name="senha" id="senha" placeholder="Senh@123" style="letter-spacing: 2px;">
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </div>
                </div>
                <div class="button-group">
                    <button type="submit">Login</button>
                </div>
                </div>
            </div>
    </form>
    <script src="/public/js/login-page.js"></script>
</body>
</html>
