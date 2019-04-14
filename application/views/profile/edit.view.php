<main>
	<?php if(isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div class="alert alert-warning" role="alert">
           		<strong>! <?php echo $error;?></strong> 
        	</div>
    	<?php endforeach;?>
	<?php endif;?>
</main>