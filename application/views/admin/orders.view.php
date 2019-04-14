<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление заказами</h3>
            </div>
        </div>
           
            <h4 class="mt-5">Список заказов</h4>

            <br/>
        <div class="row-fluid">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID заказа</th>
                        <th>ID категории</th>
                        <th>Заголовок</th>
                        <th>Выполнено</th>
                        <th>Дата</th>
                        <th>Действие</th>            
                    </tr>
                </thead>
                <?php foreach ($ordersList as $order): ?>
                    <tr id="order_<?php echo $order['id'];?>">
                        <td class="center"><?php echo $order['id']; ?></td>
                        <td class="center"><?php echo $order['id_category']; ?></td>
                        <td class="center"><?php echo $order['title']; ?></td>
                        <td class="center"><?php echo $order['confirmed']; ?></td>
                        <td class="center"><?php echo $order['date']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/order_update/<? echo $order['id']?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <button class="delete-order btn btn-danger" title="Удалить" value="<?php echo $order['id']; ?>"><i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                    <?php echo $pagination->get();?>
                </div>
            </div>
                
        </div>            
    </div>
</menu>
