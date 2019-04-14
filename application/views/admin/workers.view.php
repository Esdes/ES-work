<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление работниками</h3>
            </div>
        </div>
           
            <h4 class="mt-5">Список работников</h4>

            <br/>
        <div class="row-fluid">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID работника</th>
                        <th>ID категории</th>
                        <th>Логин</th>
                        <th>Дата регистрации</th>
                        <th>Почта</th>
                        <th>Рейтинг</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach ($workersList as $worker): ?>
                    <tr id="worker_<?php echo $worker['id'];?>">
                        <td class="center"><?php echo $worker['id']; ?></td>
                        <td class="center"><?php echo $worker['id_category']; ?></td>
                        <td class="center"><?php echo $worker['login']; ?></td>
                        <td class="center"><?php echo $worker['date_registration']; ?></td>
                        <td class="center"><?php echo $worker['email']; ?></td>
                        <td class="center"><?php echo $worker['rating']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/workers_update/<?php echo $worker['id']; ?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <button class="delete-worker btn btn-danger" title="Удалить" value="<?php echo $worker['id']; ?>"><i class="fa fa-times"></i>
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
