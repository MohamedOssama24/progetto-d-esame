{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                {if $reviews!=[]}
                <div class="card card-user">
                    <div class="card-body">

                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Stelle
                                </th>
                                <th>
                                    Commento
                                </th>
                                <th>
                                    Cliente
                                </th>
                                </thead>
                                <tbody>

                                {foreach $reviews as $r}
                                    <tr>
                                        <td>
                                            <div class="rating d-flex">
                                                <p class="text-left mr-4">
                                                    <a href="#">
                                                    <span>
                                                        {for $var=1 to {$r->getStars()}}
                                                            <i class="fa fa-star"></i>
                                                        {/for}
                                                    </span>
                                                        <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                    </a>
                                            </div>
                                        </td>
                                        <td>
                                            {$r->getComment()}
                                        </td>
                                        <td>
                                            {$r->getCustomer()->getName()} {$r->getCustomer()->getSurname()}
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
            <h3>Non ci sono recensioni per questo prodotto.</h3>
            {/if}
        </div>
    </div>
{/block}