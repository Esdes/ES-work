<?php use application\models\ProfileModel;?>

<main>
	<div class="container employer">
	<?php foreach($listOrder as $val):?>
		<?php $order = $val;?>
	<?php endforeach;?>	

	<?php foreach($listEmployer as $val):?>
		<?php $employer = $val;?>
	<?php endforeach;?>	

		<div class="row mt-3">
			<h4>Информация о заказчике</h3>
		</div>

		<div class="row worker__info pd">
			<?php if(!empty($employer)):?>
				<a href="/employer/<?php echo $employer['login']?>"><?php echo $employer['login']?></a>
			<?php endif;?>
		</div>

		<div class="row mt-3">
			<h4>Информация о заказе</h3>
		</div>

		<div class="row">
			<div class="text_wrap" >
				<?php echo $order['content'];?>
			</div>
		</div>
		
<?php if($isEmployer == 0 && $isWorker_order == 0 && $isFreeOrder == 1):?>
		<div class="row mt-3 employer__order">
				<h4>Принять заказ</h4>
				<ul class="d-flex">
					<li>
                    	<a href="/employers/order_add/<?php echo $order['id']?>" class="add_order btn btn-success" title="Принять"><i class="fas fa-plus"></i>
                        </a>
					</li>				
				</ul>
		</div>

<?php endif;?>


	</div>
</main>