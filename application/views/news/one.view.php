<main class="news-item">
	<div class="container news-item__block">
		<?php if(empty($news)):?>
		<p>Похоже что новостей нет</p>
		<?php else:?>
			<?php foreach($news as $val):?>
		<div class="row mt-5 p-2">
			<h1><?php echo $val['title']?></h1>
		</div>
		<div class="row px-2">
			<span><?php echo date('Y-m-d / H:i',strtotime($val['data']))?></span>
		</div>		
		<hr>
		<div class="row ad">
			
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div class="text_wrap p-2">
					<?php echo $val['content'];?>
				</div>	
			</div>
			<aside class="col-lg-4 col-md-4 ad">
				
			</aside>
		</div>
			<?php endforeach;?>
	<?php endif;?>
	</div>
	
</main>
	
