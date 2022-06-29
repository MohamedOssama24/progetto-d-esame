<?php
/* Smarty version 3.1.39, created on 2021-11-07 18:44:11
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\error-404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6188106b1782f0_91970281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82be68ee9403708002ca6d379a781e8d9dfd2fd1' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\error-404.tpl',
      1 => 1636104166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6188106b1782f0_91970281 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6618520656188106b1744d6_25561538', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20144063156188106b177ca6_59997204', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_6618520656188106b1744d6_25561538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_6618520656188106b1744d6_25561538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Profilo<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_20144063156188106b177ca6_59997204 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20144063156188106b177ca6_59997204',
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
