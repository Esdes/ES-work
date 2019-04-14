<?php foreach($orderById as $val):?>
<?php $order = $val;?>
<?php endforeach;?>

<main>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/admin/orders?page=1">Управление заказами</a></li>
            </ul>
        </div>

            <h4>Редактировать заказ № : <?php echo $order['id']; ?></h4>

            <div class="col-lg-8">
                <div class="login-form">
                    <form id="update-order" class="validation" action="/admin/order_update/<?php echo $order['id']?>" method="post" novalidate>

                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $order['title']; ?>">

                        <p>Подтверждено(0 - нет, 1 - да)</p>
                        <input type="number" name="confirmed"placeholder="" value="<?php echo $order['confirmed']; ?>">
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
