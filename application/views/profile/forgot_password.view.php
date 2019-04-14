<main class="registration">
    <div class="container">
    <?php if(isset($success)):?>
        <div class="row pd">
            <h3><?php echo $success;?></h3>
        </div>
        <?php else:?>
        <div class="row">
            <div class="col">
                <h3>Восстановить пароль</h3>
            </div>
        </div>
        
     <?php if(isset($errors)):?>
        <?php foreach($errors as $error):?>
            <div class="alert alert-warning" role="alert">
                <strong>!</strong> <?php echo $error;?>
            </div>
         <?php endforeach;?>
      <?php endif;?>
        <form id="reg-form" class="validation" method="post" action="/profile/forgot_password" novalidate>
        <?php if(isset($attributes)):?>
            <?php foreach($attributes as $attr => $val):?>
                <?php  $data[$attr] = $val;?>
            <?php endforeach;?>

            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" value="<?php echo $data['email'];?>" placeholder="Please enter your email"required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Mobile</label>
                        <input id="mobile" type="tel" name="mobile" class="form-control" value="<?php echo $data['mobile'];?>" placeholder="380 xx xxx xxxx" required>
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
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" class="form-control" placeholder="Please enter your firstname"required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pd">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Mobile</label>
                        <input id="mobile" type="tel" name="mobile" class="form-control" placeholder="380 xx xxx xxxx" required>
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
    <?php endif;?>
    </div>
</main>
