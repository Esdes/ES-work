<?php foreach($newsById as $val):?>
<?php $news = $val;?>
<?php endforeach;?>

<main>
    <div class="container">
        <div class="row">
            <ul>
                <li><a href="/admin/news?page=1">Управление новостями</a></li>
            </ul>
        </div>

            <h4>Редактировать новость : <?php echo $news['title']; ?></h4>

            <div class="col-lg-8">
                <div class="login-form">
                    <form id="update-news" class="validation" action="/admin/news_update/<?php echo $news['id']?>" method="post" novalidate>

                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $news['title']; ?>">

                        <p>Контент</p>
                        <textarea id="content" name="content" class="form-control" value="" placeholder="content" rows='15' required><?php echo $news['content']?></textarea>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
