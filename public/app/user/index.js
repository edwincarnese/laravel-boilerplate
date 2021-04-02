let users;

$(function () {
  users = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/users",
    columns: [
      {
        data: 'full_name', 
        name: 'full_name'
      },
      {
        data: 'username', 
        name: 'username'
      },
      {
        data: 'email', 
        name: 'email'
      },
      {
        data: 'action', 
        name: 'action', 
      },
    ]
  });
});

$.validator.setDefaults({
  submitHandler: function () {
    loading();

    const formData = {
      first_name: $('#first_name').val(),
      last_name: $('#last_name').val(),
      username: $('#username').val(),
      email: $('#email').val(),
      password: $('#password').val(), 
      password_confirmation: $('#password_confirmation').val(), 
    };
    
    $.ajax({
      type: "POST",
      url: "/users",
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      data: formData,
      success: function (data) {
        unloading();
        popuplateDataTable();

        $('#form').trigger("reset");
        $('#form-modal').modal('toggle');
        $('#error-message').empty();
        
        toastr.success(data.text);
      },
      error: function(data) { 
        unloading();

        const err = data.responseJSON.errors;
        let errMesssage = '';
        for(let key in err){
          errMesssage += err[key] + '<br>';
        }
        
        $('#error-message').empty().append(errMesssage);
      }  
    });
  }
});

$('#form').validate({
  rules: {
    first_name: "required",
    last_name: "required",
    username: {
      required: true,
      minlength: 5
    },
    email: {
      required: true,
      email: true,
    },
    password: {
      required: true,
      minlength: 8
    },
    password_confirmation: {
      required: true,
      minlength: 8,
      equalTo: "#password"
    },
  },
  messages: {
    first_name: "Please enter your first name",
    last_name: "Please enter your first name",
    username: {
      required: "Please enter a username",
      minlength: "Your username must be at least 5 characters long"
    },
    email: {
      required: "Please enter a email address",
      email: "Please enter a vaild email address"
    },
    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 8 characters long"
    },
    password_confirmation: {
      required: "Please provide a password",
      minlength: "Your password must be at least 8 characters long",
      equalTo: "Passwords do not matched"
    },
  },
  errorElement: 'span',
  errorPlacement: function (error, element) {
    error.addClass('invalid-feedback');
    element.closest('.form-group').append(error);
  },
  highlight: function (element, errorClass, validClass) {
    $(element).addClass('is-invalid');
  },
  unhighlight: function (element, errorClass, validClass) {
    $(element).removeClass('is-invalid');
  }
});

function deleteUser(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  })
  .then(function(result) {
    if (result.isConfirmed) {
      $.ajax({
        type: "DELETE",
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/users/" + id,
        success: function (data) {
          Swal.fire(data.title, data.text, data.icon);
          popuplateDataTable();
        },
        error: function(data) { 
          const err = data.responseJSON;
          Swal.fire(err.title, err.text, err.icon);
        }  
      });
    }
  });
}

function popuplateDataTable() {
  users.row($(this).parents('tr')).remove().draw();
}