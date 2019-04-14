<?php use application\models\ProfileModel;?>

<main>
	<div class="container worker">
	<?php foreach($listWorker as $val):?>
		<?php $user = $val;?>
	<?php endforeach;?> 
		<div class="row worker-block worker__header">
			<div class="col-lg-8">
			<div class="row pd">
				<div class="col-lg-6">
					<?php if($online):?>
						<span><?php echo $user['login']?> в сети</span>
					<?php else:?>
						<span><?php echo $user['login']?> не в сети</span>
					<?php endif;?>
				</div>
				<div class="col-lg-6">
					<?php if($user['free'] == 0):?>
						<span><?php echo $user['login']?> свободен</span>
					<?php else:?>
						<span><?php echo $user['login']?> выполняет заказ</span>
					<?php endif;?>
				</div>
			</div>

			<div class="row pd">
				<div class="col-lg-6">
					<?php if($user['name']):?>
						<span>Настоящее имя:<?php echo $user['name']?></span>
					<?php else:?>
						<span>Настоящее имя не указано</span>
					<?php endif;?>
				</div>
				<div class="col-lg-6">
					<span>Рейтинг : <?php echo $user['rating']?></span>
				</div>
				<div class="col-lg-6">
					<?php if($user['age']):?>
						<span>Возраст :<?php echo $user['age']?></span>
					<?php else:?>
						<span>Возраст не указан</span>
					<?php endif;?>
				</div>
			</div>
			</div>
			
		</div>

		<div class="row mt-3">
			<h4>Контактная информация</h4>
		</div>

		
		<div class="row worker-block worker__contacts mt-3">
			<div class="col-lg-8">
			<div class="row pd">
				<div class="col-lg-6">
				<?php if($user['mobile']):?>
					<span>Номер телефона: +<?php echo $user['mobile']?>
					</span>
				<?php else:?>
					<span>Номер телефона не указан</span>
				<?php endif;?>
				</div>
				<div class="col">
					<span>Почтовый адрес: <?php echo $user['email']?>
					</span>
				</div>
			</div>
			</div>
		</div>

		<div class="row mt-3">
			<h4>Информация о пользователе</h3>
		</div>

		<div class="row worker-block worker__info">
			<div class="col-lg-10 text_wrap">
			<?php if($user['info']):?>
				<p><?php echo $user['info']?></p>
			<?php else:?>
				<span>Здесь пока ничего нет</span>
			<?php endif;?>
			</div>
		</div>

		<div class="row mt-3">
			<h4>Навыки</h4>
		</div>

		<div class="row worker-block worker__skill">
			<div class="row pd">
			<?php if(empty($listSubCategoryWorker)):?>
				<span><?php echo $user['login']?> пока не выбрал навыки</span>
            <?php else:?>
			<?php foreach($listSubCategoryWorker as $sub):?>
						<ul><li><a class="" href="/workers?page=1&categories_id=<?php echo $user['id_category']?>&subcategory_id=<?php echo $sub['id']?>"><?php echo $sub['name']?></a></li></ul>
			<?php endforeach;?>
			<?php endif;?>
			</div>
		</div>

		<div class="row">
			<?php if(!ProfileModel::isGuest()):?>
				<h4>Вы можете оставить сообщение</h3>
					<?php else:?>
				<h4>Комментарии только для зарегистрированных пользователей</h4>
			<?php endif;?>
		</div>

		<div class="row worker-block worker__message">
			<?if(isset($listUsersMessage)):?>
			<?php foreach($listUsersMessage as $message):?>
				<!--  -->
			<?php endforeach;?>
			<span>
				<?php echo $message['data']?>
			</span>
			<span>
				<?php echo $message['content']?>
			</span>
			<?php endif;?>
		</div>
	</div>
</main>