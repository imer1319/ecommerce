$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')


    $('.select-all').click(function() {
        $('input[type="checkbox"]').prop('checked', true);
      });
      
      // Deseleccionar todos los checkboxes
      $('.deselect-all').click(function() {
        $('input[type="checkbox"]').prop('checked', false);
      });

})
