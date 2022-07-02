{extends file='src/templates/base/base.tpl'}
{block name=title}Home{/block}
{block name=body}
    <div class="hero-wrap" style="background-image: url('../../src/assets/images/image_44.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animated d-flex align-items-end">

                    <div class="text w-100 text-center">
                        {if isset($user)}
                            <a class="navbar-brand" style="color: white"> <span>Benvenuto: {$user->getName()}</span></a>
                        {/if}
                        <h1 class="mb-4">Eat<span>It</span>.</h1>
                        <p><a href="/products" class="btn btn-primary py-2 px-4">Prodotti</a> <a href="/aboutUs" class="btn btn-white btn-outline-white py-2 px-4">Leggi di più</a></p>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">

                <div class="col-md-4 d-flex">
                    <div class="intro d-lg-flex w-100 ftco-animated">
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
                    <div class="intro color-2 d-lg-flex w-100 ftco-animated">
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
                    <div class="intro color-1 d-lg-flex w-100 ftco-animated">
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
                <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center" style="background-image: url(../../src/assets/images/image_45.jpg);">
                </div>
                <div class="col-md-6 wrap-about pl-md-5">
                    <div class="heading-section">
                        <span class="subheading">Since 1991</span>
                        <h2 class="mb-4">Prova la cucina di EatIt</h2>

                        <p>Il nostro locale accogliente, ricco di storia e di tradizione, il profumo del mare  appena colto, la bontà dei nostri ingredienti saranno per voi un'esperienza da ricordare. Venite a trovarci, vi aspettiamo !</p>
                        <p>Da oggi puoi provare la nostra cucina direttamente a casa tua. Comincia subito ad ordinare per ricevere ogni mese esclusivi coupon.</p>
                        <p class="year">
                            <strong class="number" data-number="31"></strong>
                            <span>Anni di Esperienza</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                {foreach $categories as $category}
                    <div class="col-lg-2 col-md-4">
                        <a href="/categories/{$category->getId()}/products">
                        <div class="sort w-100 text-center ftco-animated">
                            <div class="img" style="background-image: url({$category->getImage()})" ></div>
                            <h3>{$category->getName()}</h3>
                        </div>
                        </a>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center ftco-animated">
                    <span class="subheading">Scopri i Nostri</span>
                    <h2>Piatti Migliori</h2>
                </div>
            </div>
            <div class="row">
                {foreach $bestRateds as $bestRated}
                <div class="col-md-3 d-flex">
                    <div class="product ftco-animated">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({$bestRated->getImagePath()});">
                            <div class="desc" style="display: flex">
                                <p class="meta-prod d-flex">

                                {if $cartId}
                                <form action="/home/products/{$bestRated->getId()}/carts/{$cartId}" method="POST">
                                    <input type="text" id="productQuantity" name="quantity" class="quantity form-control input-number" value="1" hidden>
                                    <button style="margin-right: 1rem" id="productQuantity" class="btn btn-primary btn-number" type="submit"><span class="flaticon-shopping-bag"></span></button>
                                </form>
                                {/if}
                                {if $favId}
                                <form action="/home/products/{$bestRated->getId()}/favourites/{$favId}" method="POST">
                                    <button class="btn btn-primary btn-number" type="submit"><span class="flaticon-heart"></span></button>
                                </form>
                                {/if}
                                <form action="/products/{$bestRated->getId()}">
                                    <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                </form>
                                </p>
                            </div>
                        </div>
                        <a href="/products/{$bestRated->getId()}">
                        <div class="text text-center">
                            {*<span class="category">{$bestRated->getCategory()->getCategoryName()}</span>*}
                            <h2>{$bestRated->getName()}</h2>
                            <p class="mb-0"> <span class="price">€{$bestRated->getPrice()}</span></p>
                        </div>
                        </a>
                    </div>
                </div>
                {/foreach}
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section img" style="background-image: url('../../src/assets/images/bg_4.jpg');">
        <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animated">
                        <h2 class="mb-3">Cosa Dicono dei nostri piatti</h2>
                    </div>
                </div>

                <div class="row ftco-animate">
                    <div class="col-md-12">
                         <div class="carousel-testimony owl-carousel ftco-owl">
                            {foreach $bestReviews as $review}
                                <div class="item">
                                    <div class="testimony-wrap py-4">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                        <div class="text">
                                            <p class="mb-4">{$review->getComment()}</p>
                                            <div class="d-flex align-items-center">
                                                <div class="user-img" style="background-image: url({$review->getCustomer()->getImagePath()});" ></div>
                                                <div class="pl-3">
                                                    <p class="name">{$review->getCustomer()->getName()}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animated">
                    <span class="subheading">i nostri</span>
                    <h2>Best Seller</h2>
                </div>
            </div>
            <div class="row d-flex">
                {foreach $bestSellers as $product}
                    <div class="col-md-3 d-flex">
                        <div class="product ftco-animated">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url({$product->getImagePath()});">
                                <div class="desc" style="display: flex" >
                                    {if $cartId}
                                        <form action="/home/products/{$product->getId()}/carts/{$cartId}" method="POST">
                                            <input type="text" id="productQuantity" name="quantity1" class="quantity form-control input-number" value="1" hidden>
                                            <button style="margin-right: 1rem" id="productQuantity"class="btn btn-primary btn-number" type="submit"><span class="flaticon-shopping-bag"></span></button>
                                        </form>
                                    {/if}
                                    {if $favId}
                                        <form action="/home/products/{$product->getId()}/favourites/{$favId}" method="POST">
                                            <button class="btn btn-primary btn-number" type="submit"><span class="flaticon-heart"></span></button>
                                        </form>
                                    {/if}
                                    <form action="/products/{$product->getId()}">
                                        <button style="margin-left: 1rem" class="btn btn-primary btn-number" type="submit"><span class="flaticon-visibility"></span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="text text-center">
                                <h2> {$product->getName()}</h2>
                                <h2> €{$product->getprice()}</h2>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
    </section>

{/block}