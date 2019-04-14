<?php foreach($adminList as $val):?>
        <?php $admin = $val;?>
<?php endforeach;?>

<main class="worker">
	<div class="container">
			<h3>Ваши данные</h3>
			<form id="settings-form" class="validation" method="post" action="/admin/settings_update" novalidate>
            <div class="row mt-5 pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Логин</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="login" type="text" name="login" class="form-control" value="<?php echo $admin['login']?>" placeholder="Change your login " required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Пароль</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control" value="" placeholder="Change your password ">
                    </div>
                </div>
            </div>

            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Почтовый адрес</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control" value="<?php echo $admin['email']?>" placeholder="Change your email" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="row pd">
                <div class="col-lg-6">
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Изменить</button>
                    </div>  
                </div>
            </div>
            </form>
    </div>
    
</main>
