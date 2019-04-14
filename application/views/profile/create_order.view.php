<?php if(isset($nameCategory)):?>
    <?php foreach($nameCategory as $val):?>
        <?php $cat = $val?>
    <?php endforeach;?>
<?php endif;?>

<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Создать заказ для категории <?php echo $cat['name']?></h3>
            </div>
        </div>
        <?php if(isset($errors)):?>
            <?php foreach($errors as $error):?>
                <div class="alert alert-warning" role="alert">
                    <strong>!</strong> <?php echo $error;?>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <form id="enter_form" class="validation" method="post" action="/profile/edit?order" novalidate>
        <?php if(isset($attributes)):?>
            <?php foreach($attributes as $attr => $val):?>
                <?php  $data[$attr] = $val;?>
            <?php endforeach;?>    
            <div class="row pd">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input id="title" type="text" name="title" class="form-control" value="<?php echo $data['title'];?>" placeholder="Please enter title" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="content">Контент</label>
                         <textarea id="content" name="content" class="form-control" value="" placeholder="content" rows='15' required><?php echo $data['content']?></textarea>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
<!-- else -->
            <?php else:?>

            <div class="row pd">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input id="title" type="text" name="title" class="form-control" value="" placeholder="Please enter title" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="content">Контент</label>
                         <textarea id="content" name="content" class="form-control" value="" placeholder="content" rows='15' required></textarea>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
            <div class="row pd">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Add</button>
                </div>

            </div>
    </form>
</div>
</main>
