<!doctype html>
<html lang="en">
<head>
    <title>{block name=title}nav{/block}</title>
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
    <style>
        .order-table {
            overflow-x: auto;
        }


        /* Quando lo schermo e' >= 1200px */
        @media (min-width: 1200px) {
            .order-table {
                overflow: hidden;
            }
        }
    </style>
</head>



<body style="height: 100vh;" onload="myFunction()">

<script>
    function myFunction() {
        if (!navigator.cookieEnabled){
            alert('Attenzione! Il sito potrebbe non funzionare correttamente se i cookie non sono abilitati. Prima di continuare a navigare, assicurati di aver abilitato i cookie.')
        }
    }
</script>

{include file='src/templates/base/nav.tpl'}

{block name=body}{/block}

{include file='src/templates/base/footer.tpl'}


<!-- loader -->
{*<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>*}

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

</body>
</html>