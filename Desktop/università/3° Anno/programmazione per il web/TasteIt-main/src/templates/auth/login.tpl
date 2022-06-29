<!doctype html>
<html lang="en">
<head>
    <title>{block name=title}login{/block}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TasteIt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/src/assets/css/animate.css">

    <link rel="stylesheet" href="/src/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/src/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/src/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="/src/assets/css/flaticon.css">
    <link rel="stylesheet" href="/src/assets/css/style.css">
</head>

<script>
    function myFunction() {
        if (!navigator.cookieEnabled){
            alert('Attenzione! Il sito potrebbe non funzionare correttamente se i cookie non sono abilitati. Prima di continuare a navigare, assicurati di aver abilitato i cookie.')
        }
    }
</script>

<body class="row justify-content-center pb-5" onload="myFunction()">
<div class="col-md-7" style="text-align: center">
    <div class="contact-wrap w-100 p-md-5 p-4">
        <h3 class="mb-4">Login</h3>
        <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="/login">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="label" for="subject">Email</label>
                        <input type="text" class="form-control" style="text-align:center" name="email" id="subject" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="label" for="#">Password</label>
                        <input type="password" class="form-control" style="text-align:center" name="password" id="subject" placeholder="Password">
                    </div>
                </div>
            {if $message!=""}
                <p>{$message}</p>
            {/if}
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Accedi" class="btn btn-primary">
                        <div class="submitting"></div>
                    </div>
                </div>
        </form>
        <form action="/signup" method="get">
            <div class="col-md-12 mt-4">
                <div class="form-group">
                    <input hidden type="text" value="signup" name="option">
                    <input type="submit" value="Registrati" class="btn btn-primary">
                    <div class="submitting"></div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="/src/assets/js/jquery.min.js"></script>
<script src="/src/assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/src/assets/js/popper.min.js"></script>
<script src="/src/assets/js/bootstrap.min.js"></script>
<script src="/src/assets/js/jquery.easing.1.3.js"></script>
<script src="/src/assets/js/jquery.waypoints.min.js"></script>
<script src="/src/assets/js/jquery.stellar.min.js"></script>
<script src="/src/assets/js/owl.carousel.min.js"></script>
<script src="/src/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/src/assets/js/jquery.animateNumber.min.js"></script>
<script src="/src/assets/js/scrollax.min.js"></script>
<script src="/src/assets/js/main.js"></script>