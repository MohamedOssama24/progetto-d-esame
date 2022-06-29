<?php
/* Smarty version 3.1.40, created on 2021-11-10 16:30:04
  from 'C:\xampp\htdocs\TasteIt\src\templates\admin\orders\orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.40',
  'unifunc' => 'content_618be57c990d16_76304693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6c43d7d71efc52c4b9ee9bc2b13656fd98e7ffb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TasteIt\\src\\templates\\admin\\orders\\orders.tpl',
      1 => 1636371780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618be57c990d16_76304693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1102315369618be57c94dc55_02586548', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_1102315369618be57c94dc55_02586548 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_1102315369618be57c94dc55_02586548',
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
