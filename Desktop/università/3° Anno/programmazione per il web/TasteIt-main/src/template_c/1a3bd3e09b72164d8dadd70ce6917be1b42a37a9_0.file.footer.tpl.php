<?php
/* Smarty version 3.1.40, created on 2021-11-05 13:58:57
  from 'C:\xampp\htdocs\TasteIt\src\templates\base\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.40',
  'unifunc' => 'content_61852a914afca7_84618646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a3bd3e09b72164d8dadd70ce6917be1b42a37a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TasteIt\\src\\templates\\base\\footer.tpl',
      1 => 1636117033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61852a914afca7_84618646 (Smarty_Internal_Template $_smarty_tpl) {
?><footer class="ftco-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2 logo"><a href="#">Taste<span>It</span></a></h2>
                    <p>Orari di consegna:</p>
                    <p>Dal Martedi alla Domenica</p>
                    <p>Dalle 18:20 alle 22:00</p>
                    <p>• LUNEDI CHIUSO •</p>
                </div>
            </div>
            <div class="col-sm-12 col-md">
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Informazioni</h2>
                    <ul class="list-unstyled">
                        <li><a href="/aboutUs""><span class="fa fa-chevron-right mr-2"></span>Su di noi</a></li>
                        <li><a href="/products"><span class="fa fa-chevron-right mr-2"></span>I nostri prodotti</a></li>
                        <li><a href="/contact"><span class="fa fa-chevron-right mr-2"></span>Contattaci</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Contattaci</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map marker"></span><span class="text">Via <?php echo $_smarty_tpl->tpl_vars['restaurant']->value->getAddress()->getStreet();?>
 <?php echo $_smarty_tpl->tpl_vars['restaurant']->value->getAddress()->getHomeNumber();?>
, <?php echo $_smarty_tpl->tpl_vars['restaurant']->value->getAddress()->getCity();?>
</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text"><?php echo $_smarty_tpl->tpl_vars['restaurant']->value->getPhone();?>
</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text"><?php echo $_smarty_tpl->tpl_vars['restaurant']->value->getEmail();?>
</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><?php }
}
