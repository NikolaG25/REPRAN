jQuery(function ($) {

  /* FILTERING FUNCTION ON FORMATION ARCHIVE PAGE */
  $('#filter').change(function () {
    $.ajax({
      url: '/repran/wp-admin/admin-ajax.php',
      data: $('#filter').serialize(), // form data
      dataType: 'json',
      type: 'POST',

      success: function (data) {

        current_page_myajax = 1;

        posts_myajax = data.posts;

        max_page_myajax = data.max_page;

        $('#docu_wrap').html(data.content);

        if (data.max_page < 2) {
          $('#cc_docu_load_more').hide();
        } else {
          $('#cc_docu_load_more').show();
        }
      }
    });

    return false;

  });

});