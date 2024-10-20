
$(document).ready(function() {
    $('.openUserModal').on('click', function(e) {
      e.preventDefault();
      
      var userId = $(this).data('id');
      
      $.ajax({
            url: '/user/' + userId,
            type: 'GET',
            success: function(data) {
              $('#modalName').text(data.name);
              $('#modalEmail').text('email: ' + data.email);
              
              
              // Captura o botão de seguir/desseguir e atribue userId
                var followButton = $('#modalBtnSeguir'); 
                followButton.attr('data-user-id', userId);

                // validacao para nao ter botao caso seja o proprio usuario atual
                if (data.is_self === false) {
                  
                  // validacao sobre o estado atual, se ja esta seguindo
                  if (data.is_following) {
                    followButton.text('Desseguir');
                    followButton.removeClass().addClass('botao-deseguir')
                    followButton.attr('data-action', 'unfollow');
                  } else {
                    followButton.text('Seguir');
                    followButton.removeClass().addClass('botao-seguir')
                    followButton.attr('data-action', 'follow');
                  }
                } else {
                    followButton.text('Esse é o seu perfil. Veja outro usuário para seguir / desseguir');
                    followButton.removeClass().addClass('btn btn-secondary')
                    followButton.attr('data-action', '');
                }
                  
                  $('#userModal').modal('show');
                }
              });
            });
          });
          
$('#modalBtnSeguir').click(function() {
    
  // Obtém o ID do usuário
    var userId = $(this).attr('data-user-id'); 
    // Verifica se a ação é 'follow' ou 'unfollow'
    var action = $(this).attr('data-action');
  
    var url;
    if (action === 'follow') {
        url = '/users/' + userId + '/follow';
    } else if (action === 'unfollow') {
        url = '/users/' + userId + '/unfollow';
    } else {
        // caso for o proprio perfil nao tera acao seguir/desseguir
        return;
    }

    // pega o token CSRF da meta tag
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Envia a requisicao adequada conforme url definida acima
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: csrfToken
        },
        success: function(data) {
          toastr.options = {
            "closeButton" : true,
            positionClass: 'toast-top-center',
          }
          if (data.success) {
            
            // a mensagem de sucesso é exibida e aguarda 2 segundos antes de recarregar a página para atualizar feed e usuarios
            toastr.success(data.success, '', { timeOut: 2000 });
            $('#userModal').hide();
            setTimeout(function() {
                location.reload();
            }, 2000);
          }
        },
        error: function(response) {
          toastr.options = {
            "closeButton" : true,
            positionClass: 'toast-top-center',
          }  
          toastr.error(response.error, '', { timeOut: 2000 });
        }
    });
});
