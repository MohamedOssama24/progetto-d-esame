<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:27:16
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\admin\coupons\coupons.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf58a447aac8_14588793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d596fe9b91460b8d9f5a9c6cd3c4b1386b4b3d4' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\admin\\coupons\\coupons.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf58a447aac8_14588793 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183435913862bf58a4454268_31103092', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_183435913862bf58a4454268_31103092 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_183435913862bf58a4454268_31103092',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <?php if ($_smarty_tpl->tpl_vars['coupons']->value != array()) {?>
                <div class="card card-user">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Id
                                </th>
                                <th>
                                    Sconto
                                </th>
                                <th>
                                    Data di Scadenza
                                </th>
                                </thead>
                                <tbody>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coupons']->value, 'coupon');
$_smarty_tpl->tpl_vars['coupon']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['coupon']->value) {
$_smarty_tpl->tpl_vars['coupon']->do_else = false;
?>
                                    <tr>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['coupon']->value->getId();?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['coupon']->value->getpriceCut();?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['coupon']->value->getExpirationDate();?>

                                        </td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <?php } else { ?>
            <h3>Non ci sono coupon attivi al momento.</h3>
            <?php }?>
        </div>
    </div>
<?php
}
}
/* {/block 'admin'} */
}
