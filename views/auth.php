<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-md text-center">
        <?php if ($status == 'success') : ?>
            <h1 class="alert alert-success" role="alert">Авторизация прошла успешно</h1>
            <h2 class="name">Привет <?= $name ?></h2>
            <a href="/vote" class="btn btn-primary">Поставить лайки</a>
        <?php else : ?>
            <h1 class="alert alert-warning" role="alert"><?= $status ?></h1>
            <a href="/" class="btn btn-primary">Вернутся на главную</a>
        <?php endif; ?>
    </div>
</body>
</html>