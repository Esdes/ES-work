<?php foreach($categoryById as $category):?>
<?php $cat = $category;?>
<?php endforeach;?>

<main>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/admin/category">Управление категориями</a></li>
            </ul>
        </div>

            <h4>Редактировать категорию : <?php echo $cat['name']; ?></h4>

            <div class="col-lg-8">
                <div class="login-form">
                    <form id="update-category" class="validation" action="/admin/category_update/<?php echo $cat['id']?>" method="post" novalidate>

                        <p>Название категории</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $cat['name']; ?>" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <p>Изображение категории</p>
                        <img class="upd_img" src="<?php echo $cat['image']; ?>" width="200" alt="" />
                        <input class="file_img" type="file" name="image" required>
                        <div class="invalid-feedback">
                            Выберите файл
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
