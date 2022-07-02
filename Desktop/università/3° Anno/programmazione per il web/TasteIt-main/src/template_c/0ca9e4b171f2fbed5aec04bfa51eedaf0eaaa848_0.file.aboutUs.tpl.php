<?php
/* Smarty version 3.1.44, created on 2022-07-01 22:25:56
  from 'C:\Users\mohamed\Desktop\università\3° Anno\programmazione per il web\TasteIt-main\src\templates\aboutUs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_62bf5854b27662_06930573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ca9e4b171f2fbed5aec04bfa51eedaf0eaaa848' => 
    array (
      0 => 'C:\\Users\\mohamed\\Desktop\\università\\3° Anno\\programmazione per il web\\TasteIt-main\\src\\templates\\aboutUs.tpl',
      1 => 1656703816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62bf5854b27662_06930573 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_119584119162bf5854b238b7_61679551', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162042332762bf5854b25f73_12921896', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_119584119162bf5854b238b7_61679551 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_119584119162bf5854b238b7_61679551',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Su di noi<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_162042332762bf5854b25f73_12921896 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_162042332762bf5854b25f73_12921896',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    


    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../src/assets/images/image_44.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div>
                    <h2 class="mb-0 bread">Su di noi</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex">
                    <!-- c'era ftco-animate ma rompe tutto, le animazioni le dobbiamo riguarda per forza-->
                    <div class="intro d-lg-flex w-100">
                        <div class="icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="text">
                            <h2>Supporto</h2>
                            <p>Per qualsiasi esigenza non esitare a contattarci tramite numero di telefono o indirizzo e-mail.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-2 d-lg-flex w-100">
                        <div class="icon">
                            <span class="flaticon-free-delivery"></span>
                        </div>
                        <div class="text">
                            <h2>Consegna Gratuita</h2>
                            <p>I nostri rider consegneranno i tuoi piatti gratuitamente in tutta la città.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-1 d-lg-flex w-100">
                        <div class="icon">
                            <span class="flaticon-visibility"></span>
                        </div>
                        <div class="text">
                            <h2>Nuovi coupon ogni mese</h2>
                            <p>I clienti più fedeli riceveranno ogni mese un nuovo coupon sul proprio profilo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url('../../src/assets/images/image_46.jpg');">
                </div>
                <div class="col-md-6 wrap-about pl-md-5">
                    <div class="heading-section">
                        <span class="subheading">Dal 1991</span>
                        <h2 class="mb-4">Prova EatIt  </h2>


                        <p>Il Ristorante EatIt è un punto di riferimento a Pescara per tutti gli amanti della buona cucina e per tutti coloro che prediligono gustare le specialità di pesce, carne , pizza . Nel locale ogni giorno viene servito pesce fresco e tutti gli ospiti vengono accolti con gentilezza e cortesia.

                           Il ristorante si trova sulle splendide colline pescaresi.
                            Mohamed , Marco ed Antonio  dopo tanti anni nel settore della ristorazione, hanno deciso di dare vita a questo piccolo e accogliente locale dove chi vi arriva può completare il viaggio dei sensi a Pescara unendo ai precedenti tre il tatto e il gusto da ritrovare nei semplici, ma prelibati piatti offerti.</p>
                        <p class="year">
                            <strong class="number" data-number="31">0</strong>
                            <span>Anni di esperienza</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="ftco-section ftco-no-pb">




<?php
}
}
/* {/block 'body'} */
}
