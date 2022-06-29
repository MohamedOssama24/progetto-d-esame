<?php
/* Smarty version 3.1.39, created on 2021-11-08 11:44:57
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\user\orders-details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6188ffa9cae882_22563063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1595d0423ca436a052e6a200c4ef3bf7525cdb09' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\user\\orders-details.tpl',
      1 => 1636104166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6188ffa9cae882_22563063 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5826564936188ffa9b3e2f2_66495538', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4231307706188ffa9b3f083_57531655', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_5826564936188ffa9b3e2f2_66495538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5826564936188ffa9b3e2f2_66495538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Profilo<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_4231307706188ffa9b3f083_57531655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4231307706188ffa9b3f083_57531655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\selen\\OneDrive\\Documents\\app\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php','function'=>'smarty_function_math',),));
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
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animated">
            <?php if ($_smarty_tpl->tpl_vars['order']->value->getState() != "Accepted") {?>
            <form action="/profile/<?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>
" method="post">
                <input type="text" name="orderId" class="quantity form-control input-number" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>
" hidden>
                <div style="display: flex; justify-content: center; margin-bottom: 60px">
                    <button class="btn btn-primary btn-number mb-2"  type="submit">Metti Prodotti nel Carrello</button>
                </div>
            </form>
            <?php }?>

            <div class="row">

                <div class="table-wrap order-table" >
                    <table class="table">

                        <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>Prodotto</th>
                            <th>Prezzo</th>
                            <th>Quantità</th>
                            <th>Totale</th>
                            <th>Azioni</th>
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
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value[1];?>

                                </td>
                                <td><?php echo smarty_function_math(array('equation'=>((string)$_smarty_tpl->tpl_vars['product']->value[0]->getPrice())." * ".((string)$_smarty_tpl->tpl_vars['product']->value[1])),$_smarty_tpl);?>
</td>

                                <td>
                                    <div class="desc" style="display: flex">
                                        <form action="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value[0]->getId();?>
">
                                            <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['order']->value->getState() == "Accepted") {?>
                <div style="display:flex; justify-content: center">
                    <h3>Il tuo ordine è stato accettato </h3>
                </div>
                <div style="display:flex; justify-content: center">
                    <h4> Orario di arrivo previsto: <?php echo $_smarty_tpl->tpl_vars['order']->value->getArrivalTime();?>
</h4>
                </div>
                <div style="display:flex; justify-content: center">
                    <form action="/profile/<?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>
/confirm" method="post">
                        <input type="text" name="orderId" class="quantity form-control input-number" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>
" hidden>
                        <button class="btn btn-primary btn-number mb-2"  type="submit">Conferma di aver ricevuto l'ordine</button>
                    </form>
                </div>
            <?php }?>
                </div>
             </div>
        </div>
    </section>
<?php
}
}
/* {/block 'body'} */
}
