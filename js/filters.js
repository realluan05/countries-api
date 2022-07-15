jQuery(function () {

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

});
