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

                    <h3 style="text-align: center">Il tuo ordine è arrivato in cucina. Aspetta che il ristorante confermi il tuo ordine.</h3>
                        <div class="row mt-5 pt-3 d-flex">

                            <div class="col-md-4 d-flex">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>

                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        {$subtotal=0}
                                        {foreach $cart->getProducts() as $product}
                                            {assign var="subtotal" value=$subtotal+$product[0]->getPrice()*$product[1]}
                                        {/foreach}
                                        <span>${$subtotal}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount</span>
                                        {if $coupon==""}
                                        <span>0%</span>
                                        {else}
                                            <span>{$coupon->getPriceCut()}%</span>
                                        {/if}
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        {if $coupon!=""}
                                        <span>${$subtotal-($subtotal*$coupon->getPriceCut()/100)}</span>
                                        {else}
                                            <span>${$subtotal}</span>
                                        {/if}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Indirizzi</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label>Via {$address->getStreet()} {$address->getHomeNumber()}, {$address->getCity()}</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Metodo di pagamento</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    {if get_class($card)=="App\Models\CreditCard"}
                                                    <label>{$card->getNumber()}</label>
                                                        {else}
                                                        <label>Contanti</label>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <form method="get" action="/home">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn btn-primary w-25" style="margin-left: 1rem" id="ordine" type="submit">Torna alla home</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section>

{/block}
