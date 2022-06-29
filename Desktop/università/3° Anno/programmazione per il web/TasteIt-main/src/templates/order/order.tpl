{extends file='src/templates/base/base.tpl'}
{block name=title}Carrello{/block}
{block name=categories}{/block}
{block name=body}
    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h2 class="mb-0 bread">Ordine</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-12 ftco-animate">

                    {if $valid==false}
                        <h3>Alcuni campi non sono validi. Inserisci un indirizzo, un metodo di pagamento valido e, se hai un coupon, assicurati che sia valido.</h3>
                    {/if}
                    <form method="post" action="/cart/checkout/confirmation" id="ordine">
                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-4 d-flex">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Totale</h3>

                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    {$subtotal=0}
                                    {foreach $cart->getProducts() as $product}
                                        {assign var="subtotal" value=$subtotal+$product[0]->getPrice()*$product[1]}
                                    {/foreach}
                                    <span>${$subtotal}</span>
                                </p>
                                <hr>
                                <label for="streetaddress">Coupon</label>
                                <div class="d-flex">

                                        <div class="row">
                                            <input id="coupon" type="text" class="form-control w-75" name="option" placeholder="Codice Coupon">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Indirizzi</h3>
                                    {foreach $addresses as $address}
                                        <div class="form-group">
                                             <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" id="ordine" name="address" value="{$address->getId()}" class="mr-2" required="required">Via {$address->getStreet()} {$address->getHomeNumber()}, {$address->getCity()}</label>
                                                </div>
                                             </div>
                                        </div>
                                    {/foreach}
                                <a href="/address" class="btn btn-primary w-50">Aggiungi un Indirizzo</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metodo di pagamento</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" id="ordine" value="cash" class="mr-2" required="required"> Contanti</label>
                                        </div>
                                    </div>
                                </div>
                                {foreach $cards as $card}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                                <label><input type="radio" name="payment" id="ordine" value="{$card->getId()}" class="mr-2" required="required"> {$card->getNumber()}</label>
                                        </div>
                                    </div>
                                </div>
                                {/foreach}
                                <a href="/cards" class="btn btn-primary w-50">Aggiungi una Carta</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-5">
                            <button class="btn btn-primary w-25" style="margin-left: 1rem" id="ordine" type="submit">Ordina</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
{/block}
