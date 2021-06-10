

    function checkFirstName(){
        let firstNameLength     =   $('#firstName').val().length;
        if (firstNameLength     >= 5 && firstNameLength <= 10){
            $('#firstNameError').text(' ');
        }else {
            $('#firstNameError').text('first name should be 5 to 10 character');
        }
    }
    $('#firstName').click(function (){
        checkFirstName();
        });
        $('#firstName').blur(function (){
            $('#firstNameError').text(' ');
        });
        $('#firstName').keyup(function (){
            checkFirstName();
        });

    function checkLastName(){
        let lastNameLength      =   $('#lastName').val().length;
        if(lastNameLength >= 5 && lastNameLength <= 10){
            $('#lastNameError').text(' ');
        }else {
            $('#lastNameError').text('Last Name Should be 5 to 10 character');
        }
    }
    $('#lastName').click(function (){
        checkLastName();
    });
    $('#lastName').blur(function (){
        $('#lastNameError').text(' ');
    });
    $('#lastName').keyup(function (){
        checkLastName();
    });

    function checkEmail(){
        let pattern     =   new RegExp( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/);
        if (pattern.test($('#emailAddress').val())){
            $('#emailError').text(' ');
        }else{
            $('#emailError').text('Email address is invalid');
        }
    };

    $('#emailAddress').click(function (){
        checkEmail();
    });
    $('#emailAddress').blur(function (){
        $('#emailError').text(' ');
    });
    $('#emailAddress').keyup(function (){
        checkEmail();
    });

    function checkPassword() {
        let passwordLength  =   $('#password').val().length;
        if (passwordLength >= 8 && passwordLength   <= 15){
            $('#passwordError').text(' ');
        }else {
            $('#passwordError').text('Password must be 8 to 15 character');
        }
    };
    $('#password').click(function (){
        checkPassword();
    });
    $('#password').blur(function (){
        $('#passwordError').text(' ');
    });
    $('#password').keyup(function (){
        checkPassword();
    });
    $('#showPassword').click(function (){
       let showPassword = $('#password').val();
       // alert(showPassword);
      document.getElementById('passwordDisplay').value=showPassword;
    });
    $('#showPassword').blur(function (){
        let showPassword = $('#password').val();
        // alert(showPassword);
        document.getElementById('passwordDisplay').value;
    });


    // $('#registrationForm').submit(function (){
    // });



