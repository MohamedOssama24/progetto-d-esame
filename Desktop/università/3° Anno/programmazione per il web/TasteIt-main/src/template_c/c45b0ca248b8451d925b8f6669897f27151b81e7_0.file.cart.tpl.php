<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:26:34
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\cart\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf587a788a45_22608031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c45b0ca248b8451d925b8f6669897f27151b81e7' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\cart\\cart.tpl',
      1 => 1656617401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf587a788a45_22608031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38353423862bf587a72f596_04062403', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89391640062bf587a730fa5_79003960', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_38353423862bf587a72f596_04062403 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_38353423862bf587a72f596_04062403',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Carrello<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_89391640062bf587a730fa5_79003960 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_89391640062bf587a730fa5_79003960',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\mohamed\\Desktop\\università\\3°Anno\\programmazioneperilweb\\TasteIt-main\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <h2 class="mb-0 bread">Il mio carrello</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">

    <div class="container">
        <div class="row">
            <?php if ($_smarty_tpl->tpl_vars['products']->value != array()) {?>
            <div class="table-wrap" style="overflow:hidden">
                <table class="table">

                    <thead class="thead-primary">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Prodotto</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                        <th>Totale</th>
                        <th>&nbsp;</th>
                    </tr>

                    </thead>

                    <tbody>
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                    <tr class="alert" role="alert">
                         <td>
                            <div class="img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getImagePath();?>
);"></div>
                        </td>
                       <td>
                            <div class="email">
                                <span><?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getName();?>
</span>
                                <span><?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getDescription();?>
</span>
                            </div>
                        </td>
                          <td><?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getPrice();?>
</td>
                        <td class="quantity">
                            <div class="input-group" style="width: 9em">
                                <form action="/carts/<?php echo $_smarty_tpl->tpl_vars['cart']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" method="POST" style="float: left">
                                    <div class="button minus">

                                        <input hidden type="text" value="PUT" name="_method">
                                        <input hidden type="text" value="minus" name="option">
                                        <input type="text" name="productId" class="quantity form-control input-number" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" hidden>

                                        <button class="btn btn-primary btn-number" type="submit"
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value[1] == 1) {?>
                                                    disabled
                                                <?php }?>
                                        >
                                            -
                                        </button>
                                    </div>
                                </form>

                                <input type="text" name="quantity" class="input-number"  data-min="1" data-max="100" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[1];?>
" style="width: 2em " readonly>

                                <form action="/carts/<?php echo $_smarty_tpl->tpl_vars['cart']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" method="POST" style="float: right">
                                    <div class="button plus">

                                        <input hidden type="text" value="PUT" name="_method">
                                        <input hidden type="text" value="plus" name="option">
                                        <input type="text" name="productId" class="quantity form-control input-number" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" hidden>

                                        <button class="btn btn-primary btn-number" type="submit"> + </button>
                                    </div>
                                </form>

                            </div>
                        </td>
                          <td><?php echo smarty_function_math(array('equation'=>((string)$_smarty_tpl->tpl_vars['product']->value[0]->getPrice())." * ".((string)$_smarty_tpl->tpl_vars['product']->value[1])),$_smarty_tpl);?>
</td>
                        <td>
                                                      <form action="/carts/<?php echo $_smarty_tpl->tpl_vars['cart']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" method="POST">

                                <div class="button delete">

                                    <input hidden type="text" value="DELETE" name="_method">
                                    <input hidden type="text" value="delete" name="option">
                                    <input type="text" name="productId" class="quantity form-control input-number" value="<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
" hidden>

                                    <button class="btn btn-primary btn-number" type="submit"> X </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Totale del carrello</h3>
                   <p class="d-flex">
                        <span>
                            Totale parziale
                        </span>
                        <span>
                            <?php $_smarty_tpl->_assignInScope('partialTotal', 0);?>
                             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                 <?php $_smarty_tpl->_assignInScope('partialTotal', $_smarty_tpl->tpl_vars['partialTotal']->value+$_smarty_tpl->tpl_vars['product']->value[0]->getPrice()*$_smarty_tpl->tpl_vars['product']->value[1]);?>
                             <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            $ <?php echo $_smarty_tpl->tpl_vars['partialTotal']->value;?>

                        </span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex total-price">
                        <span>Totale</span>
                        <span>

                                                         $ <?php echo $_smarty_tpl->tpl_vars['partialTotal']->value;?>

                        </span>
                    </p>
                </div>
                <p class="text-center"><a href="/cart/checkout" class="btn btn-primary py-3 px-4 <?php if ($_smarty_tpl->tpl_vars['products']->value == array()) {?>disabled<?php }?>">checkout</a></p>
            </div>
            <?php } else { ?>
            <h3>Non ci sono prodotti nel carrello.</h3>
            <?php }?>
        </div>
    </div>
</section>
<?php
}
}
/* {/block 'body'} */
}
