<?php
include "connect.php";
include "header.php";
?>
    <?php
    // если запрос GET
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
      $id = $conn->real_escape_string($_GET["id"]);
      $sql = "SELECT * FROM class WHERE id = '$id'";
      if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
          foreach ($result as $row) {
            $name = $row["name"];
            $degree = $row["degree"];
            $img1 = $row["img1"];
            $img2 = $row["img2"];
            $img3 = $row["img3"];
            $img4 = $row["img4"];
            $file = $row["file"];
            $description_min = $row["description_min"];
            $description_full = $row["description_full"];
          }
          echo "<div class='cintainer my-2 mx-2'><h3>" . $row["name"] . "</h3>
                <form method='post'>
                <div class='row my-3 mx-2'>
                  <div class='col'>
                  <div id='carouselExampleIndicators' class='carousel slide'>
                  <div class='carousel-indicators'>
                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='1' aria-label='Slide 2'></button>
                    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='2' aria-label='Slide 3'></button>
                  </div>
                  <div class='carousel-inner'>
                    <div class='carousel-item active'>
                      <img src='" . $row["img1"] . "' class='d-block w-100' alt='...'>
                    </div>
                    <div class='carousel-item'>
                      <img src='" . $row["img2"] . ".' class='d-block w-100' alt='...'>
                    </div>
                    <div class='carousel-item'>
                      <img src='" . $row["img3"] . "' class='d-block w-100' alt='...'>
                    </div>
                    <div class='carousel-item'>
                      <img src='" . $row["img4"] . "' class='d-block w-100' alt='...'>
                    </div>
                  </div>
                  <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                  </button>
                  <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                  </button>
                  </div>
                  </div>
                  <div class='col'>
                  <h3>" . $row["name"] . "</h3>
                  <h5 class='text-end my-3'>Первоначальная стоимость: " . $row["degree"] . " ₽.</h5>
                  <h5 class='text-center my-3'>" . $row["description_full"] . "</h5>
                  <!-- Button trigger modal -->
                  <div class='d-grid gap-2'>
                    <a type='button' class='btn btn-warning' href=" . $row["file"] . " download=''>
                    Скачать Смету
                    </a>
                  <a  type='button' class='btn btn-danger' href='catalog.php'>Обратно в каталог</a>
                  <h5 class='text my-3'>При подписании договора на постройку, обязательно проверяйте название постройки!</h5>
                  <!-- Modal -->
                  </div>
                 
                </div>
              </div>
                </form>
                </div>";
          $sql = "SELECT * FROM step_class WHERE id_class = '$id'";
          if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
              foreach ($result as $row) {
                $title = $row["title"];
                $img = $row["img"];
                $decription = $row["decription"];
                echo "<div class='container'><div class='card mb-3 my-3' style='max-width: 1300px;'>
                    <div class='row g-0'>
                      <div class='col-md-4'>
                        <img src='" . $row["img"] . "' class='img-fluid rounded-start' >
                      </div>
                      <div class='col-md-8'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $row["title"] . "</h5>
                          <p class='card-text'>" . $row["decription"] . "</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>";
              }
            }
          }
        } else {
          echo "<div>Заявка не найдена</div>";
        }
        $result->free();
      } else {
        echo "Ошибка: " . $conn->error;
      }
    }
    ?>
<?php
include "footer.php";
?>