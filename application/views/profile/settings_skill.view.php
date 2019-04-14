<?php if(empty($subcategories)):?>
<div class="alert alert-warning" role="alert">
    <strong>Возникли ошибки с данными</strong>
</div>
<?php else:?>
<main>
    <div class="container">
        <form id="settings-form" class="validation" method="post" action="/profile/edit?skill" novalidate>
        <div class="row pd">
            <div class="col-md-4">
                <span>Навыки</span>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="form-check">                   
                    <?php foreach($subcategories as $skill):?>
                         <?php if(!empty($subcategoriesByUserId)):?>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="skill[]" value="<?php echo $skill['id']?>" <?php foreach($subcategoriesByUserId as $check):?>
                        <?php if($check['id_skill']==$skill['id']) echo 'checked'?>
                        <?php endforeach;?>
                        >
                        <?php echo $skill['name'];?>
                    </div>
                        <?php else:?>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" name="skill[]" value="<?php echo $skill['id']?>">
                            <?php echo $skill['name'];?>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        
        <div class="row pd">
            <div class="col-lg-6">
                <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit">Change</button>
                </div>  
            </div>
        </div>
        </form>
    </div>
    <?php endif;?>
</main>