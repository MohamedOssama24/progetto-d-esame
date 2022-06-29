<?php
/* Smarty version 3.1.39, created on 2021-11-05 18:04:51
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\base\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6185643334a1b4_57781284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cb444c381f62417d1be4af8dc8ad9990dbf9840' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\base\\nav.tpl',
      1 => 1636104166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6185643334a1b4_57781284 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <p class="mb-0 phone pl-md-2">
                    <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 3208976543</a>
                    <a href="#"><span class="fa fa-paper-plane mr-1"></span> tasteit@gmail.com</a>
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="reg"><?php if ($_smarty_tpl->tpl_vars['user']->value == NULL) {?>
                    <p class="mb-0"><a href="/signup" class="mr-2">Registrati</a> <a href="/login">Log In</a> </p><p class="mb-0"></p><?php } else { ?><p class="mb-0"><a href="/logout">Log Out</a></p><p class="mb-0"></p><?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">

    <div class="container" style="justify-content: space-between">
        <a class="navbar-brand" href="/home">Taste<span>It</span></a>

        <?php if ((isset($_smarty_tpl->tpl_vars['cartId']->value))) {?>
            <div class="order-lg-last btn-group">
                <button id="cart-btn" href="#" class="btn-cart btn dropdown-toggle dropdown-toggle-split" style="color: #b7472a" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center"><small><?php echo sizeof($_smarty_tpl->tpl_vars['cartProducts']->value);?>
</small></div>
                </button>

                <div id="cart-dropdown" class="dropdown-menu dropdown-menu-right">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cartProducts']->value, 'productWithQuantity');
$_smarty_tpl->tpl_vars['productWithQuantity']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['productWithQuantity']->value) {
$_smarty_tpl->tpl_vars['productWithQuantity']->do_else = false;
?>

                        <div class="dropdown-item d-flex align-items-start" href="#">
                            <div class="img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['productWithQuantity']->value[0]->getImagePath();?>
)"></div>
                            <div class="text pl-3">
                                <h4><?php echo $_smarty_tpl->tpl_vars['productWithQuantity']->value[0]->getName();?>
</h4>
                                <p class="mb-0"><a href="#" class="price">$<?php echo $_smarty_tpl->tpl_vars['productWithQuantity']->value[0]->getPrice();?>
</a><span class="quantity ml-3">Quantità: <?php echo $_smarty_tpl->tpl_vars['productWithQuantity']->value[1];?>
</span></p>
                            </div>
                        </div>

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <a class="dropdown-item text-center btn-link d-block w-100" href="/carts/<?php echo $_smarty_tpl->tpl_vars['cartId']->value;?>
/products">
                        Vai al carrello
                        <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </div>
            </div>
        <?php }?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/aboutUs" class="nav-link">Su di noi</a></li>
                <?php if ((isset($_smarty_tpl->tpl_vars['favId']->value))) {?>
                    <li class="nav-item"><a href="/favourites/<?php echo $_smarty_tpl->tpl_vars['favId']->value;?>
" class="nav-link">Preferiti</a></li>
                <?php }?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Categorie</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04" id="dropdown-menu">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                            <a class="dropdown-item" href="/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products"> <?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
 </a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contattaci</a></li>
                <?php if ((isset($_smarty_tpl->tpl_vars['cartId']->value))) {?>
                <li class="nav-item"><a href="/profile" class="nav-link">Profilo</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
