<main class="news">
	<h4 class="mb-5">Новости</h4>
        <div class="container">
			<?php if (empty($news)): ?>
                <p>Список новостей пуст</p>
            <?php else: ?>
                <?php foreach ($news as $val): ?>
                	<div class="news__block">
                		<div class="row justify-content-left">
                			<div class="col-lg-2 col-6 text-md-left">
                			
                				<small><?php echo date('Y-m-d / H:i',strtotime($val['data']))?></small>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-lg-8 text-md-left">
                				<a href="/news/id=<?php echo $val['id']?>"><h3><?php echo $val['title'] ?></h3></a>
                			</div>
                		</div>
                		
                		<hr>
                	
                	</div>
              <?php endforeach; ?>

            <?php echo $pagination->get();?>

          <?php endif;?>
        </div>
</main>