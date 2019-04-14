<?php foreach($subcategoryById as $category):?>
<?php $sub = $category;?>
<?php endforeach;?>

<main>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/admin/subcategory">Управление подкатегориями</a></li>
            </ul>
        </div>

            <h4>Редактировать подкатегорию : <?php echo $sub['name']; ?></h4>

            <div class="col-lg-8">
                <div class="login-form">
                    <form id="update-subcategory" class="validation" action="/admin/subcategory_update/<?php echo $sub['id']?>" method="post" novalidate>

                        <p>Название подкатегории</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $sub['name']; ?>" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <p>Категории</p>
                        <select name="id_category">
                            <?php if (!empty($categoriesList)): ?>
                                <?php foreach ($categoriesList as $cat): ?>
                                    <option value="<?php echo $cat['id']; ?>" 
                                        <?php if ($sub['id_category'] == $cat['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $cat['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            Выберите категорию
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
