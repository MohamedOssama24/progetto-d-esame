<?php
/* Smarty version 3.1.39, created on 2021-11-08 10:16:51
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\auth\sign-up.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6188eb039e93b2_94095205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '247c0830268c74f68d7e2fdd4e4661c00168b3d0' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\auth\\sign-up.tpl',
      1 => 1636363010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6188eb039e93b2_94095205 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13799347416188eb039e1c98_80047678', 'title');
?>
</title>
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
<?php echo '<script'; ?>
>
    function myFunction() {
        if (!navigator.cookieEnabled){
            alert('Attenzione! Il sito potrebbe non funzionare correttamente se i cookie non sono abilitati. Prima di continuare a navigare, assicurati di aver abilitato i cookie.')
        }
    }
<?php echo '</script'; ?>
>

<body class="row justify-content-center pb-5" onload="myFunction()">
<div class="col-md-7" style="text-align: center" >
    <div class="contact-wrap w-100 p-md-5 p-4">
        <h3 style="padding-bottom: 1rem">Registrati</h3>
        <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="/signup" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="name">Nome</label>
                        <input required type="text" class="form-control" style="text-align: center"  id="name" name="name" placeholder="Nome" minlength="2" maxlength="40">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="email">Cognome</label>
                        <input required type="text" class="form-control" style="text-align: center" id="surname" name="surname" placeholder="Surname" minlength="2" maxlength="40">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="surname">Email</label>
                        <input required type="email" class="form-control" style="text-align: center"  id="email" name="email" placeholder="Email" minlength="2" maxlength="40">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="label" for="#">Password</label>
                        <input required type="password" class="form-control" style="text-align: center" id="password" name="password" placeholder="Password" minlength="5" maxlength="40">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label class="label" for="#">Immagine</label>
                    <div class="form-group">

                        <input type="file"
                               name="uploadfile"
                               value="" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php if ($_smarty_tpl->tpl_vars['message']->value != '') {?>
                    <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
                <?php }?>
            </div>
                <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <input hidden type="text" value="signup" name="option">
                        <input type="submit" value="Registrati" class="btn btn-primary">
                        <div class="submitting"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php echo '<script'; ?>
 src="/src/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery-migrate-3.0.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery.easing.1.3.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery.waypoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery.stellar.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/owl.carousel.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/jquery.animateNumber.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/scrollax.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/src/assets/js/main.js"><?php echo '</script'; ?>
><?php }
/* {block 'title'} */
class Block_13799347416188eb039e1c98_80047678 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_13799347416188eb039e1c98_80047678',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
registrazione<?php
}
}
/* {/block 'title'} */
}
