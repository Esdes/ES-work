<?if(isset($profile)):?>
    <?php foreach($profile as $val):?>
        <?php $user = $val;?>
    <?php endforeach;?>
    <?php if($user['type']==2):?>
<main class="worker">
	
	<div class="container">
			<h3>Ваши данные</h3>
			<form id="settings-form" class="validation" method="post" action="/profile/edit?data" novalidate>
            <div class="row mt-5 pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Логин</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="login" type="text" name="login" class="form-control" value="<?php echo $user['login']?>" placeholder="Change your login ">
                    </div>
                </div>
            </div>
            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Имя</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="name" type="text" name="name" class="form-control" value="<?php echo $user['name']?>" placeholder="Change your name ">
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
           			<span class="settings-form__item">Возраст</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="age" type="number" name="age" class="form-control" value="<?php echo $user['age']?>" placeholder="Change your age ">
                    </div>
                </div>
            </div>
            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Информация о вас</span>
            	</div>
                <div class="col-md-8 ml-auto">
                    <div class="form-group">
                        <textarea id="info" name="info" class="form-control" value="<?php echo $user['info']?>" placeholder="Change your info" rows='10'></textarea>
                    </div>
                </div>
            </div>

            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Телефон</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="mobile" type="number" name="mobile" class="form-control" value="<?php echo $user['mobile']?>" placeholder="Change your mobile ">
                    </div>
                </div>
            </div>

            <div class="row pd">
            	<div class="col-md-4">
           			<span class="settings-form__item">Почтовый адрес</span>
            	</div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="email" type="text" name="email" class="form-control" value="<?php echo $user['email']?>" placeholder="Change your email ">
                    </div>
                </div>
            </div>

<!-- else employer -->
    <?php else:?>

    <div class="container">
            <h3>Ваши данные</h3>
            <form id="settings-form" class="validation" method="post" action="/profile/edit?data" novalidate>
            <div class="row mt-5 pd">
                <div class="col-md-4">
                    <span class="settings-form__item">Логин</span>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="login" type="text" name="login" class="form-control" value="<?php echo $user['login']?>" placeholder="Change your login ">
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-md-4">
                    <span class="settings-form__item">Имя</span>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="name" type="text" name="name" class="form-control" value="<?php echo $user['name']?>" placeholder="Change your name ">
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
                    <span class="settings-form__item">Возраст</span>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="age" type="number" name="age" class="form-control" value="<?php echo $user['age']?>" placeholder="Change your age ">
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-md-4">
                    <span class="settings-form__item">Информация о вас</span>
                </div>
                <div class="col-md-8 ml-auto">
                    <div class="form-group">
                        <textarea id="info" name="info" class="form-control" value="<?php echo $user['info']?>" placeholder="Change your info" rows='10'></textarea>
                    </div>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-4">
                    <span class="settings-form__item">Телефон</span>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="mobile" type="tel" name="mobile" class="form-control" value="<?php echo $user['mobile']?>" placeholder="Change your mobile ">
                    </div>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-4">
                    <span class="settings-form__item">Почтовый адрес</span>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control" value="<?php echo $user['email']?>" placeholder="Change your email">
                    </div>
                </div>
            </div>
    <?php endif;?>
            <div class="row pd">
                <div class="col-lg-6">
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Change</button>
                    </div>  
                </div>
            </div>
            </form>
    </div>
    
</main>
    

<?php endif;?>
