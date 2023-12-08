
let CARD = $('<div>');
let PRODUCT = [];
let PURCHASES = [];
let HTML = ''
let SUM = 0;

let containerCard = $('.shoppin-cart-list');
let localProducts = JSON.parse(getLocalStorage('products'));
let purchases = JSON.parse(getLocalStorage('purchases'));

if (purchases)
{
  purchases.forEach(purchase => 
  {
    PURCHASES.push({
      image: purchase.image,
      cod: purchase.cod,
      value: purchase.value,
      description: purchase.description,
    });
  });
}

$(function()
{ 
  if (localProducts) {

    localProducts.forEach(product => 
    {
      PRODUCT.push({
        image: product.image,
        description: product.description,
        code: product.code,
        value: product.value,
        quantity: product.quantity,
      });

    });
    
  }
  
  render();

  $('.btn-clear-cart').click(function()
  {
    swal.fire({
      title: 'Deseja realmente limpar o carrinho?',
      showDenyButton: true,
      icon: 'warning',
      confirmButtonColor: '#A5DC86',
      denyButtonColor: '#ff0000',
      confirmButtonText: 'Sim, pode limpar',
      denyButtonText: 'Não'
    }).then((result) => {

      if (result.isConfirmed)
      {
        clearLocalStorage();
        PRODUCT = [];
        render();
        unloading();
      }
    })
  });

  $('.btn-finish').click(function() 
  {
    loading();

    let LocalProducts = JSON.parse(getLocalStorage('products'));
    let total = $('#total-purchase').text().replace(/[R$\s]/g, '').replace(',', '.');
    let requestProducts = [];

    LocalProducts.forEach(product => {
      requestProducts.push({
        code: product.code.replace('cód:', ''),
        value: product.value.replace('Preço: R$ ', '').replace(',', '.'),
      });
    });

    $.ajax({
      type: "post",
      url: "../app/controller/CheckoutController.php",
      data: {
        product: requestProducts,
        total: total
      },
      dataType: "json",
      success: function (data) {

        if (data.error)
        {
          swal.fire({
            title: 'Erro ao efetuar a compra, tente novamento mais tarde!',
            text: 'Tivemos um problema ao enviar a sua compra, pedimos desculpas pelo transtorno!',
            icon: 'info',
            confirmButtonColor: '#ff0000',
            confirmButtonText: 'Fechae',
          });
          
        } 
        else
        {
          swal.fire({
            title: 'Compra efetuada com sucesso!',
            text: data.message,
            icon: 'success',
            confirmButtonColor: '#A5DC86',
            confirmButtonText: 'Ok',
          });

          let products = JSON.parse(getLocalStorage('products'));

          products.forEach(product => 
          {
            PURCHASES.push({
              image: product.image,
              cod: product.cod,
              value: product.value,
              description: product.description,
            });
          });

          setLocaStorage('purchases', JSON.stringify(PURCHASES));
          clearLocalStorage();
          PRODUCT = [];
          render();
        }
      }

    });
  });
});

function render() 
{
  loading();

  if (!PRODUCT || PRODUCT.length == 0)
  {
    $('.btn-finish').hide();
    $('.btn-clear-cart').hide();
    $('.purchase').hide();
    containerCard.parent().removeClass('min-vh-100');
    containerCard.html('');

    CARD.html(`<div class="row justify-content-center my-4"> 
              <div class="col-10">
                <h3 class="text-center">
                  O carrinho está vazio!!
                </h3>
              </div>

              <div class="col-10 text-center">
                <img src="../views/assets/images/empty-cart.png" alt="Ícone de carrinho vazio" width="250px"/>
              </div>
            </div>`);
    
    containerCard.html(CARD);

  } 
  else
  {
    $('.btn-finish').show();
    $('.btn-clear-cart').show();
    $('.purchase').show();

    containerCard.parent().addClass('min-vh-100');
    containerCard.html('');
    HTML = '';
    SUM = 0;

    PRODUCT.forEach((product, index) => {

      let {image, description, value} = product;

      let replaceValue = value.replace('Preço: R$', '').replace(',', '.'); 
      SUM += parseFloat(replaceValue);

      HTML += `<div class="card mb-3 shadow" style="background: #0000000a;">

                <div class="row g-0">
                
                  <div class="col-md-2 col-sm-10 border m-2 m-sm-auto m-md-auto">
                    <img src="${image}" class="img-fluid rounded-start w-100" alt="Imagem do produto">
                  </div>
                
                  <div class="col-md-6">
                
                    <div class="card-body">
                
                      <h5 class="card-title">
                        ${description}
                      </h5>

                      <p class="card-text">
                        ${value}
                      </p>
                
                    </div>
                
                  </div>

                  <div class="col-md-3 p-2 text-end">

                    <a type="button" id="${index}" onclick="removeProduct(event)" class="border p-2 rounded-circle mt-3 btn-shopping-trash">

                      <img src="../views/assets/images/trash.png" alt="Ícone de lixeira para remover o item da lista" width="30px" heigth="30px" />

                    </a>

                  </div>
                
                </div>
                
              </div> `;
      
      containerCard.html(HTML);
      $('#total-purchase').html(numberFormat(SUM));

    });
  }
}

function removeProduct(event) 
{  
  let idx = event.currentTarget.id;

  swal.fire({
    title: 'Deseja realmente remover o item do carrinho?',
    showDenyButton: true,
    icon: 'warning',
    confirmButtonColor: '#A5DC86',
    denyButtonColor: '#ff0000',
    confirmButtonText: 'Sim, quero!',
    denyButtonText: 'Não'
  }).then(result => 
  {
    if (result.isConfirmed)
    {
      PRODUCT.splice(idx, 1);
      setLocaStorage('products', JSON.stringify(PRODUCT));
      setLocaStorage('cart', PRODUCT.length)
      render();
    }
  });
}


