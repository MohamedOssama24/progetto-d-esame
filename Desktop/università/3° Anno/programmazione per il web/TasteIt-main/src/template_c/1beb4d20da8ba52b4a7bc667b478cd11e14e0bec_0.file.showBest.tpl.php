<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:41:16
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\admin\customers\showBest.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc82c0c3cb5_84832313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1beb4d20da8ba52b4a7bc667b478cd11e14e0bec' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\admin\\customers\\showBest.tpl',
      1 => 1637151474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc82c0c3cb5_84832313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1943964679619bc82c0b44e2_89788675', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_1943964679619bc82c0b44e2_89788675 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_1943964679619bc82c0b44e2_89788675',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <form action="/admin/customers" method="post">

                    <div class="row">
                        <div class="col-md-2 pr-1">
                            <div class="form-group">
                                <label>Percentuale%</label>
                                <input type="text" class="form-control" name="pricecut" placeholder="Percentuale di sconto" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Data di Scadenza</label>
                                <input type="date" class="form-control" name="expiration" min="<?php echo date("Y-m-d");?>
">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Invia</button>

                    <h6>I coupon verranno inviati a:</h6>

                    <?php if ($_smarty_tpl->tpl_vars['customers']->value == NULL) {?> <h5>non ci sono utenti a cui mandare coupon questo mese</h5>
                    <?php } else { ?>
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Nome
                        </th>
                        <th>
                            Cognome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Totale
                        </th>
                        </thead>
                        <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customers']->value, 'customer');
$_smarty_tpl->tpl_vars['customer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customer']->value) {
$_smarty_tpl->tpl_vars['customer']->do_else = false;
?>
                                <input type="text" hidden name="customers[]" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->getId();?>
">
                                <tr>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->getName();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->getSurname();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['customer']->value[0]->getEmail();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['customer']->value[1];?>

                                    </td>
                                </tr>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block 'admin'} */
}
