
function numberFormat(number) {

  return Intl.NumberFormat('pt-br', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2

  }).format(number);
}

function loading() {

  let container = document.createElement('div');
  container.className = 'position-fixed loagind';

  let dot = document.createElement('i');
  dot.className = 'fa-solid fa-ellipsis fa-bounce fa-2xl';

  container.appendChild(dot);

  document.body.append(container);

  setTimeout(() => {
    container.classList.add('d-none');
  }, 1000);

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