{extends file='src/templates/base/base.tpl'}
{block name=title}Profilo{/block}
{block name=body}
    <div class="hero-wrap" style="background-image: url('https://en.free-wallpapers.su/data/media/2319/big/fd0251.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animated d-flex align-items-end">
                    <div class="text w-100 text-center">
                        <h1 class="mb-4">Profilo</span></h1>
                        <section class="ftco-section ftco-no-pb">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2 col-md-4">
                                        <form action="/profile" method="GET">
                                            <div class="sort w-100 text-center ftco-animated">
                                                <div class="img" style="background-image: url('{$image}');" ></div>
                                                <h3 style="color: white">{$name}</h3>
                                                <h3 style="color: white">{$surname}</h3>
                                                <h3 style="color: white">{$email}</h3>
                                            </div>
                                        </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section class="ftco-section">
        <div class="container" style="overflow: auto">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animated">
                    <span class="subheading">I tuoi Coupon</span>
                    <h2>Coupon</h2>
                    {if $coupons!=[]}
                        <div class="row">
                            <div class="table-wrap order-table">
                                <table class="table">

                                    <thead class="thead-primary">
                                    <tr>
                                        <th>Codice</th>
                                        <th>Data di Scadenza</th>
                                        <th>Percentuale</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $coupons as $c}
                                        <tr class="alert" role="alert">
                                            <td>{$c->getId()}</td>
                                            <td>{$c->getExpirationDate()}</td>
                                            <td>{$c->getPriceCut()}%</td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {else}
                        <h3>Non hai nessun coupon disponibile.</h3>
                    {/if}

                </div>
            </div>

        </div>

        <div class="container" style="overflow: auto">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animated">
                    <span class="subheading">I tuoi ordini</span>
                    <h2>Ordini</h2>
                    {if $orders!=[]}
                        <div class="row">
                            <div class="table-wrap order-table">
                                <table class="table">

                                    <thead class="thead-primary">
                                    <tr>
                                        <th>Data</th>
                                        <th>Totale</th>
                                        <th>Pagato con</th>
                                        <th>Stato</th>
                                        <th>Dettagli</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {foreach $orders as $order}
                                        <tr class="alert" role="alert">
                                            <td>{$order->getCreationDate()}</td>
                                            <td>{$order->getTotal()}</td>
                                            <td>{if get_class($order->getPayment())=="App\Models\Cash"}Contanti{else}Carta di Credito{/if}</td>
                                            <td>{$order->getState()}</td>
                                            <td>
                                                <form action="/profile/{$order->getId()}/details" method="post">
                                                    <input type="text" name="orderId" class="quantity form-control input-number" value="{$order->getId()}" hidden>
                                                    <button style="margin-right: 1rem" class="btn btn-primary btn-number" type="submit">Vai ai Dettagli</button>
                                                </form>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {else}
                        <h3>Non hai effettuato ordini.</h3>
                    {/if}

                </div>
            </div>

        </div>
    </section>

{/block}