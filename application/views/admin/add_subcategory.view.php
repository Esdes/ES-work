<main>
    <div class="container">
            <div class="row">
                <h4>Добавить категорию</h4>
            </div>
            <div class="row">
                
            </div>
            <div class="col- mx-auto">
                <div class="login-form">
                    <form class="validation" action="#" method="post" novalidate>
                        <label for="name">Название</label>
                        <input id="name" type="text" name="name" class="form-control"value="" placeholder="name" required="">
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <label>Категория</label>
                    <?php if(!empty($categories)):?>
                        <div class="form-group">
                            <label class="form-check-label" for="select_category">
                                <select class="form-control" id="select_category" name="id_category">
                                <?php foreach($categories as $cat):?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php endforeach;?>
                                </select>
                            </label>
                        </div>
                    <?php endif;?>
                </div>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
