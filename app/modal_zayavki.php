<!-- Модальное окно заявки -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="create.php" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel1">Заявка</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Ваш Телефон: 8 xxx-xxx-xx-xx
                            <input required  type="tel" pattern="8 [0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="name" placeholder="8 900-123-45-67" />
                        </p>
                        <p>Дата и время заявки:
                            <input required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="date" readonly value="<?php echo date("d.m.y H:i"); ?>">
                        </p>
                    </div>
                    <p class="text-center">После, вам позвонят для уточнения</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </div>
    </div>