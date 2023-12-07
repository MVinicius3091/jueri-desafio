
let cartProduct = 0;
let productCartAdd = [];
let search = false;

if (getLocalStorage('cart')) {
  cartProduct = Number(getLocalStorage('cart'));

  $('.quantity-product').text(cartProduct);
}

$(function () 
{
  let url = window.location.origin;
  let uri = window.location.search;
  let pathName = window.location.pathname;

  let currentPage = uri[uri.indexOf('=')+1] ? Number(uri[uri.indexOf('=')+1]) : false; 

  $('.page-previus').click(function () 
  {
    let query = uri.slice(0, -1);
    let page = --currentPage;
    currentPage = (page <= 1) ? page = 1 : page;

    window.location = url + pathName +query + currentPage; 

  });

  $('.page-next').click(function () 
  {
    let query = uri.slice(0, -1);
    let page = ++currentPage;
    currentPage = (page >= 5) ? page = 5 : page;

    window.location = url + pathName +query + currentPage; 

  });

  $('.page-current').each(function (_, elem) 
  {
    if (uri != '') {
      $(elem).removeClass('active');
    }

    if ($(this).text() == currentPage)
    {
      $(this).addClass('active');
    }

  });

  let products = [];

  const api = JSON.parse(getApiJs());

  $('.btn-search').click(function () 
  {
    let currentValue = $('.search-product').val();

    loading();

    searchProduct(api.data, products, currentValue);
    renderSearch(products);

    $('.search-product').val('');
  });

  $('.search-product').keyup(function (e) 
  { 
    e.preventDefault();
    let currentValue = e.target.value.toLocaleLowerCase();

    products = [];
 
    if (e.key == 'Enter') 
    {
      loading();
      
      searchProduct(api.data, products, currentValue);
      renderSearch(products);

      e.target.value = '';
    }

  });

  if (getLocalStorage('products')) 
  {
    let productsLocal = JSON.parse(getLocalStorage('products'));

    productsLocal.forEach(product => 
    {
      productCartAdd.push({
        image: product.image,
        description: product.description,
        value: product.value,
        quantity: product.quantity,
      });
    });
  }

  $('.btn-buy').click(openModalProduct);
  
});

function searchProduct(api, products, currentValue)
{
  search = true;

  api.map(data => 
  {
    if (String(data.descricao).toLocaleLowerCase().includes(currentValue)) 
    {
      products.push({
        id: data.id,
        descricao: data.descricao,
        imagem: data.imagem,
        codigo_barras: data.codigo_barras,
        quantidade: data.quantidade,
        tipo_preco: data.tipo_preco[0]?.preco,
      });

    } 
    else if (String(data.codigo_barras).toLocaleLowerCase().includes(currentValue)) {
      
      products.push({
        id: data.id,
        descricao: data.descricao,
        imagem: data.imagem,
        codigo_barras: data.codigo_barras,
        quantidade: data.quantidade,
        tipo_preco: data.tipo_preco[0]?.preco,
      });

    }
    else if (String(data.quantidade).toLocaleLowerCase().includes(currentValue)) {
      
      products.push({
        id: data.id,
        descricao: data.descricao,
        imagem: data.imagem,
        codigo_barras: data.codigo_barras,
        quantidade: data.quantidade,
        tipo_preco: data.tipo_preco[0]?.preco,
      });

    } 
    else if (String(data.tipo_preco[0]?.preco).toLocaleLowerCase().includes(currentValue)) {
      
      products.push({
        id: data.id,
        descricao: data.descricao,
        imagem: data.imagem,
        codigo_barras: data.codigo_barras,
        quantidade: data.quantidade,
        tipo_preco: data.tipo_preco[0]?.preco,
      });
    }

  });
}

function renderSearch(products) 
{  
  let contents = '';

  products.forEach(product => {

    $('.shop-products').html('');

    let {
      id, 
      descricao, 
      imagem, 
      codigo_barras, 
      quantidade, 
      tipo_preco} = product;

    contents += `<div class="card col m-2 shadow align-items-center" style="width: 20rem; height: 28rem;">
                  <img src="${imagem ?? '../views/assets/images/empty-photo-1.png'}" class="card-img-top mt-2" alt="Imagem do produto" style="width: 10rem;">

                  <div class="card-body d-flex flex-column justify-content-between w-100">
                    <input type="hidden" name="id" value="${id}">
                    <h5 class="card-title">
                      ${descricao}
                    </h5>

                    <p class="card-text text-start">
                      cód: ${codigo_barras}
                    </p>

                    <p class="card-text text-start">
                      disponível: ${quantidade}
                    </p>

                    <p class="card-text text-start">
                      Preço: ${numberFormat(tipo_preco??0)}
                    </p>

                    <div class="border w-100 d-block">
                      <a href="javascript:void(0)" onclick="openModalProduct(event)" class="btn btn-primary text-center d-block">
                        Comprar
                      </a>
                    </div>

                  </div>

                </div>`;

    $('.shop-products').html(contents);

  });
}

function openModalProduct(event) {

  let parent = null;

  if (search) 
  {
    parent = $(event.currentTarget).offsetParent();
  } 
  else 
  {
    parent = $(this).offsetParent();
  }

  let img = parent.find('img')[0];
  let description = parent.find('h5.card-title')[0].innerText;
  let code = parent.find('p.card-text')[0].innerText;
  let quantity = parent.find('p.card-text')[1].innerText;
  let value = parent.find('p.card-text')[2].innerText;

  if (quantity.indexOf('0') != -1) {

    swal.fire({
      title: 'Produto indisponível no momento!',
      text: 'Este produto está em falta no estoque.',
      icon: 'info',
      confirmButtonColor: '#ff0000',
      confirmButtonText: 'Fechar'
    });
    return;
  }

  let modalProducts = {
    image: img.src,
    description: description,
    code: code,
    value: value,
    quantity: quantity,
  }

  modals(modalProducts);

  $('.modal').modal('toggle');

  $('.btn-add-product').click(function () {

    $('.quantity-product').removeClass('d-none');
    $('.quantity-product').text(++cartProduct);

    setLocaStorage('cart', cartProduct);

    swal.fire({
      title: 'Produto adicionado no carrinho com sucesso!',
      // text: 'Este produto está em falta no estoque.',
      icon: 'success',
      confirmButtonColor: '#A5DC86',
      confirmButtonText: 'Fechar'
    });

    productCartAdd.push(modalProducts);

    setLocaStorage('products', productCartAdd);
    
  });

}

