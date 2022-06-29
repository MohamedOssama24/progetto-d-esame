<?php
/* Smarty version 3.1.39, created on 2021-11-05 18:44:55
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\admin\products\reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61856d97b93324_19687100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '991da4a2dee0513b5ec81956e6fb7f8b610013be' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\admin\\products\\reviews.tpl',
      1 => 1636134293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61856d97b93324_19687100 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43108352961856d97b86504_61987987', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_43108352961856d97b86504_61987987 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_43108352961856d97b86504_61987987',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <?php if ($_smarty_tpl->tpl_vars['reviews']->value != array()) {?>
                <div class="card card-user">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Stelle
                                </th>
                                <th>
                                    Commento
                                </th>
                                <th>
                                    Cliente
                                </th>
                                </thead>
                                <tbody>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviews']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
                                    <tr>
                                        <td>
                                            <div class="rating d-flex">
                                                <p class="text-left mr-4">
                                                    <a href="#">
                                                    <span>
                                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['r']->value->getStars();
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_prefixVariable1+1 - (1) : 1-($_prefixVariable1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
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
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['r']->value->getComment();?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['r']->value->getCustomer()->getName();?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value->getCustomer()->getSurname();?>

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
            <h3>Non ci sono recensioni per questo prodotto.</h3>
            <?php }?>
        </div>
    </div>
<?php
}
}
/* {/block 'admin'} */
}
