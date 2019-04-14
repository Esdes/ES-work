<menu>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Управление новостями</h3>
            </div>
        </div>
           
            <h4 class="mt-5">Список новостей</h4>

            <br/>
        <div class="">
            <div class="col- mx-auto">
                <div class="box">
                <table class="table-responsive table-bordered table-hover table-bordered table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID новости</th>
                        <th>Заголовок</th>
                        <th>Дата</th>
                        <th>Действие</th>                    
                    </tr>
                </thead>
                <?php foreach ($newsList as $news): ?>
                    <tr id="news_<?php echo $news['id'];?>">
                        <td class="center"><?php echo $news['id']; ?></td>
                        <td class="center"><?php echo $news['title']; ?></td>
                        <td class="center"><?php echo $news['data']; ?></td>
                        <td class="d-flex">
                            <a href="/admin/news_update/<?php echo $news['id']; ?>" class="btn btn-success" title="Редактировать"><i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="/admin/news_add"class="btn btn-warning" title="Добавить"><i class="fas fa-plus"></i></a>
                            <button class="delete-news btn btn-danger" title="Удалить" value="<?php echo $news['id']; ?>"><i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                    <?php echo $pagination->get();?>
                </div>
            </div>
                
        </div>            
    </div>
</menu>
