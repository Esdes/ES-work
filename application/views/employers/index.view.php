<?php if(!empty($listEmployers)):?>
	<?php foreach($listEmployers as $employers):?>
		<?php $user = $employers;?>
	<?php endforeach;?>
<?endif;?>

<main class="employers">
	<div class="container">
		<div class="row">
			<h3>Заказы</h3>
			<hr>
		</div>
	<div class="row">
		<div class="col-lg-3 col-sm-12">
			<a href="/employers/orders?page=1"><h6>Категории</h6></a>
			<?php if(empty($category)):?>
			<p>Список категорий пуст</p>
			<?php else:?>			
			<ul id="accordion" class="accordion">
					  		<?php foreach($category as $val):?>
					  		<li>  			
					    		<div class="link"><a href="/employers/orders?page=1&category_id=<?php echo $val['id']?>"><?php echo $val['name']?></a></div>	
					  		</li>
					  		<?php endforeach;?>
			</ul>
			<?php endif;?>
			
		</div>
		<div class="col-lg-9 col-sm-12 employers-block mt-2">
			<?php if(empty($listOrders)):?>
				<p>Заказов не найдено</p>
			<?php else:?>	
			<?php foreach($listOrders as $order):?>
			<div class="employers-block__item mt-5">
					<h4><a href="/employers/order/id=<?php echo $order['id']?>"><?php echo $order['title'];?></a></h4>
				<div class="employers-block__header">
					<?php if($user['id'] == $order['id_employer']):?>
					<p>Заказчик: <a href="/employer/<?php echo $user['login']?>"><?php echo $user['login']?></a></p>
					<?php foreach($category as $val):?>
						<?php if($order['id_category'] == $val['id']):?>
							<p>Категория: <?php echo $val['name']?></p>
						<?php endif;?>
					<?php endforeach;?>
							<hr>
					<?php endif;?>
				</div>
			</div>
			<?php endforeach;?>
			<?php endif;?>
		</div> 

	</div>
	
	<?php echo $pagination->get();?>

	</div>
</main>