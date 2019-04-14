<main class="registration">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Регистрация</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Поля обязательные для заполнения*</p>
            </div>
        </div>
     <?php if(isset($errors)):?>
        <?php foreach($errors as $error):?>
            <div class="alert alert-warning" role="alert">
                <strong>!</strong> <?php echo $error;?>
            </div>
         <?php endforeach;?>
      <?php endif;?>
        <form id="reg-form" class="validation" method="post" action="/profile/registration" novalidate>
        <?php if(isset($attributes)):?>
            <?php foreach($attributes as $attr => $val):?>
                <?php  $data[$attr] = $val;?>
            <?php endforeach;?>            
            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input id="name" type="text" name="name" class="form-control"value="<?php echo $data['name'];?>" placeholder="Please enter your firstname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="login">Логин *</label>
                        <input id="login" type="text" name="login" class="form-control" value="<?php echo $data['login'];?>" placeholder="Please enter your login *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-6">
                    <label>Тип профиля *</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio_employee">
                            <input type="radio" class="form-check-input" id="radio_employee" name="type" value="1"<?php if($data['type']==1) echo 'checked'?>>Заказчик
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="radio_worker">
                            <input type="radio" class="form-check-input" id="radio_worker" name="type" value="2" <?php if($data['type']==2) echo 'checked'?>>Рабочий
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>В какой категории будете работать*</label>
                    <?php if(!empty($categories)):?>
                    <div class="form-group">
                        <label class="form-check-label" for="select_category">
                            <select class="form-control" id="select_category" name="id_category">
                            <?php foreach($categories as $cat):?>
                            <option value="<?php echo $cat['id']?>" <?php if($cat['id'] == $data['id_category']) echo 'selected'?>><?php echo $cat['name']?></option>
                            <?php endforeach;?>
                            </select>
                        </label>
                    </div>
                    <?php endif;?>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Пароль *</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Please enter your password *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Возраст</label>
                        <input id="age" type="number" name="age" class="form-control" value="<?php echo $data['age'];?>" placeholder="Please enter your age">
                    </div>
                </div> 
            </div>

            <div class="row pd">        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Телефон</label>
                        <input id="mobile" type="tel" name="mobile" class="form-control" value="<?php echo $data['mobile'];?>" placeholder="380 xx xxx xxxx">
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" type="email" name="email" class="form-control" value="<?php echo $data['email'];?>" placeholder="Please enter your email *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>        
                
<!-- else -->
            <?php else:?>

            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input id="name" type="text" name="name" class="form-control" value="" placeholder="Please enter your firstname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="login">Логин *</label>
                        <input id="login" type="text" name="login" class="form-control" placeholder="Please enter your login *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-6">
                    <label>Тип профиля *</label>
                    <div class="form-check">
                        <label class="form-check-label" for="radio_employee">
                            <input type="radio" class="form-check-input" id="radio_employee" name="type" value="1">Заказчик
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="radio_worker">
                            <input type="radio" class="form-check-input" id="radio_worker" name="type" value="2" checked>Рабочий
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>В какой категории будете работать*</label>
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
            </div>

            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Пароль *</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="Please enter your password *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Возраст</label>
                        <input id="age" type="number" name="age" class="form-control" placeholder="Please enter your age">
                    </div>
                </div>
            </div>

            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Телефон</label>
                        <input id="mobile" type="tel" name="mobile" class="form-control" placeholder="380 xx xxx xxxx">
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
                
        <?php endif;?>
            <div class="row pd">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
            </div>
    
    </form>
    </div>
</main>
