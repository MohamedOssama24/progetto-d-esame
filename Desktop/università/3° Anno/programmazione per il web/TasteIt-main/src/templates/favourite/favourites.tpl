{extends file='src/templates/base/base.tpl'}
{block name=title}All products{/block}
{block name=body}

    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://s1.1zoom.me/b6359/903/Meat_products_Salt_536334_1920x1080.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animated mb-5 text-center">
                    <h2 class="mb-0 bread">Preferiti</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <h4 class="product-select">Lista dei preferiti</h4>
                        </div>
                    </div>
                    {if $products!=[]}
                    <div class="row">
                        {foreach $products as $product}
                          <div class="col-md-3 d-flex">
                                <div class="product ftco-animated">
                                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url({$product->getImagePath()});">
                                        <div class="desc" style="display: flex">
                                            <p class="meta-prod d-flex">
                                            <form action="/carts/{$cartId}/products" method="POST">
                                                <input type="text" name="productId" class="quantity form-control input-number" value="{$product->getId()}" hidden>
                                                <button style="margin-right: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-shopping-bag"></span></button>
                                            </form>
                                            <form action="/products/{$product->getId()}">
                                                <button class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                            </form>
                                            <form action="/favourites/{$favId}/products/{$product->getId()}" method="POST">
                                                <div class="button delete">

                                                    <input hidden type="text" value="DELETE" name="_method">
                                                    <input hidden type="text" value="delete" name="option">
                                                    <input type="text" name="productId" class="quantity form-control input-number" value="{$product->getId()}" hidden>

                                                    <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><i class="fa fa-trash"></i></span></button>
                                                </div>
                                            </form>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text text-center">
                                        <h2> {$product->getName()}</h2>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                    {else}
                        <h3>Non hai ancora inserito prodotti tra i preferiti</h3>
                    {/if}
                </div>
            </div>
        </div>
    </section>
{/block}