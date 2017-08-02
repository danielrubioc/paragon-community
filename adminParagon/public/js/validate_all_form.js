
  // Formulario Usuarios

  $(function() {
    // Setup form validation on the #register-form element
    $("#register-user-form").validate({
    
        // Specify the validation rules
        rules: {
            name: "required",
            sex: "gender",
            address: "required",
            email: {
                required: true,
                email: true
            },
            username: "required",
            password: {
                required: true,
                minlength: 6
            }
        },
        
        // Specify the validation error messages
        messages: {
            name: "Por favor, ingresa tu nombre",
            gender: "Por favor, especifica tu género",
            address: "Por favor, ingresa tu dirección",
            email: "Por favor, ingresa una dirección de correo electrónico válida",
            username: "Por favor, enter a valid username",
            password: {
                required: "Por favor, provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
