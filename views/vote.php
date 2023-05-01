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
    <div class="container d-flex justify-content-center vh-100  ">
        <div class="content row d-flex justify-content-center align-self-center">

                <h1 class="alert alert-success" role="alert">Авторизация прошла успешно</h1>
                <h2 class="name">Привет <?= $name ?></h2>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control count" placeholder="Количество лайков">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Город">
                        <div id="passwordHelpBlock" class="form-text">Ставить лайки только людям из заданного населенного пункта</div>
                    </div>
                </div>
                <p class="text-center"> Будть аккуратны с возрастным фильтром! </p>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control age" placeholder="Возрост от">
                        <div id="passwordHelpBlock" class="form-text">1) Указывайте только цифры в возрастном фильтре, иначе для вашего аккаунта прекратятся показы людей и вам придется писать в поддержку tabor.ru</div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control age" placeholder="возрост до">
                        <div id="passwordHelpBlock" class="form-text">2) На сайте tabor.ru есть ограничения на показ людей, которые более чем на 10 лет старше или младше вашего возраста. Это платная функция VIP. Данный бот игнорирует эти ограничения, поэтому есть вероятность получить бан.</div>
                    </div>
                    <button class="btn btn-primary col-md-3 button-ages align-self-start">Сохранить</button>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control message" placeholder="Сообщение">
                    </div>
                </div>
                <button class="btn btn-primary col-md-3 mb-4 button-like">Поставить лайки</button>

        </div>

    </div>
</body>

</html>


<script>
    let button_ages = document.querySelector('.button-ages');
    let age = document.querySelectorAll('.age');
    let content = document.querySelector('.content');

    button_ages.addEventListener('click', () => {
        let success_age = document.querySelector('.age-message');
        (
            async () => {
                const response = await fetch('/vote/age', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        age_min: age[0].value,
                        age_max: age[1].value
                    })
                });

                const answer = await response.json();

                if (success_age) {
                    success_age.remove();
                }
                let setup = document.createElement('p');
                setup.className = 'alert alert-success age-message';
                setup.innerText = answer;
                content.append(setup);
            }
        )();
    });

    let button_like = document.querySelector('.button-like');
    let count = document.querySelector('.count');

    button_like.addEventListener('click', () => {
        /*   let success_age = document.querySelector('.age-message'); */
        (
            async () => {
                const response = await fetch('/vote/like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({
                        count: count.value
                        /* ,
                                                age_max: age[1].value */
                    })
                });

                const answer = await response.json();
                /* 
                                if (success_age) {
                                    success_age.remove();
                                }
                                let setup = document.createElement('p');
                                setup.className = 'alert alert-success age-message';
                                setup.innerText = answer;
                                content.append(setup); */
            }
        )();
    });
    let button_message = document.querySelector('.button-message');

    button_message.addEventListener('click', () => {
        /*   let success_age = document.querySelector('.age-message'); */
        (
            async () => {
                const response = await fetch('/vote/message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({})
                });

                /*     const answer = await response.json(); */
                /* 
                                if (success_age) {
                                    success_age.remove();
                                }
                                let setup = document.createElement('p');
                                setup.className = 'alert alert-success age-message';
                                setup.innerText = answer;
                                content.append(setup); */
            }
        )();
    });
</script>