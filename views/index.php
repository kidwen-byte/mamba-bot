<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/auth.css">
    <title>Document</title>
</head>

<body>
    <main class="form-signin">
        <div class="container-md">
            <div class="row justify-content-center align-items-center vh-100">
                <form action="/signin" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Логин от аккаунта Tabor.ru</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль от аккаунта Tabor.ru</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary offset-md-3">Авторизоваться</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>