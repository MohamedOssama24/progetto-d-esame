{extends file='src/templates/admin/leftMenu.tpl'}
{block name=admin}
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div style="display: flex; justify-content: center">
              <a href="/admin/categories/add" class="btn btn-primary">Aggiungi Categoria</a>
            </div>
                <div class="card">
                  <div class="card-header">
                    <div class="row" style="margin-left:15px">
                      <h4 class="card-title"> Categorie di prodotti</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive order-table">
                      <table class="table">
                        <thead class=" text-primary">
                        <th>
                          Nome
                        </th>
                        <th></th>
                        </thead>
                        <tbody>
                        {foreach $categories as $category}
                        <tr>
                          <td>
                            <a href="/admin/categories/{$category->getId()}/products">
                              {$category->getName()}
                            </a>
                          </td>
                          <td>
                            <form action="/admin/categories/{$category->getId()}/destroy" method="post">
                              <input type="text" value="{$category->getId()}" hidden name="id">
                                <div style="display: flex; justify-content: right">
                                  <button class="btn btn-primary">
                                    Delete
                                  </button>
                                </div>
                            </form>
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
    window.onload = function() {
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