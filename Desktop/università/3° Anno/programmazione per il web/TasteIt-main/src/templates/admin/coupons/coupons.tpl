{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                {if $coupons!=[]}
                <div class="card card-user">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Id
                                </th>
                                <th>
                                    Sconto
                                </th>
                                <th>
                                    Data di Scadenza
                                </th>
                                </thead>
                                <tbody>

                                {foreach $coupons as $coupon}
                                    <tr>
                                        <td>
                                            {$coupon->getId()}
                                        </td>
                                        <td>
                                            {$coupon->getpriceCut()}
                                        </td>
                                        <td>
                                            {$coupon->getExpirationDate()}
                                        </td>
                                    </tr>
                                {/foreach}

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {else}
            <h3>Non ci sono coupon attivi al momento.</h3>
            {/if}
        </div>
    </div>
{/block}