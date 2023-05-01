<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/signin.css">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100 justify-content-center">
            <div class="col-6 text-center">
                <div class="spinner">
                    <svg class="circle">
                        <linearGradient id="Gradient2" x1="0" x2="1" y1="0" y2="0">
                            <stop offset="0%" stop-color="#0400ff" />
                            <stop offset="100%" stop-color="#0400ff" />
                        </linearGradient>
                        <circle cx="30" cy="30" r="26" />
                    </svg>
                    <svg class="check">
                        <path d="M21 32 L27 37 L 39 23" />
                    </svg>
                    <svg class="error">
                        <path d="M23 23 L37 37 M37 23 L23 37" />
                    </svg>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    let auth = <?php echo json_encode($status); ?>;

    const spinner = document.querySelector('.spinner');
    spinner.classList.add('loading');
    if (auth.status == 'error') {

        setTimeout(() => {
            spinner.classList.add('error');
            spinner.classList.remove('success');
        }, 1000);
        setTimeout(() => {
            spinner.insertAdjacentHTML('afterend',
                `<div class="mt-5 position-absolute top-60 start-50">
                    <div class="alert alert-danger b-show d-flex align-items-center translate-middle" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>` + auth.code + `</div>
                    </div>
                    <div class="alert alert-danger b-show d-flex align-items-center translate-middle" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>` + auth.message + `</div>
                    </div>
                </div>`);
        }, 1500);

    } else {
        setTimeout(() => {
            spinner.classList.add('success');
            spinner.classList.remove('error');
        }, 1000);
        setTimeout(() => {
            spinner.insertAdjacentHTML('afterend',
                `<div class="alert mt-5 alert-success b-show d-flex align-items-center position-absolute top-60 start-50 translate-middle" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    ` + auth.message + `
                </div>
            </div>`);
        }, 1700);
    }
</script>