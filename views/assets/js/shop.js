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

  const api = JSON.parse(getApi());

  $('.btn-search').click(function () 
  {
    let currentValue = $('.search-product').val();
    products = [];

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
      searchProduct(api.data, products, currentValue);
      renderSearch(products);

      e.target.value = '';
    }

  });

});

function searchProduct(api, products, currentValue)
{
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


    contents += `<div class="card col m-2 shadow" style="width: 18rem;">

                  <img src="${imagem ?? '../views/assets/images/empty-photo-1.png'}" class="card-img-top" alt="Imagem do produto" >

                  <div class="card-body d-flex flex-column justify-content-between">
                    <input type="hidden" name="id" value="${id}">
                    <h5 class="card-title">
                      ${descricao}
                    </h5>

                    <p class="card-text">
                      cód: ${codigo_barras}
                    </p>

                    <p class="card-text">
                      disponível: ${quantidade}
                    </p>

                    <p class="card-text">
                      Preço: ${numberFormat(tipo_preco??0)}
                    </p>

                    <a href="#" class="btn btn-primary text-center d-block">
                      Comprar
                    </a>

                  </div>

                </div>`;

    $('.shop-products').html(contents);

  });
}

function numberFormat(number) {

  return Intl.NumberFormat('pt-br', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2

  }).format(number);
}