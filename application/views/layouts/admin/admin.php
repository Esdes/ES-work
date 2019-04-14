<?php use application\models\AdminModel;?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <title>
<?php echo $title;?>
  </title>

  <!-- Bootstrap core CSS -->

  <link href="/public/fonts/fontawesome-free-5.7.2-web/css/all.css" rel="stylesheet">
  <link href="/public/fonts/fontawesome-free-5.7.2-web/css/fontawesome.min.css" rel="stylesheet">
  <link href="/public/styles/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/public/styles/sidebar.css" rel="stylesheet">
  <link href="/public/styles/admin.css" rel="stylesheet">

</head>

<body>
<?php if(AdminModel::isSetAdmin()):?>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right pt-5 mt-5" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="/admin/settings" class="list-group-item list-group-item-action bg-light">Профиль</a>
        <a href="/admin/category" class="list-group-item list-group-item-action bg-light">Редактировать категории</a>
        <a href="/admin/subcategory?page=1" class="list-group-item list-group-item-action bg-light">Редактировать подкатегории</a>
        <a href="/admin/workers?page=1" class="list-group-item list-group-item-action bg-light">Редактировать работников</a>
        <a href="/admin/employers?page=1" class="list-group-item list-group-item-action bg-light">Редактировать заказчиков</a>
        <a href="/admin/orders?page=1" class="list-group-item list-group-item-action bg-light">Редактировать заказы</a>
        <a href="/admin/news?page=1" class="list-group-item list-group-item-action bg-light">Редактировать новости</a>
        <a href="/admin/logout" class="list-group-item list-group-item-action bg-light">Выход</a>
      </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="mt-5">

      <nav style="background-color: #ccccb3;" class="navbar navbar-expand-lg navbar-light border-bottom fixed-top mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <a href="/admin?$2y$10$oZEQOveeOwZXu7EJuSaJR.BJuZDwhhaljOCqRxK8uZT9FIAX7O4P." class="navbar-brand">
              <h1>Админ панель</h1>
          </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/admin/settings">Профиль<span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
              <a href="/admin/category" class="nav-link">Редактировать категории</a>
            </li>
             <li class="nav-item">
              <a href="/admin/subcategory?page=1" class="nav-link">Редактировать подкатегории</a>
            </li>
             <li class="nav-item">
              <a href="/admin/workers?page=1" class="nav-link">Редактировать работников</a>
            </li>
            <li class="nav-item">
              <a href="/admin/employers?page=1" class="nav-link">Редактировать заказчиков</a>
            </li>
            <li class="nav-item">
              <a href="/admin/orders?page=1" class="nav-link">Редактировать заказы</a>
            </li>
            <li class="nav-item">
              <a href="/admin/news?page=1" class="nav-link">Редактировать новости</a>
            </li>
            <li class="nav-item">
              <a href="/admin/logout" class="nav-link">Выход</a>
            </li>
            </ul>
        </div>
      </nav>

      <div class="container-fluid mt-5 pt-3">
        <?php echo $content;?>
      </div>
    </div>

  </div>

<?php else:?>
<?php echo $content;?>
<?php endif;?>

<?php if(AdminModel::isSetAdmin()):?>
<footer>
  <div class="row bg-light">
    <div class="col text-md-right mr-5">
      <small>&copy; 2019, ES-work</small>
    </div>
  </div>
</footer>
<?php endif;?>
  <!-- Bootstrap core JavaScript -->
<script src="/public/scripts/jquery-3.3.1.min.js"></script>
<script src="/public/scripts/popper.min.js"></script>
<script src="/public/scripts/bootstrap.min.js"></script>
<script src="/public/scripts/main.js"></script>
<script src="/public/scripts/admin.js"></script>

</body>

</html>
