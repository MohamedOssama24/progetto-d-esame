{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
<div class="content">
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Modifica Prodotto</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/categories/{$categoryId}/products/{$productId}/edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7 pr-1">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" required maxlength="20" name="name" value="{$product->getName()}">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Prezzo$</label>
                                    <input type="number" step="0.01" class="form-control" required name="price" value={$product->getPrice()}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrizione</label>
                                <textarea class="form-control textarea" required maxlength="500" name="description">{$product->getDescription()}</textarea>
                            </div>
                        </div>
                    </div>
                    <input type="file"
                                 name="uploadfile"
                                 value="" />
                    <div class="row">

                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Aggiorna Prodotto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{/block}