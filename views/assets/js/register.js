$(function() {

  $('input[name=rg]').mask('99.999.999-9');
  $('input[name=cpf]').mask('999.999.999-99');
  $('input[name=cep]').mask('99999-999');
  $('input[name=numero]').mask('999999');
  $('input[name=uf]').mask('SS');
  $('input[name=telefone]').mask('(99) 99999-9999');

  $('input[name=cep]').blur(function (e) { 
    e.preventDefault();

    let cep = $(this).val();

    loading();

    $.ajax({
      type: "get",
      url: `https://viacep.com.br/ws/${cep}/json`,
      dataType: "json",
      success: function (data) {
        let {logradouro, localidade, bairro, uf} = data;
        
        $('input[name=logradouro]').val(logradouro);
        $('input[name=bairro]').val(bairro);
        $('input[name=cidade]').val(localidade);
        $('input[name=uf]').val(uf);
      }
    });

  });


  $('input#flexSwitchCheckDefault').change(function (e) { 
    $(this).attr('checked', true);

    if ($(this).prop('checked') == true){

      $('input#flexSwitchCheckDefault2').removeAttr('checked');
      $('input#flexSwitchCheckDefault2').prop('disabled', true);
      $('input#flexSwitchCheckDefault').prop('disabled', false);

    } else {
      
      $('input#flexSwitchCheckDefault2').prop('disabled', false);

    }

  });

  $('input#flexSwitchCheckDefault2').change(function (e) { 
    $(this).attr('checked', true);

    if ($(this).prop('checked') == true){

      $('input#flexSwitchCheckDefault').removeAttr('checked');
      $('input#flexSwitchCheckDefault').prop('disabled', true);
      $('input#flexSwitchCheckDefault2').prop('disabled', false);

    } else {
      
      $('input#flexSwitchCheckDefault').prop('disabled', false);

    }

  });

});