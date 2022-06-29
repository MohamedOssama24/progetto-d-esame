{extends file='src/templates/base/base.tpl'}
{block name=title}Carrello{/block}
{block name=body}
<section class="hero-wrap hero-wrap-2" style="background-image: url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <h2 class="mb-0 bread">Il mio carrello</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">

    <div class="container">
        <div class="row">
            {if $products!=[]}
            <div class="table-wrap" style="overflow:hidden">
                <table class="table">

                    <thead class="thead-primary">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Prodotto</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                        <th>Totale</th>
                        <th>&nbsp;</th>
                    </tr>

                    </thead>

                    <tbody>
                   {foreach $products as $product}
                    <tr class="alert" role="alert">
                         <td>
                            <div class="img" style="background-image: url({$product[0]->getImagePath()});"></div>
                        </td>
                       <td>
                            <div class="email">
                                <span>{$product[0]->getName()}</span>
                                <span>{$product[0]->getDescription()}</span>
                            </div>
                        </td>
                          <td>{$product[0]->getPrice()}</td>
                        <td class="quantity">
                            <div class="input-group" style="width: 9em">
                                <form action="/carts/{$cart->getId()}/products/{$product[0]->getId()}" method="POST" style="float: left">
                                    <div class="button minus">

                                        <input hidden type="text" value="PUT" name="_method">
                                        <input hidden type="text" value="minus" name="option">
                                        <input type="text" name="productId" class="quantity form-control input-number" value="{$product[0]->getId()}" hidden>

                                        <button class="btn btn-primary btn-number" type="submit"
                                                {if $product[1] == 1}
                                                    disabled
                                                {/if}
                                        >
                                            -
                                        </button>
                                    </div>
                                </form>

                                <input type="text" name="quantity" class="input-number"  data-min="1" data-max="100" value="{$product[1]}" style="width: 2em">

                                <form action="/carts/{$cart->getId()}/products/{$product[0]->getId()}" method="POST" style="float: right">
                                    <div class="button plus">

                                        <input hidden type="text" value="PUT" name="_method">
                                        <input hidden type="text" value="plus" name="option">
                                        <input type="text" name="productId" class="quantity form-control input-number" value="{$product[0]->getId()}" hidden>

                                        <button class="btn btn-primary btn-number" type="submit"> + </button>
                                    </div>
                                </form>

                            </div>
                        </td>
                          <td>{math equation="{$product[0]->getPrice()} * {$product[1]}"}</td>
                        <td>
                          {* <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </button>*}
                            <form action="/carts/{$cart->getId()}/products/{$product[0]->getId()}" method="POST">

                                <div class="button delete">

                                    <input hidden type="text" value="DELETE" name="_method">
                                    <input hidden type="text" value="delete" name="option">
                                    <input type="text" name="productId" class="quantity form-control input-number" value="{$product[0]->getId()}" hidden>

                                    <button class="btn btn-primary btn-number" type="submit"> X </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    {/foreach}

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Totale del carrello</h3>
                   <p class="d-flex">
                        <span>
                            Totale parziale
                        </span>
                        <span>
                            {$partialTotal=0}
                             {foreach $products as $product}
                                 {assign var="partialTotal" value = $partialTotal + $product[0]->getPrice() * $product[1]}
                             {/foreach}
                            $ {$partialTotal}
                        </span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex total-price">
                        <span>Totale</span>
                        <span>

                            {*{foreach $products as $product}
                                {assign var="total" value=$total+$product[3]*$product[5]}
                            {/foreach}
                            $ {$total}*}
                             $ {$partialTotal}
                        </span>
                    </p>
                </div>
                <p class="text-center"><a href="/cart/checkout" class="btn btn-primary py-3 px-4 {if $products==array()}disabled{/if}">checkout</a></p>
            </div>
            {else}
            <h3>Non ci sono prodotti nel carrello.</h3>
            {/if}
        </div>
    </div>
</section>
{/block}
