<?php
/* Smarty version 3.1.44, created on 2022-05-25 16:53:55
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\user\addresses-add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_628e430314e756_72289230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c14689b4e2bde151d8d49f8c2665931cadf1b2c' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\user\\addresses-add.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628e430314e756_72289230 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1179754780628e4303144ca2_94213337', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1057203204628e4303148b10_16332799', 'categories');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1033508726628e430314c202_63207423', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_1179754780628e4303144ca2_94213337 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1179754780628e4303144ca2_94213337',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Carrello<?php
}
}
/* {/block 'title'} */
/* {block 'categories'} */
class Block_1057203204628e4303148b10_16332799 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'categories' => 
  array (
    0 => 'Block_1057203204628e4303148b10_16332799',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'categories'} */
/* {block 'body'} */
class Block_1033508726628e430314c202_63207423 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1033508726628e430314c202_63207423',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <h2 class="mb-0 bread">Aggiungi un Indirizzo</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <form method="POST" id="contactForm" name="payment" class="contactForm" action="/address">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label" for="email">Città</label>
                        <input required type="text" class="form-control" style="text-align: center" id="city" name="city" minlength="2" maxlength="40">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="label" for="name">CAP</label>
                    <input required type="number" class="form-control" style="text-align: center"  id="cap" name="cap" minlength="5" maxlength="5">
                </div>
            </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label" for="surname">Via</label>
                        <input required type="text" class="form-control" style="text-align: center"  id="street" name="street">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="label" for="#">Numero</label>
                        <input required type="number" class="form-control" style="text-align: center" id="number" name="number" maxlength="5">
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-12 mt-4" style="text-align: center">
                <div class="form-group">
                    <input hidden type="text" value="signup" name="option">
                    <input type="submit" value="Aggiungi Indirizzo" class="btn btn-primary">
                    <div class="submitting"></div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
}
}
/* {/block 'body'} */
}
