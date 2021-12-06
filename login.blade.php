<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
        <input required type="email">
        Senha
        <input required type="password">
        <button class="btn-primary" type="submit">Login</button>
    </form>
</body>

</html>
