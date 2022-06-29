<?php
/* Smarty version 3.1.44, created on 2022-06-09 09:48:24
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\user\cards-add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62a1a5c849a1c9_78127360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c2f6ffc9b31ba6df577eeabd94139db4b65d075' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\user\\cards-add.tpl',
      1 => 1637925992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62a1a5c849a1c9_78127360 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_41915350062a1a5c8497675_06817648', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14534910462a1a5c8498df5_03601895', 'categories');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197073781962a1a5c8499722_80971822', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_41915350062a1a5c8497675_06817648 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_41915350062a1a5c8497675_06817648',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Carrello<?php
}
}
/* {/block 'title'} */
/* {block 'categories'} */
class Block_14534910462a1a5c8498df5_03601895 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'categories' => 
  array (
    0 => 'Block_14534910462a1a5c8498df5_03601895',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'categories'} */
/* {block 'body'} */
class Block_197073781962a1a5c8499722_80971822 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_197073781962a1a5c8499722_80971822',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h2 class="mb-0 bread">Aggiungi una Carta</h2>
                </div>
            </div>
        </div>
    </section>

<section class="ftco-section">
    <div class="container">
    <form method="POST" id="contactForm" name="payment" class="contactForm" action="/cards">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label" for="name">Numero di Carta</label>
                    <input required type="number" class="form-control" style="text-align: center"  id="number" name="number" minlength="10" maxlength="40">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label" for="email">Proprietario</label>
                    <input required type="text" class="form-control" style="text-align: center" id="holder" name="holder" placeholder="Proprietario" minlength="2" maxlength="40">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="label" for="surname">Data di Scadenza</label>
                    <input required type="date" class="form-control" style="text-align: center"  id="date" name="date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="label" for="#">CVV</label>
                    <input required type="number" class="form-control" style="text-align: center" id="cvv" name="cvv" maxlength="5">
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4" style="text-align: center">
            <div class="form-group">
                <input hidden type="text" value="signup" name="option">
                <input type="submit" value="Aggiungi Carta" class="btn btn-primary">
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
