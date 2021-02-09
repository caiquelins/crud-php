$(document).ready(function() {
  //função com efeito shake quando não preenche login ou senha
  function shakeErro(campo) {
  var elemento = $(campo).addClass('shaker');
  setTimeout(function(){
  elemento.removeClass('shaker');
  },1000);
}

  //verificar se os campos de usuário e senha foram devidamente preenchidos
  $('#btn_logar').click(function() {

    var campo_vazio = false;

    if($('#email').val() == '') {
      shakeErro('#email');
      $('#email').css({'border-color': '#A94442'})
      campo_vazio = true;
    } else {
      $('#email').css({'border-color': '#CCC'})
    }

    if($('#senha').val() == '') {
      shakeErro('#senha');
      $('#senha').css({'border-color': '#A94442'})
      campo_vazio = true;
    } else {
      $('#senha').css({'border-color': '#CCC'})
    }
    if(campo_vazio) return false;
  });
});