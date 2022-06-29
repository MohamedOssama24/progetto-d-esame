<?php
/* Smarty version 3.1.40, created on 2021-11-05 15:12:25
  from 'C:\xampp\htdocs\TasteIt\src\templates\aboutUs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.40',
  'unifunc' => 'content_61853bc9662064_04211358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4744e6eb5cca24bf07ba56b8a7d079c6cc057cbd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TasteIt\\src\\templates\\aboutUs.tpl',
      1 => 1636117033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61853bc9662064_04211358 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56928838661853bc9660893_64841094', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_161542451461853bc9661779_55544451', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'src/templates/base/base.tpl');
}
/* {block 'title'} */
class Block_56928838661853bc9660893_64841094 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_56928838661853bc9660893_64841094',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Su di noi<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_161542451461853bc9661779_55544451 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_161542451461853bc9661779_55544451',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    


    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../src/assets/images/cibo.jpg');" data-stellar-background-ratio="0.5">
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
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url('../../src/assets/images/image_4.jpg');">
                </div>
                <div class="col-md-6 wrap-about pl-md-5">
                    <div class="heading-section">
                        <span class="subheading">Dal 1970</span>
                        <h2 class="mb-4">Prova il nostro ristorante TasteIt  </h2>


                        <p>Arrivare nel cuore di Montepulciano, città dalle sensazioni magiche, già di per sé rappresenta un viaggio attraverso i sensi. La vista, l’olfatto, l’udito. Dopo qualche serpentina in un’erta caratterizzata da un panorama mozzafiato che non nasconde certo il Tempio di San Biagio, capolavoro del Sangallo, ecco che passando da una porta, fiancheggiando la Fortezza di Montepulciano, baluardo della cittadina del Poliziano, si incontra TasteIt.

                            Flaviana, Selene dopo tanti anni nel settore dell’enogastronomia e della ristorazione, hanno deciso di dare vita a questo piccolo e accogliente locale dove chi vi arriva può completare il viaggio dei sensi a Montepulciano unendo ai precedenti tre il tatto e il gusto da ritrovare nei semplici, ma prelibati piatti offerti.</p>
                        <p class="year">
                            <strong class="number" data-number="51">0</strong>
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
