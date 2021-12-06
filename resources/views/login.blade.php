<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
=======
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
>>>>>>> b3b06c9e26e523d06e4fdf7b8da1e53303f262e0
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @if ($retries <= 0)
        <div id="countdown" role="alert">
            <script>
                var timeleft = "<?php echo $seconds; ?>"
                var retries = "<?php echo $retries; ?>"
                var downloadTimer = setInterval(function() {
                    if (timeleft >= 0) {
                        document.getElementById("btnLogin").style.display = 'none';
                        document.getElementById("countdown").innerHTML =
                            "Número de tentativas excedido, aguarde " +
                            timeleft + " segundos!!";
                        timeleft--;
                    }
                    if (timeleft <= 0) {
                        document.getElementById("btnLogin").style.display = 'inline';
                        document.getElementById("countdown").style.display = 'none';
                        document.getElementById("countdown").innerHTML = "";
                        return;
                    }
                }, 1000);
            </script>
        </div>
    @endif
    <form method="POST" action="/login">
        {{ csrf_field() }}
        E-mail
        <input name="email" required type="email">
        Senha
<<<<<<< HEAD
        <input name="password" required type="password">
=======
        <input required type="password">
>>>>>>> b3b06c9e26e523d06e4fdf7b8da1e53303f262e0
        <button class="btn-primary" type="submit">Login</button>
    </form>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @include('messages')
</body>

</html>
