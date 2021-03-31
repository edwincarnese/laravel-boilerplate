toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

function loading() {
    $('#save-form').prop('disabled', true);
    $('#save-form').html('Saving... <i class="fas fa fa-sync-alt fa-spin"></i>');
}

function unloading() {
    $('#save-form').prop('disabled', false);
    $('#save-form').html('Save');
}