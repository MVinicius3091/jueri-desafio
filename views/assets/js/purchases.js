let HTML = '';

$(function()
{
  let purchases = JSON.parse(getLocalStorage('purchases'));
  let purchasesList = $('.purchases-list');

  if (purchases) 
  {
    purchasesList.html('');

    HTML = `<table class="table table-hover">
                <thead>
                  <tr class="table-light">
                    <th>Imagem</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                  </tr>
                </thead>`;

    purchases.forEach(purchase => {
      
      let {image, description, value} =  purchase;

      HTML+= `<tbody>
                <tr>
                  <td>
                    <img src="${image}" alt="Imagem do produto" width="60px" height="60px" />
                  </td>

                  <td>${description}</td>
                  <td>${value}</td>
                </tr>
              </tbody>`;

      purchasesList.html(HTML);

    });

    HTML += '</table>';
  }
  else 
  {
    HTML = `<div class="row justify-content-center">

              <div class="col-10">
                <h3 class="text-center">
                  Sua lista está vazia!!
                </h3>
              </div>

              <div class="col-10 text-center">
                <img src="../views/assets/images/empty-purchase.png" alt="Ícone de lista vazia"/>
              </div>

           </div>`;

    purchasesList.html(HTML);
  }

});