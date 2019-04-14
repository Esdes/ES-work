<main class="workers">
	<div class="container">
		<div class="row justify-content-left">
			<h3>Работники</h3>
			<hr>
		</div>
	<div class="row">
		<div class="col-lg-3 col-sm-12">
			<a href="/workers"><h6>Категории</h6></a>
			<?php if(empty($category)):?>
			<p>Список категорий пуст</p>
			<?php else:?>			
			<ul id="accordion" class="accordion">
					  		<?php foreach($category as $val):?>
					  		<li>
					    		<div class="link"><a href="workers?page=1&categories_id=<?php echo $val['id']?>"><?php echo $val['name']?></a><i class="fa fa-chevron-down"></i></div>	    
					    		<ul class="submenu">
					    			<?php foreach($sub_category as $sub):?>
					    			<?php if($val['id']==$sub['id_category']):?>
					      			<li><a href="workers?page=1&categories_id=<?php echo $val['id']?>&subcategory_id=<?php echo $sub['id']?>"><?php echo $sub['name']?></a></li>
					      			<?php endif;?>
					      			<?php endforeach;?>
					    		</ul>
					  		</li>
					  		<?php endforeach;?>
			</ul>
			<?php endif;?> 
		</div>
		<div class="col-lg-9 col-sm-12 workers-block mt-2">
			<?php if(empty($workers)):?>
				<p>Работников не найдено</p>
			<?php else:?>
				<h2 class="row justify-content-center">Топ 10 работников</h2>
			<?php foreach($workers as $worker):?>
			<div class="workers-block__item mt-5">
				<div class="workers-block__header">
					<a href="/worker/<?php echo $worker['login']?>"><?php echo $worker['login'];?></a>
					<?php foreach($category as $val):?>
						<?php if($worker['id_category'] == $val['id']):?>
						<p>Категория : <?php echo $val['name']?></p>
						<?php endif;?>
					<?php endforeach;?>
						<p>Рейтинг: <?php echo $worker['rating']?></p>						

							<?php if($worker['free'] == 0):?>
							<p>Занятость : свободен</p>
							<?php else:?>
							<p>Занятость : выполняет заказ</p>
							<?endif;?>
							<hr>
				</div>
			</div>
			<?php endforeach;?>
			<?php endif;?>
		</div> 

	</div>
	</div>
</main>