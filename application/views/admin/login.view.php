<main class="login">
    <div class="container">
        <a href="/">Перейти на главную страницу</a>
        <?php if(isset($errors)):?>
            <?php foreach($errors as $error):?>
                <div class="alert alert-warning" role="alert">
                    <strong>!</strong> <?php echo $error;?>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 justify-content-center">
                <h3>Вход в панель Администратора</h3>
            </div>
        </div>
        <form id="enter_form" class="validation" method="post" action="/admin/login?$2y$10$SuOyyp4VOFqVs05J/Do6BeWLxMElUT7zHo9nA.Jb6j/SuWQ2fmGb2" novalidate>
        <?php if(isset($attributes)):?>
            <?php foreach($attributes as $attr => $val):?>
                <?php  $data[$attr] = $val;?>
            <?php endforeach;?>    
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input id="login" type="text" name="login" class="form-control" value="<?php echo $data['login'];?>" placeholder="Please enter your login" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Please enter your password" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
<!-- else -->
            <?php else:?>

            <div class="row justify-content-center mt-3">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input id="login" type="text" name="login" class="form-control" placeholder="Please enter your login" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Please enter your password" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="form-group">
                        <button style="width: 100%" class="btn btn-primary" type="submit" name="submit">Sign in</button>
                    </div>
                </div>
            </div>
    </form>
</div>
</main>
