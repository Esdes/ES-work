<?php use application\models\ProfileModel;?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php echo $title; ?>
    </title>
    <link href="/public/fonts/fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet">
    <link href="/public/fonts/fontawesome-free-5.7.2-web/css/fontawesome.min.css" rel="stylesheet">
    <link href="/public/styles/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/public/styles/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/public/styles/main.css" rel="stylesheet">
</head>

<body>
    <header class="header" id="header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <h1>ES-work</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/news?page=1" class="nav-link waves-effect waves-light">Новости</a>
                        </li>
                        <li class="nav-item">
                            <a href="/workers" class="nav-link waves-effect waves-light">Работники</a>
                        </li>
                    <?php if (!ProfileModel::isGuest()):?>
                        <li class="nav-item">
                            <a href="/employers/orders?page=1" class="nav-link waves-effect waves-light">Заказы</a>
                        </li>
                    <?php endif;?>
                        <li class="nav-item">
                            <a href="/about" class="nav-link waves-effect waves-light">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contacts" class="nav-link waves-effect waves-light">Контакты</a>
                        </li>
                    </ul>
                    <!-- php check session(hide/show signin/logout) -->
                    <ul class="navbar-nav navbar__profile ml-auto">
                    <?php if (ProfileModel::isGuest()):?>
                        <li class="nav-item">
                            <a href="/profile/registration" class="nav-link waves-effect waves-light">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile/login" class="nav-link waves-effect waves-light">Вход</a>
                        </li>
                    <?php else:?>
                        <li class="nav-item">
                            <a href="/profile" class="nav-link waves-effect waves-light">Аккаунт</a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile/logout" class="nav-link waves-effect waves-light">Выход</a>
                        </li>
                    <?php endif;?>
                    </ul>
                </div>
            </div>        
        </nav>
       

    </header>

<? echo $content;?>

<footer class="footer">
    <div class="container">
        <div class="row d-flex align-items-center socicon">
            <div class="col-lg-6 text-md-left">
                <h6 class="white-text">Связь с нами</h6>
            </div>
            <div class="col-lg-6 text-md-right pd">
                <a href="#" class="fb-ic" target="blank">
                    <i class="fab fa-facebook mr-4 fa-2x"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter mr-4 fa-2x"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram mr-4 fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-md-left">
                <h6 class="font-bold text-uppercase text-white">Наши работы</h6>
                <hr>
                <p><a href="#">link</a></p>
                <p><a href="#">link</a></p>
                <p><a href="#">link</a></p>
            </div>
            
            <div class="col-lg-3 text-md-left">
                <h6 class="font-bold text-uppercase text-white">Сотрудничество</h6>
                <hr>
                <p><a href="#">link</a></p>
                <p><a href="#">link</a></p>
                <p><a href="#">link</a></p>
            </div>
            
            <div class="col-lg-3 text-md-left">
                <h6 class="font-bold text-uppercase text-white">Полезные ссылки</h6>
                <hr>
                <p><a href="/profile/forgot_password">Забыли пароль?</a></p>
                <p><a href="#">link</a></p>
                <p><a href="#">link</a></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col mx-auto text-md-right">
                <small>&copy; 2019, ES-work</small>
            </div>
        </div>
    </div>
</footer>

<script src="/public/scripts/jquery-3.3.1.min.js"></script>
<script src="/public/scripts/popper.min.js"></script>
<script src="/public/scripts/bootstrap.min.js"></script>
<script src="/public/scripts/mdb.js"></script>
<script src="/public/scripts/form.js"></script>
<script src="/public/scripts/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

</body>

</html>