<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:27:17
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\admin\orders\orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf58a57f51c8_90457830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea50c4c614a1049285e1898d93053e8e9adb21cf' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\admin\\orders\\orders.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf58a57f51c8_90457830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_208362237862bf58a57e2dc1_18577125', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_208362237862bf58a57e2dc1_18577125 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_208362237862bf58a57e2dc1_18577125',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <h4 class="card-title" style="margin-left:20px"></h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive order-table">
              <table class="table">

                <thead class=" text-primary">
                <th>
                  Id
                </th>
                <th>
                  Data
                </th>
                <th>
                  Totale
                </th>
                <th>
                  Stato
                </th>
                <th>
                  Action
                </th>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
?>

                  <tr>
                    <td>
                      <?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>

                    </td>
                    <td>
                      <?php echo $_smarty_tpl->tpl_vars['order']->value->getCreationDate();?>

                    </td>
                    <td>
                      $<?php echo $_smarty_tpl->tpl_vars['order']->value->getTotal();?>

                    </td>
                    <td>
                      <?php echo $_smarty_tpl->tpl_vars['order']->value->getState();?>

                    </td>
                    <td>
                      <a href="/admin/orders/<?php echo $_smarty_tpl->tpl_vars['order']->value->getId();?>
" class="btn btn-primary">Dettagli Ordine</a>
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
    </div>
<?php
}
}
/* {/block 'admin'} */
}
