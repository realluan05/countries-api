jQuery(function () {
  $('.to-top').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 'slow');
  });

  $('#search').on('input keyup', function () {
    filtrar($(this));
  });

  $('#search').on('focusout', function () {
    if ($(this).val() != '') {
      $('#filter').val("-1");
    }
  });

  $('#filter').on('change', function () {
    filtrar($(this));
  });

  function filtrar(element) {
    let text = element.val().toUpperCase();

    $('#list-countries > li').each(function () {
      if ($(this).html().toUpperCase().indexOf(text) === -1) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  }

  // pegar o valor no localStorage
  const nightModeStorage = localStorage.getItem('gmtNightMode');
  const nightMode = $('#night-mode');

  // caso tenha o valor no localStorage
  if (nightModeStorage) {
    // ativa o night mode
    $('html').addClass('night-mode');

    // já deixa o input marcado como ativo
    nightMode.checked = true;
  }

  // ao clicar mudar as cores
  nightMode.on('click', () => {
    // adiciona a classe `night-mode` ao html
    $('html').toggleClass('night-mode');

    // se tiver a classe night-mode
    if ($('html').hasClass('night-mode')) {
      // salva o tema no localStorage
      localStorage.setItem('gmtNightMode', true);
      return;
    }
    // senão remove
    localStorage.removeItem('gmtNightMode');
  });
});
