<?php foreach($employerById as $employer):?>
<?php $user = $employer;?>
<?php endforeach;?>

<main>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/admin/employers?page=1">Управление заказчиками</a></li>
            </ul>
        </div>

            <h4>Редактировать заказчика : <?php echo $user['login']; ?></h4>

            <div class="col-lg-8">
                <div class="login-form">
                    <form id="update-employer" class="validation" action="/admin/employers_update/<?php echo $user['id']?>" method="post" novalidate>

                        <p>Имя</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name']; ?>">

                        <p>Логин</p>
                        <input type="text" name="login" placeholder="" value="<?php echo $user['login']; ?>">
                        
                        <p>Почтовый адрес</p>
                        <input type="email" name="email" placeholder="" value="<?php echo $user['email']; ?>">

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
