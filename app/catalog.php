<?php
include "connect.php";
include "html_start.php";
include "header.php";
include "modal_zayavki.php";
?>
<div class="container-fluid	mx-1 my-1">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <?php
                $sqlm = "SELECT * FROM class";
                if ($result = $link->query($sqlm)) {
                    $rowsCount = $result->num_rows;
                ?>
                <?php
                    foreach ($result as $row) {
                        echo "<div class='card mx-2 my-2 p-0' style='width: 45rem;'>";
                        echo "<img src='" . $row["img1"] . "' class= 'card-img-top' >";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                        echo "<h5 class='card-title'>Цена: " . $row["degree"] . "р.</h5>";
                        echo "<p class='card-text'>" . $row["description_min"] . "</p>";
                        echo "<a class='btn btn-outline-primary' href='more_inf.php?id=" . $row["id"] . "'>Подробнее</a>";
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
        <!-- <div class="col my-3">
            <form name="search" method="post" action="search.php" class="d-flex">
                <input class="form-control me-2" type="search" name="query" placeholder="Поиск">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </div> -->
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
<?php
include "footer.php";
?>