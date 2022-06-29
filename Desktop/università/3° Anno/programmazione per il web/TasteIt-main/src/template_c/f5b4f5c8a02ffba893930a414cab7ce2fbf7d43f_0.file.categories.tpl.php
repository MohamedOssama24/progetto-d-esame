<?php
/* Smarty version 3.1.40, created on 2021-11-05 14:00:32
  from 'C:\xampp\htdocs\TasteIt\src\templates\admin\categories\categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.40',
  'unifunc' => 'content_61852af0d47f42_07871133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5b4f5c8a02ffba893930a414cab7ce2fbf7d43f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TasteIt\\src\\templates\\admin\\categories\\categories.tpl',
      1 => 1636117033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61852af0d47f42_07871133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129817119861852af0d3fe83_39673243', 'admin');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/admin/leftMenu.tpl');
}
/* {block 'admin'} */
class Block_129817119861852af0d3fe83_39673243 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'admin' => 
  array (
    0 => 'Block_129817119861852af0d3fe83_39673243',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div style="display: flex; justify-content: center">
              <a href="/admin/categories/add" class="btn btn-primary">Aggiungi Categoria</a>
            </div>
                <div class="card">
                  <div class="card-header">
                    <div class="row" style="margin-left:15px">
                      <h4 class="card-title"> Categorie di prodotti</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive order-table">
                      <table class="table">
                        <thead class=" text-primary">
                        <th>
                          Nome
                        </th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <tr>
                          <td>
                            <a href="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/products">
                              <?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>

                            </a>
                          </td>
                          <td>
                            <form action="/admin/categories/<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
/destroy" method="post">
                              <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
" hidden name="id">
                                <div style="display: flex; justify-content: right">
                                  <button class="btn btn-primary">
                                    Delete
                                  </button>
                                </div>
                            </form>
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
    window.onload = function() {
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
