<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:30:08
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\product\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc59050f4f9_47358697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb478c455c4e93fe3cb7b6e42ac03ed3d2641027' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\product\\product.tpl',
      1 => 1637598606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc59050f4f9_47358697 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1108168343619bc59038e803_68335341', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1167848395619bc590391789_80463982', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_1108168343619bc59038e803_68335341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1108168343619bc59038e803_68335341',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Prodotto<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_1167848395619bc590391789_80463982 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1167848395619bc590391789_80463982',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<section class="hero-wrap hero-wrap-2" style="background-image: url('/src/assets/images/cibo.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div >
                <h2 class="mb-0 bread">Prodotto </h2>
            </div>
        </div>
    </div>

</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['product']->value->getImagePath();?>
);">
            </div>
            <div class="col-lg-6 product-details pl-md-5 ">
                <h3><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <?php if ($_smarty_tpl->tpl_vars['avg']->value != 0) {?>
                        <a href="#" class="mr-2"><?php echo round($_smarty_tpl->tpl_vars['avg']->value,1);?>
</a>

                        <a href="#">
                            <span>
                                <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? round($_smarty_tpl->tpl_vars['avg']->value)+1 - (1) : 1-(round($_smarty_tpl->tpl_vars['avg']->value))+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration === 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration === $_smarty_tpl->tpl_vars['var']->total;?>
                                    <i class="fa fa-star"></i>
                                <?php }
}
?>
                            </span>
                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                        </a>
                        <?php }?>
                </div>
                <p class="price"><span> EUR <?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
</span></p>
                <p><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</p>

                <div class="row mt-4">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <?php if ($_smarty_tpl->tpl_vars['cartId']->value) {?>
                            <form id="addProductToCartForm" action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/carts/<?php echo $_smarty_tpl->tpl_vars['cartId']->value;?>
" method="POST">
                                <div class="d-flex mb-4">
                                    <button id="minus" class="mr-2" type="button"><i class="fa fa-minus"></i></button>
                                    <input type="text" id="productQuantity" name="quantity" class="quantity form-control input-number" value="1">
                                    <button id="plus" class="ml-2" type="button"><i class="fa fa-plus"></i></button>
                                </div>

                                                                <button class="btn btn-primary" style="padding-bottom: 2rem;" type="submit">Aggiungi al carrello</button>

                            </form>
                        <?php }?>
                        <?php echo '<script'; ?>
>
                            const input = document.querySelector('#productQuantity');
                            input.value = 1;

                            const minusBtn = document.querySelector('#minus');
                            const plusBtn = document.querySelector('#plus');

                            const form = document.querySelector('#addProductToCartForm');


                            if(minusBtn && plusBtn) {
                                minusBtn.addEventListener('click', () => {
                                    if (input.value > 1) {
                                        input.value = parseInt(input.value, 10) - 1;
                                    }
                                });

                                plusBtn.addEventListener('click', () => {
                                    input.value = parseInt(input.value, 10) + 1;
                                });
                            }
                        <?php echo '</script'; ?>
>
                      </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                    </div>
                </div>

            </div>
        </div>

            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
                        <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>
                    </div>

                </div>
            <div class="col-md-12 ">
                <div  class="tab-content bg-light" id="v-pills-tabContent">

                    <div class="tab-pane fade show active"  id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <p class="mb-4"><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                <h3 class="mb-4"><?php echo count($_smarty_tpl->tpl_vars['reviews']->value);?>
 Recensione/i</h3>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviews']->value, 'review');
$_smarty_tpl->tpl_vars['review']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['review']->value) {
$_smarty_tpl->tpl_vars['review']->do_else = false;
?>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['review']->value->getCustomer()->getImagePath();?>
)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left"><?php echo $_smarty_tpl->tpl_vars['review']->value->getCustomer()->getName();?>
 <?php echo $_smarty_tpl->tpl_vars['review']->value->getCustomer()->getSurname();?>
</span>
                                        </h4>
                                        <p class="star">
								   				<span>
                                                    <?php
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['review']->value->getStars()+1 - (1) : 1-($_smarty_tpl->tpl_vars['review']->value->getStars())+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration === 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration === $_smarty_tpl->tpl_vars['var']->total;?>
								   					    <i class="fa fa-star"></i>
                                                    <?php }
}
?>
							   					</span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <div >
                                                <div class="item">
                                                    <div >
                                                        <div class="text">
                                                            <p class="mb-4"><?php echo $_smarty_tpl->tpl_vars['review']->value->getComment();?>
</p>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>

                            <div>

                                <?php if ($_smarty_tpl->tpl_vars['cartId']->value) {?>
                                <div class="contact-wrap w-100 p-md-5">
                                        <h3 class="mb-5">Lascia una recensione</h3>
                                            <form action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/reviews" method="POST" id="add">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label class="label" for="subject">Stelle</label>
                                                                <input type="number" class="form-control" name="stars" id="stars" placeholder="Valuta da 1 a 5 stelle" max="5" min="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                            <label class="label" for="#">Commento (facoltativo)</label>
                                                                            <input type="text" name="comment" class="form-control" id="comment" placeholder="Descrivi il prodotto" maxlength="100">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                            <button id="add" class="btn btn-primary btn-number" type="submit">Aggiungi</span></button>
                                                                    </div>
                                                                </div>
                                                </div>
                                            </form>
                                 </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
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
