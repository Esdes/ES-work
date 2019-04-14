<main class="worker">
	<?php if($isEmployer == 0):?>
	
    <?php if(isset($listOrderWorker)):?>

<?php if (isset($employerLogin)):?>
    <?php foreach($employerLogin as $val):?>
    <?php $employer = $val;?>
	<?php endforeach;?>
<?php endif;?>

<?php if(empty($listOrderWorker)):?>
	<h4 class="mt-5">Список заказов пуст</h4>
<?php else:?>

    <h4 class="mt-5">Список заказов</h4>
            
            <div class="row-fluid ">
            <div class="col-lg-7 mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID заказа</th>
                        <th>Заготовок</th>
                        <th>Дата</th>
                        <th>Выполнен</th>
                        <th>Заказчик</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach($listOrderWorker as $order):?>
                    <tr id="order_<?php echo $order['id'];?>">
                        <td class="center"><?php echo $order['id']; ?></td>
                        <td class="center"><a href="/employers/order/id=<?php echo $order['id']?>"><?php echo $order['title']; ?></a></td>
                        <td class="center"><?php echo $order['date']; ?></td>
                        <?php if($order['confirmed'] == 1):?>
                        	<td class="center">Выполнен</td>
                        <?php else:?>
                        	<td class="center">В процесе</td>
                        <?endif;?>

                         <td class="center"><a href="/employer/<?php echo $employer['login']?>"><?php echo $employer['login']; ?></a></td>
                        <td class="">
                           
                       
                            <?php if($order['rate_exist']==0):?>
                            <section id="employer_rate_<?echo $order['id']?>">
                            <button class="add_rate_employer  btn btn-success" title="Повысить рейтинг" value="<?echo $order['id']?>"><i class="fas fa-plus"></i>
                            </button>
                   
                            <button class="minus_rate_employer btn btn-warning" title="Понизить рейтинг" value="<?echo $order['id']?>"><i class="fas fa-minus"></i>
                            </button>
                            </section>
                            <?php endif;?>       
                         <?php if($order['confirmed'] ==0 && $order['rate_exist']==0):?>
                            <button class="deny_order btn btn-danger" title="Отказаться" value="<?php echo $order['id']; ?>"><i class="fa fa-times"></i>
                            </button>
                            <?endif;?>                	
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                <?php echo $pagination->get();?>
                </div>
            </div>
        </div>

<!-- else employer -->
    <?php endif;?>
<?php endif;?>
    <?php else:?>

<?php if(isset($listOrderEmployer)):?>

<?php if(empty($listOrderEmployer)):?>
    <h4 class="mt-5">Список заказов пуст</h4>
<?php else:?>
   
    <h4 class="mt-5">Список заказов</h4>
            
            <div class="col-lg-9 mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID заказа</th>
                        <th>Заготовок</th>
                        <th>Дата</th>
                        <th>Работник</th>
                        <th>Действие</th>      
                    </tr>
                </thead>

                <?php foreach($listOrderEmployer as $order):?>

                     <tr id="category_<?php echo $category['id'];?>">
                        <td class="center"><?php echo $order['id']; ?></td>
                        <td class="center"><?php echo $order['title']; ?></td>
                        <td class="center"><?php echo $order['date']; ?></td>
                        <td class="center">
                    <?php if (!empty($workerLogin)):?>
                        <?php if(isset($workerLogin)):?>
                            <?$cnt=count($workerLogin)?>
                            <?php foreach($workerLogin as $worker):?>
                                <?php if($worker['id'] == $order['id_worker']):?>
                             <a href="/worker/<?php echo $worker['login']?>"><?php echo $worker['login']; ?></a>
                                <?break;?>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?endif;?>
                        
                    <?else:?>
                        <td class="center"><a href="#"></a></td>
                    <?endif;?>
                        
                        <td class="center">
                            <a href="/profile/settings/create?order" class="btn btn-warning" title="Создать"><i class="fas fa-plus"></i>
							</a>
						<?php if($order['confirmed']==0 && $order['id_worker']!=NULL):?>
                            <button id="confirm-order_<?php echo $order['id']; ?>" class=" confirm-order btn btn-success" title="Завершить" value="<?php echo $order['id']; ?>">
                            	<i class="fas fa-check"></i>
                            </button>
                            <?php if($order['rate_exist']==0):?>
                            <button id="deny_order_<?php echo $order['id']; ?>" class="deny_worker btn btn-danger" title="Удалить работника" value="<?php echo $order['id']; ?>"><i class="fa fa-times"></i>
                            </button>
                            <?php endif;?>
                        <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </table>
             <?php echo $pagination->get();?>
                </div>
            </div>
    <?php endif;?>
<?php endif;?>
</main>

    

<?php endif;?>
