<?php
/* Smarty version 3.1.39, created on 2021-11-07 19:12:13
  from 'C:\Users\selen\OneDrive\Documents\app\src\templates\cookies-error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618816fdeb8118_59368749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9763b3e8a98b934791879d1636f8d143b6f92f84' => 
    array (
      0 => 'C:\\Users\\selen\\OneDrive\\Documents\\app\\src\\templates\\cookies-error.tpl',
      1 => 1636308665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618816fdeb8118_59368749 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2055685703618816fdeb7107_47422582', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_275279957618816fdeb7b94_09471925', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_2055685703618816fdeb7107_47422582 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2055685703618816fdeb7107_47422582',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Profilo<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_275279957618816fdeb7b94_09471925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_275279957618816fdeb7b94_09471925',
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
                                        <span style="font-size: 100px; color: white">errore cookies</span>
                                    </div>
                                    <div>
                                        <span style="font-size: 30px; color: white">Errore cookies</span>
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
