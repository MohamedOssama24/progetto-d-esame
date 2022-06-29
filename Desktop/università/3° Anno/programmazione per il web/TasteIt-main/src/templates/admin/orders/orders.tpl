{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
    <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <h4 class="card-title" style="margin-left:20px"></h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive order-table">
              <table class="table">

                <thead class=" text-primary">
                <th>
                  Id
                </th>
                <th>
                  Data
                </th>
                <th>
                  Totale
                </th>
                <th>
                  Stato
                </th>
                <th>
                  Action
                </th>
                </thead>
                <tbody>
                {foreach $orders as $order}

                  <tr>
                    <td>
                      {$order->getId()}
                    </td>
                    <td>
                      {$order->getCreationDate()}
                    </td>
                    <td>
                      ${$order->getTotal()}
                    </td>
                    <td>
                      {$order->getState()}
                    </td>
                    <td>
                      <a href="/admin/orders/{$order->getId()}" class="btn btn-primary">Dettagli Ordine</a>
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
{/block}