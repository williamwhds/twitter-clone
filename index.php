<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twitter-clone</title>

    <link rel="shortcut icon" href="images/8twitter.png" type="image/x-icon">
    
    <!-- fontes google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&family=Roboto:ital,wght@0,700;1,300;1,400&display=swap" rel="stylesheet">
    
    <!-- fontawesome -->
    <link   
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"
    />


    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- popup de conta criada -->
    <?php
    // se usuário criou a conta com sucesso
    if (isset($_GET['criou']) && $_GET['criou'] == 1) {
        echo '
                <div class="account-made-popup" id="account-made-popup">
                    <div class="account-made-popup-content">
                        <h1>Conta criada com sucesso!</h1>
                        <h2>Tente entrar agora! 😊</h2>
                    </div>
                </div>
                <script src="js/account-made-popup.js"></script>
             ';
    // se ocorreu um erro durante a criação de conta
    } else if (isset($_GET['criou']) && $_GET['criou'] == 0) {
        echo '
                <div class="account-made-popup" id="account-made-popup">
                    <div class="account-made-popup-content">
                        <h1>Occoreu um erro!</h1>
                        <h2>'.urldecode($_GET['msgErro']).'</h2>
                    </div>
                </div>
                <script src="js/account-made-popup.js"></script>
             ';
    // caixa de erro genérica
    } else if (isset($_GET['msgErro'])) {
        echo '
                <div class="account-made-popup" id="account-made-popup">
                    <div class="account-made-popup-content">
                        <h1>Atenção ⚠️</h1>
                        <h2>'.urldecode($_GET['msgErro']).'</h2>
                    </div>
                </div>
                <script src="js/account-made-popup.js"></script>
             ';
    }
    ?>

    <!-- pagina principal -->
    <section class="main-page">
        <!-- parte esquerda da pagina -->
        <div class="left">
            <div class="left-content">
                <div>
                    <i class="fas fa-search"></i>
                    <h3 class="left-content-heading">Procure seus interesses</h3>
                </div>

                <div>
                    <i class="fas fa-user-friends"></i>
                    <h3 class="left-content-heading">Saiba sobre o que as pessoas estão falando</h3>
                </div>

                <div>
                    <i class="fas fa-comment"></i>
                    <h3 class="left-content-heading">Interaja também</h3>
                </div>
            </div>
        </div>
        <!-- fim da parte esquerda -->

        <!-- parte direita da pagina -->
        <div class="right">
            <div class="right-content">
                <form action="./php/entrar.php" method="post" class="right-content-form">
                    <input type="text" class="username" id="email" name="email" placeholder="Email">

                    <div>
                        <input type="password" class="password" id="password" name="password" placeholder="Senha">
                        <label>Esqueceu sua senha?</label>
                    </div>

                    <button type="submit" class="btn-top">Entrar</button>
                </form>


                <div class="middle-content">
                    <i class="fas fa-globe-americas"></i>
                    <h1>Descubra o que está acontecendo no mundo</h1>
                    <h4>Inscreva-se hoje</h4>
                    <button type="button" class="sign-up" id="open-sign-up">Criar conta</button>
                    <button type="button" class="log-in">Entrar</button>
                </div>
            </div>
        </div>

        <div class="sign-up-popup" id="sign-up-popup">
            <div class="sign-up-popup-content">
                <span class="popup-close" id="popup-close">&times;</span>
                <h2>Criar conta</h2>
                <form action="./php/cadastrar.php" method="post">
                    <input type="text" class="name" name="name" id="name" placeholder="Nome">
                    <input type="text" class="username" name="username" id="username" placeholder="Nome de usuário">
                    <input type="text" class="username" name="email" id="email" placeholder="Email">
                    <input type="password" class="password" name="password" id="password" placeholder="Senha">
                    <button type="submit" class="sign-up">Criar conta</button>
                </form>
            </div>
        </div>
        <script src="js/signup-popup.js"></script>

        <!-- rodapé -->
        <footer class="main-page-footer">
            <ul>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Termos</a></li>
                <li><a href="#">Apps</a></li>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Status</a></li>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Marca</a></li>
                <li><a href="#">Desenvolvedores</a></li>
                <li><a href="#">&copy; 2023 twitter-clone</a></li>
            </ul>
        </footer>
    </section>
</body>
</html>
