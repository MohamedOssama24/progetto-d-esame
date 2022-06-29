<?php
/* Smarty version 3.1.44, created on 2022-05-25 17:33:32
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\order\order-summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_628e4c4c560ca2_06170592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '973a259ccc9da90d704cea3c03c4d29eec7f2d6d' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\order\\order-summary.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628e4c4c560ca2_06170592 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1022715407628e4c4c53c182_46155858', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1002815826628e4c4c53ce12_07581228', 'categories');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_121868338628e4c4c53d510_29584801', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_1022715407628e4c4c53c182_46155858 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1022715407628e4c4c53c182_46155858',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Carrello<?php
}
}
/* {/block 'title'} */
/* {block 'categories'} */
class Block_1002815826628e4c4c53ce12_07581228 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'categories' => 
  array (
    0 => 'Block_1002815826628e4c4c53ce12_07581228',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'categories'} */
/* {block 'body'} */
class Block_121868338628e4c4c53d510_29584801 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_121868338628e4c4c53d510_29584801',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h2 class="mb-0 bread">Ordine</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12 ftco-animate">

                    <h3 style="text-align: center">Il tuo ordine è arrivato in cucina. Aspetta che il ristorante confermi il tuo ordine.</h3>
                        <div class="row mt-5 pt-3 d-flex">

                            <div class="col-md-4 d-flex">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>

                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <?php $_smarty_tpl->_assignInScope('subtotal', 0);?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value->getProducts(), 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                            <?php $_smarty_tpl->_assignInScope('subtotal', $_smarty_tpl->tpl_vars['subtotal']->value+$_smarty_tpl->tpl_vars['product']->value[0]->getPrice()*$_smarty_tpl->tpl_vars['product']->value[1]);?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <span>$<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount</span>
                                        <?php if ($_smarty_tpl->tpl_vars['coupon']->value == '') {?>
                                        <span>0%</span>
                                        <?php } else { ?>
                                            <span><?php echo $_smarty_tpl->tpl_vars['coupon']->value->getPriceCut();?>
%</span>
                                        <?php }?>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <?php if ($_smarty_tpl->tpl_vars['coupon']->value != '') {?>
                                        <span>$<?php echo $_smarty_tpl->tpl_vars['subtotal']->value-($_smarty_tpl->tpl_vars['subtotal']->value*$_smarty_tpl->tpl_vars['coupon']->value->getPriceCut()/100);?>
</span>
                                        <?php } else { ?>
                                            <span>$<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</span>
                                        <?php }?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Indirizzi</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label>Via <?php echo $_smarty_tpl->tpl_vars['address']->value->getStreet();?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value->getHomeNumber();?>
, <?php echo $_smarty_tpl->tpl_vars['address']->value->getCity();?>
</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Metodo di pagamento</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <?php if (get_class($_smarty_tpl->tpl_vars['card']->value) == "App\Models\CreditCard") {?>
                                                    <label><?php echo $_smarty_tpl->tpl_vars['card']->value->getNumber();?>
</label>
                                                        <?php } else { ?>
                                                        <label>Contanti</label>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <form method="get" action="/home">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn btn-primary w-25" style="margin-left: 1rem" id="ordine" type="submit">Torna alla home</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section>

<?php
}
}
/* {/block 'body'} */
}
