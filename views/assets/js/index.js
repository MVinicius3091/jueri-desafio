$(function() 
{
  let uri = window.location;

  const AUTOCOMPLETE = 
  [
    '<a href="/dashboard" class="nav-link text-dark text-decoration-nano hover border border-bottom w-100">Princpal</a>',
    '<a href="/login" class="nav-link text-dark text-decoration-nano hover border border-bottom w-100">Login</a>',
    '<a href="/shop" class="nav-link text-dark text-decoration-nano hover border border-bottom w-100">Loja</a>',
    '<a href="/shop" class="nav-link text-dark text-decoration-nano hover border border-bottom w-100">Peças</a>',
    '<a href="/shop" class="nav-link text-dark text-decoration-nano hover border border-bottom w-100">Compras</a>',
  ];

  $('.search-header').keyup(function()
  {
    let _div = $('<div class="position-absolute top-100 d-flex flex-column align-items-center bg-light autocomplete" style="z-index: 10; width:15rem;">');

    $.each(AUTOCOMPLETE, function (_, event) 
    { 
      _div.append(event);

      if ($('.search-header').parent().find('div.autocomplete').length == 0) {
        $('.search-header').after(_div);
      }
    });

    if ($(this).val() == '') 
    {
      $(this).parent().find('div.autocomplete').remove();
    }
  });

  $('header ul.navbar-nav li.h-link a').each(function() 
  {
    let href = uri.origin + uri.pathname;

    if ($(this).prop('href') == href)
    {
      $(this).parent().css('border-bottom', 'solid 3px #00000071');
    } 
  });

  if (uri.pathname == '/')
  {
    $('.h-active').parent().css('border-bottom', 'solid 3px #00000071');
  }

});

function numberFormat(number) 
{
  return Intl.NumberFormat('pt-br', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2

  }).format(number);
}

function loading(time=true) 
{
  let container = document.createElement('div');
  container.className = 'position-fixed loading';

  let dot = document.createElement('i');
  dot.className = 'fa-solid fa-ellipsis fa-bounce fa-2xl';

  container.appendChild(dot);
  document.body.append(container);

  if (time) 
  {
    setTimeout(() => {
      document.querySelector('.loading').remove();
    }, 2500);
  }

}

function unloading() 
{
  setTimeout(() => 
  {
    document.querySelector('.loading');
  }, 1500);
}

function modals(product) {

  if (typeof product != 'object') {
    return false;
  }

  let {image, description, value, quantity} = product;

  let modal = `<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-center">

                      <div class="card m-2 shadow align-items-center m-auto" style="width: 20rem; height: 26rem;">
                        <img src="${image}" class="card-img-top mt-2" alt="Imagem do produto" style="width: 10rem;">

                        <div class="card-body d-flex flex-column justify-content-between w-100">
                          <input type="hidden" name="id" value="787541">
                
                          <h5 class="card-title">
                            ${description}        
                          </h5>
                
                          <div>

                            <p class="card-text text-start">
                              ${quantity}       
                            </p>

                            <p class="card-text text-start">
                              ${value}       
                            </p>
                            
                          </div>
              
                        </div>

                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary btn-add-product">
                        Adicionar no carrinho
                      </button>
                    </div>

                  </div>

                </div>

              </div>`;

  document.querySelector('.modal-content').innerHTML = modal;

}

function setLocaStorage(key, content)
{
  if (typeof content !== 'object')
  {
    localStorage.setItem(key, content);
    return;
  } 
  else
  {
    localStorage.setItem(key, JSON.stringify(content));
  } 
}

function getLocalStorage(key) 
{  
  return localStorage.getItem(key);
}

function clearLocalStorage()
{
  let idx = 1;
  let i = 0;
  
  while (i < idx) {
    let key = localStorage.key(0);

    if (key == 'purchases' || key == null) 
    {
      break;
    } 
    else
    {
      localStorage.removeItem(key);
      idx++;
    }
    i++;
  }
}

function clearLocalStorageAll() 
{
  localStorage.clear();
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


