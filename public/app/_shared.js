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
    $('#submit-form').prop('disabled', true);
    $('#submit-form').html('Saving... <i class="fas fa fa-sync-alt fa-spin"></i>');
}

function unloading() {
    $('#submit-form').prop('disabled', false);
    $('#submit-form').html('Save');
}