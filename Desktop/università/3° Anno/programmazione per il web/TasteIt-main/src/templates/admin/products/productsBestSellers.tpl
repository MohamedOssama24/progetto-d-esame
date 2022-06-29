{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
<div class="content">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Statistiche prodotti</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow:hidden">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Nome Categoria
                        </th>
                        <th>
                            Prodotto più venduto
                        </th>
                        <th>
                            Prodotto meno venduto
                        </th>
                        </thead>
                        <tbody>
                        {foreach $data as $key=>$value}
                            <tr>
                                <td>
                                    {$key}
                                </td>
                                <td>
                                    {$value[0]}
                                </td>
                                <td>
                                    {$value[1]}
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{/block}