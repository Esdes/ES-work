<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление подкатегориями</h3>             
            </div>
        </div>
           
            <h4 class="mt-5">Список подкатегорий</h4>

            <br/>
        <div class="row-fluid">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID подкатегории</th>
                        <th>ID категории</th>
                        <th>Название</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach ($sub_categoriesList as $sub): ?>
                    <tr id="subcategory_<?php echo $sub['id'];?>">
                        <td class="center"><?php echo $sub['id']; ?></td>
                        <td class="center"><?php echo $sub['id_category']; ?></td>
                        <td class="center"><?php echo $sub['name']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/subcategory_update/<?php echo $sub['id']; ?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/admin/subcategory_add" class="btn btn-warning" title="Добавить"><i class="fas fa-plus"></i></a>
                            <button class="delete-subcategory btn btn-danger" title="Удалить" value="<?php echo $sub['id']; ?>"><i class="fa fa-times"></i>
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
