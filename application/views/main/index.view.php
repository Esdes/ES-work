<main class="index">
    <div class="container index__intro">
        <div class="row justify-content-center mt-5">
            <div class="col">
                <h2> Работать с нами легко </h2>
            </div>        
        </div>
        <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <p>
                        Всё что вам нужно после регистрации это начать выполнять заказы от работодателей.
                    </p>
                </div>                    
            </div>   
    </div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <h4>Что мы вам предлагаем?</h4>
        </div>
            <div class="row mt-5">
                <div class="col-lg-4 propose pd">
                    <i class="fa fa-star fa-4x"></i>
                    <h4>Рейтинг</h4>
                    <p>Выполняйте задания и зарабатывайте репутацию</p>
                </div>

                <div class="col-lg-4 propose pd ml-auto">
                    <i class="fa fa-briefcase fa-4x"></i>
                    <h4>Большой выбор </h4>
                    <p>На сайте вы cможете найти до 100 профессий</p>
                </div>
            </div>
    </div>

    <div class="container galery mt-5">
        <div class="row justify-content-center">
            <h4>Выбирайте категорию</h4>
        </div>
        <div class="row mt-3">
            <?php if (empty($category)): ?>
                <p>Список категорий пуст</p>
            <?php else: ?>
                <?php foreach ($category as $val): ?>
                    <div class="col-lg-4 d-flex justify-content-center pd galery__item">
                       <ul>
                           <li>                     
                                <a href="workers?page=1&categories_id=<?php echo $val['id']?>">
                                   <img src="<?php echo $val['image']?>" alt="">
                               </a>
                           </li>
                           <a href="workers?page=1&categories_id=<?php echo $val['id']?>"><h3><?php echo $val['name']?></h3></a>
                       </ul>
                    </div>
                <?php endforeach; ?>
              
            <?php endif; ?>
        </div>
    </div>
</main>

