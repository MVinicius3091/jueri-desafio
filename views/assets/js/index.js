$(function() 
{

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
    let uri = window.location.href;

    if ($(this).prop('href') == uri)
    {
      $(this).parent().css('border-bottom', 'solid 3px #00000071');
    }

  })

});


function numberFormat(number) 
{
  return Intl.NumberFormat('pt-br', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2

  }).format(number);
}

function loading() 
{
  let container = document.createElement('div');
  container.className = 'position-fixed loagind';

  let dot = document.createElement('i');
  dot.className = 'fa-solid fa-ellipsis fa-bounce fa-2xl';

  container.appendChild(dot);

  document.body.append(container);

  setTimeout(() => {
    container.classList.add('d-none');
  }, 2500);

}



// BODY VENDA DE UM PRODUTO
// {
//   "comprador": {
//     "tipo": "cliente",
//     "nome": "Daniel Victor Ruan Rocha",
//     "cpf_cnpj": "481.824.926-29",
//     "email": "danielvictorruanrocha@arcante.com.br"
//   },
//   "itens": [{
//     "produto": {
//       "codigo_barras": "7147925826629"
//     },
//     "quantidade": "2",
//     "valor_unitario": "50",
//     "fk_tipo_preco_id": "1"
//   }],
//   "forma_pagamento": {
//     "boleto": [{
//       "valor": "100",
//       "data_vencimento": "2023-01-01",
//       "numero_boleto": "8800"
//     }]
//   } 
// }