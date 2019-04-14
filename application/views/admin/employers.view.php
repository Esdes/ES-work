<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление заказчиками</h3>
            </div>
        </div>
           
            <h4 class="mt-5">Список заказчиков</h4>

            <br/>
        <div class="row-fluid">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID заказчика</th>
                        <th>ID категории</th>
                        <th>Логин</th>
                        <th>Дата регистрации</th>
                        <th>Почта</th>
                        <th>Рейтинг</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach ($employersList as $employer): ?>
                    <tr id="employer_<?php echo $employer['id'];?>">
                        <td class="center"><?php echo $employer['id']; ?></td>
                        <td class="center"><?php echo $employer['id_category']; ?></td>
                        <td class="center"><?php echo $employer['login']; ?></td>
                        <td class="center"><?php echo $employer['date_registration']; ?></td>
                        <td class="center"><?php echo $employer['email']; ?></td>
                        <td class="center"><?php echo $employer['rating']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/employers_update/<?php echo $employer['id']; ?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <button class="delete-employer btn btn-danger" title="Удалить" value="<?php echo $employer['id']; ?>"><i class="fa fa-times"></i>
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
