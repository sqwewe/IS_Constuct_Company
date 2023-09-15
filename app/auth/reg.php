<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    require_once __DIR__ . '/boot.php';
    $user = null;
    if (check_auth()) {
        // Получим данные пользователя по сохранённому идентификатору
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <?php if ($user) { ?>

        <h1>Привет, <?= htmlspecialchars($user['username']) ?>!</h1>

        <form class="mt-5" method="post" action="do_logout.php">
            <button type="submit" class="btn btn-primary">Выход</button>
        </form>

    <?php } else { ?>
        <div class="container">
            <h1 class="mb-5">Регистрация</h1>
            <?php flash(); ?>
            <form method="post" action="do_register.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Логин (4-6 символов)</label>
                    <input type="text" class="form-control" id="username" name="username" required  minlength="4" maxlength="16">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">ФИО</label>
                    <input type="text" class="form-control" id="name" name="name" required minlength="10">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль (минимально 4 символа)</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="4" required>
                </div>
                <button type="submit" class="btn btn-primary">Зарегестрировать</button>
            </form>
        </div>
    <?php } ?>








</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>