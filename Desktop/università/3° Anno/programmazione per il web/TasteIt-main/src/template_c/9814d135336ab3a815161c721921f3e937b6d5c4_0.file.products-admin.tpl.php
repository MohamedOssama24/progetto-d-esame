<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:27:10
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\admin\categories\products-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf589ee77b96_89136346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9814d135336ab3a815161c721921f3e937b6d5c4' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\admin\\categories\\products-admin.tpl',
      1 => 1656446675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf589ee77b96_89136346 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122626905562bf589ee4b004_57591802', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_122626905562bf589ee4b004_57591802 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_122626905562bf589ee4b004_57591802',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div style="display:flex; justify-content: center">
                <form action="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products/form" method="get">
                    <button class="btn btn-primary">Aggiungi Prodotto</button>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title" style="margin-left:20px"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive order-table">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Nome
                            </th>
                            <th>
                                Descrizione
                            </th>
                            <th>
                                Prezzo
                            </th>
                            <th>
                                Volte Ordinato
                            </th>
                            <th>
                                Azioni
                            </th>
                            </thead>
                            <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                <tr>

                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>

                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['product']->value->getTimesOrdered();?>

                                        <?php if ($_smarty_tpl->tpl_vars['product']->value->getTimesOrdered() == NULL) {?>0<?php }?>
                                    </td>
                                    <td>
                                    <div class="row">
                                        <a href="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/edit">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="edit">
                                            </a>
                                        <form method="post" action="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="delete">
                                        </form>
                                        <a href="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
/reviews">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="reviews">
                                        </a>
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
            </div>

        </div>
    </div>
    <?php echo '<script'; ?>
>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }

        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'admin'} */
}
