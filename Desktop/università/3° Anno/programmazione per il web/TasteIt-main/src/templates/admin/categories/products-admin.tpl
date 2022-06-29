{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
    <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div style="display:flex; justify-content: center">
                <form action="/admin/categories/{$category->getId()}/products/form" method="get">
                    <button class="btn btn-primary">Aggiungi Prodotto</button>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title" style="margin-left:20px">{$category->getName()}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive order-table">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Nome
                            </th>
                            <th>
                                Descrizione
                            </th>
                            <th>
                                Prezzo
                            </th>
                            <th>
                                Volte Ordinato
                            </th>
                            <th>
                                Azioni
                            </th>
                            </thead>
                            <tbody>
                            {foreach $products as $product}
                                <tr>

                                    <td>
                                        {$product->getName()}
                                    </td>
                                    <td>
                                        {$product->getDescription()}
                                    </td>
                                    <td>
                                        {$product->getPrice()}
                                    </td>
                                    <td>
                                        {$product->getTimesOrdered()}
                                        {if $product->getTimesOrdered()==NULL}0{/if}
                                    </td>
                                    <td>
                                    <div class="row">
                                        <a href="/admin/categories/{$category->getId()}/products/{$product->getId()}/edit">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="edit">
                                            </a>
                                        <form method="post" action="/admin/categories/{$category->getId()}/products/{$product->getId()}">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="delete">
                                        </form>
                                        <a href="/admin/categories/{$category->getId()}/products/{$product->getId()}/reviews">
                                            <input class="btn btn-primary" style="margin-right:5px" type="submit" value="reviews">
                                        </a>
                                    </div>
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
    <script>
        function SelectText(element) {
            var doc = document,
                text = element,
                range, selection;
            if (doc.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(text);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(text);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }

        window.onload = function () {
            var iconsWrapper = document.getElementById('icons-wrapper'),
                listItems = iconsWrapper.getElementsByTagName('li');
            for (var i = 0; i < listItems.length; i++) {
                listItems[i].onclick = function fun(event) {
                    var selectedTagName = event.target.tagName.toLowerCase();
                    if (selectedTagName == 'p' || selectedTagName == 'em') {
                        SelectText(event.target);
                    } else if (selectedTagName == 'input') {
                        event.target.setSelectionRange(0, event.target.value.length);
                    }
                }

                var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                    beforeContent = beforeContentChar.charCodeAt(0).toString(16);
                var beforeContentElement = document.createElement("em");
                beforeContentElement.textContent = "\\" + beforeContent;
                listItems[i].appendChild(beforeContentElement);

                //create input element to copy/paste chart
                var charCharac = document.createElement('input');
                charCharac.setAttribute('type', 'text');
                charCharac.setAttribute('maxlength', '1');
                charCharac.setAttribute('readonly', 'true');
                charCharac.setAttribute('value', beforeContentChar);
                listItems[i].appendChild(charCharac);
            }
        }
    </script>

{/block}