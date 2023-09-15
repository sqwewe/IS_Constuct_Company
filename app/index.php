<?php
include "connect.php";
include "header.php";
include "modal_zayavki.php";
?>
<div class="container-fluid	mx-1 my-1">
    <div class="row">
        <div class="col-9">
            <div class=" my-2">
                <div class="">
                    <div class="container my-3 ">
                        <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel" style="">
                            <div class="carousel-inner rounded-5">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="img/1.jpg" class="d-block w-100" alt="1.jpg">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="img/2.jpg" class="d-block w-100" alt="2.jpg">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/3.jpg" class="d-block w-100" alt="3.jpg">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Назад</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Далее</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col my-3">
            <div class="col">
                <p>Наши мастера</p>
                <!-- <ul class="list-group list-group-flush">
                        <table class="table table-striped">
                            <?php
                            $sqlm = "SELECT * FROM workers";
                            if ($result = $link->query($sqlm)) {
                                $rowsCount = $result->num_rows;
                            ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Имя</th>
                                            <th scope="col">Фамилия</th>
                                            <th scope="col">Должность</th>
                                            <th scope="col">Телефон</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($result as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["surname"] . "</td>";
                                        echo "<td>" . $row["role"] . "</td>";
                                        echo "<td>" . $row["phone"] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    $result->free();
                                } else {
                                    echo "Ошибка: " . $link->error;
                                }
                                    ?>
                                    </tbody>
                                </table>
                    </ul> -->
                <!-- <div class="row"> -->
                <?php
                $sqlm = "SELECT * FROM workers";
                if ($result = $link->query($sqlm)) {
                    $rowsCount = $result->num_rows;
                ?>
                <?php
                    foreach ($result as $row) {
                        echo "<div class='card my-2' style='width: 18rem;" . $row["id"] . "'>";

                        echo "<img src='" . $row["img"] . "' class= 'card-img-top' >";

                        echo "<div class='card-body'>";

                        echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                        echo "<h5 class='card-title'>" . $row["surname"] . "</h5>";
                        echo "<p class='card-text'>" . $row["role"] . "</p>";
                        echo "<p class='card-text'>" . $row["phone"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    $result->free();
                } else {
                    echo "Ошибка: " . $link->error;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid	mx-1 my-1">
    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
    </div>
    <h2>Почему мы?</h2>
    <div class="row">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header text-center">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Факт 1
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Качество выполняемой работы</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Факт 2
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Высококвалицицированный кадровый состав</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Факт 3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Надёжные конструктивные решения</div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
    </div>
    <div class="col-xl-4 col-md-6 col-lg-4 my-4 container-fluid">
        <h3>Наш центральный офис:</h3>
        <div class="footer_widget">
            <ul>
                <li><iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A1898799fb8d8df60e1704df15071402dbed23529e3b8fe732ef05d0169848ead&amp;source=constructor" width="600" height="500" frameborder="0"></iframe></li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal house -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Нами построенные дома</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel" style="">
                    <div class="carousel-inner rounded-5">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="img/house1.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="img/house2.jpg" class="d-block w-100" alt="2.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="img/house3.jpg" class="d-block w-100" alt="3.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="img/house4.jpg" class="d-block w-100" alt="3.jpg">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Назад</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Далее</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>