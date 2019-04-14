<main class="login">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Вход</h3>
            </div>
        </div>
        <?php if(isset($errors)):?>
            <?php foreach($errors as $error):?>
                <div class="alert alert-warning" role="alert">
                    <strong>!</strong> <?php echo $error;?>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        <form id="enter_form" class="validation" method="post" action="/profile/login" novalidate>
        <?php if(isset($attributes)):?>
            <?php foreach($attributes as $attr => $val):?>
                <?php  $data[$attr] = $val;?>
            <?php endforeach;?>    
            <div class="row pd">
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
            <div class="row pd">
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

            <div class="row pd">
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
            <div class="row pd">
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
            <div class="row pd">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Sign in</button>
                    <a href="/profile/forgot_password">Забыли пароль?</a>
                </div>

            </div>
    </form>
</div>
</main>
