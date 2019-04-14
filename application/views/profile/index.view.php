<main>
	<div class="container">
		<?php if(isset($profile)):?>
		<?php foreach($profile as $var):?>
			<?php $user = $var;?>
		<?php endforeach;?>
			<h5><?php echo $user['login']?></h5>
			<div class="row pd">Ваш рейтинг : <?php echo $user['rating']?></div>
		<?php endif;?>
		<div class="row pd">
			<a href="/profile/settings?data"><h5>Изменить свои данные</h5></a>
		</div>

		<?php if($user['type']==2):?>

		<div class="row pd">
			<a href="/profile/settings?skill"><h5>Изменить свои навыки</h5></a>
		</div>

		<?php endif;?>

		<div class="row pd">
			<a href="/profile/settings?page=1_work"><h5>Посмотреть свои работы</h5></a>
		</div>
		<div class="row pd">
			
		</div>
	</div>
</main>