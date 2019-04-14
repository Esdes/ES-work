<main>
    <div class="container">
            <div class="row">
                <h4>Добавить категорию</h4>
            </div>

            <div class="col- mx-auto">
                <div class="login-form">
                    <form class="validation" action="#" method="post" novalidate>
                        <label for="name">Название</label>
                        <input id="name" type="text" name="name" class="form-control"value="" placeholder="name" required>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>

                        <p>Изображение</p>
                        <input type="file" name="image" required>
                        <div class="invalid-feedback">
                            Выберите файл
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
