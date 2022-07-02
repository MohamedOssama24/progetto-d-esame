<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:26:38
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\product\all_products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf587ed64d74_97663315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95a224de7f4a7824a32657c6cc65fafc61df2a55' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\product\\all_products.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf587ed64d74_97663315 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168072994862bf587ed1fc11_63603689', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_95406881462bf587ed23613_45779765', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_168072994862bf587ed1fc11_63603689 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_168072994862bf587ed1fc11_63603689',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Prodotti<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_95406881462bf587ed23613_45779765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_95406881462bf587ed23613_45779765',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://s1.1zoom.me/b6359/903/Meat_products_Salt_536334_1920x1080.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animated mb-3 text-center">
                    <h2 class="mb-0 bread">Tutti i prodotti</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h4 class="product-select">Seleziona un prodotto</h4>
        </div>
    </div>
        <div class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                <div class="col-md-3 d-flex">
                    <div class="product ftco-animated">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['product']->value->getImagePath();?>
');">
                            <div class="desc" style="display: flex">
                                <p class="meta-prod d-flex">
                                    <?php if ((isset($_smarty_tpl->tpl_vars['cartId']->value))) {?>
                                <form action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/carts/<?php echo $_smarty_tpl->tpl_vars['cartId']->value;?>
" method="POST">
                                    <input type="text" id="productQuantity" name="quantity" class="quantity form-control input-number" value="1" hidden>
                                    <button style="margin-right: 1rem" id="productQuantity"class="btn btn-primary btn-number" type="submit"><span class="flaticon-shopping-bag"></span></button>
                                </form>
                                <?php }?>
                                <?php if ((isset($_smarty_tpl->tpl_vars['favId']->value))) {?>
                                    <form action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/favourites/<?php echo $_smarty_tpl->tpl_vars['favId']->value;?>
" method="POST">
                                        <button class="btn btn-primary btn-number" type="submit"><span class="flaticon-heart"></span></button>
                                    </form>
                                <?php }?>
                                <form action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                    <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                </form>
                                </p>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h2> <?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h2>
                            <p class="mb-0">
                                <span class="price">$<?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
</span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </div>
    </div>
    </div>
    </section>


<?php
}
}
/* {/block 'body'} */
}
