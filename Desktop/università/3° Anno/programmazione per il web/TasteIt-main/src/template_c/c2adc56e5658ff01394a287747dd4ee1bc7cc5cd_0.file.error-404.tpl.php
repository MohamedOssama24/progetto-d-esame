<?php
/* Smarty version 3.1.40, created on 2021-11-05 13:58:57
  from 'C:\xampp\htdocs\TasteIt\src\templates\error-404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.40',
  'unifunc' => 'content_61852a911b9438_64647650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2adc56e5658ff01394a287747dd4ee1bc7cc5cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TasteIt\\src\\templates\\error-404.tpl',
      1 => 1636117033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61852a911b9438_64647650 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169385670861852a911b7126_51566840', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58292128161852a911b8b17_28136597', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_169385670861852a911b7126_51566840 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_169385670861852a911b7126_51566840',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Profilo<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_58292128161852a911b8b17_28136597 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_58292128161852a911b8b17_28136597',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section style="background-image: url('../../src/assets/images/error-pages-background.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="text w-100 text-center">
                        <section class="ftco-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <i class="fa fa-frown-o" aria-hidden="true" style="color: white; font-size: 100px"></i>
                                        <div>
                                        <span style="font-size: 100px; color: white">404</span>
                                        </div>
                                        <div>
                                        <span style="font-size: 30px; color: white">Ops! La pagina non esiste.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
</section>
<?php
}
}
/* {/block 'body'} */
}
