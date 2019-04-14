<main>
    <div class="container">
            <div class="row">
                <h4>Добавить новость</h4>
            </div>

            <div class="col- mx-auto">
                <div class="login-form">
                    <form class="validation" action="#" method="post" novalidate>
                        <label for="title">Заголовок</label>
                        <input id="title" type="text" name="title" class="form-control"value="" placeholder="title" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <label for="content">Контент</label>
                        <textarea id="content" name="content" class="form-control" value="" placeholder="content" rows='15' required></textarea>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
