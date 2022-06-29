{extends file='src/templates/base/base.tpl'}
{block name=title}Prodotti{/block}
{block name=body}

    <section class="hero-wrap hero-wrap-2" style="background-image: url('https://s1.1zoom.me/b6359/903/Meat_products_Salt_536334_1920x1080.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animated mb-3 text-center">
                    <h2 class="mb-0 bread">Tutti i prodotti</h2>
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
            <h4 class="product-select">Seleziona un prodotto</h4>
        </div>
    </div>
        <div class="row">
            {foreach $products as $product}
                <div class="col-md-3 d-flex">
                    <div class="product ftco-animated">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{$product->getImagePath()}');">
                            <div class="desc" style="display: flex">
                                <p class="meta-prod d-flex">
                                    {if isset($cartId)}
                                <form action="/products/{$product->getId()}/carts/{$cartId}" method="POST">
                                    <input type="text" id="productQuantity" name="quantity" class="quantity form-control input-number" value="1" hidden>
                                    <button style="margin-right: 1rem" id="productQuantity"class="btn btn-primary btn-number" type="submit"><span class="flaticon-shopping-bag"></span></button>
                                </form>
                                {/if}
                                {if isset($favId)}
                                    <form action="/products/{$product->getId()}/favourites/{$favId}" method="POST">
                                        <button class="btn btn-primary btn-number" type="submit"><span class="flaticon-heart"></span></button>
                                    </form>
                                {/if}
                                <form action="/products/{$product->getId()}">
                                    <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                </form>
                                </p>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h2> {$product->getName()}</h2>
                            <p class="mb-0">
                                <span class="price">${$product->getPrice()}</span>
                            </p>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>

    </div>
    </div>
    </div>
    </section>


{/block}