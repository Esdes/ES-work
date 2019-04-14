<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление категориями</h3>
            </div>
        </div>
           
            <h4 class="mt-5">Список категорий</h4>

            <br/>
        <div class="row-fluid">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID категории</th>
                        <th>Название категории</th>
                        <th>Изображение</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach ($categoriesList as $category): ?>
                    <tr id="category_<?php echo $category['id'];?>">
                        <td class="center"><?php echo $category['id']; ?></td>
                        <td class="center"><?php echo $category['name']; ?></td>
                        <td class="center"><?php echo $category['image']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/category_update/<?php echo $category['id']; ?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/admin/category_add"class="btn btn-warning" title="Добавить"><i class="fas fa-plus"></i></a>
                            <button class="delete-category btn btn-danger" title="Удалить" value="<?php echo $category['id']; ?>"><i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                </div>
            </div>
                
        </div>            
    </div>
</menu>
