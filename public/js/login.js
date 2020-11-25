
var hidden;
async function login() {

    const email = document.getElementById('email').value
    const password = document.getElementById('password').value
    const hidden = document.getElementById('hidden-customer').value

    var cek_depan = 1;

    if (email.length === 0) {
        cek_depan = 0;
        
        $('#email').css({
            'border': '1px solid #ff3333',
            'border-radius': '2px',
            'box-shadow': '0px 0px 5px 0px #ff3333',
            'outline': 'red',

        }).focus();

        $('#err_requiredEmail').css({
            'display': 'block', 
            'margin-top': '2px'           
        });

        $('#err_notValidEmail').css({
            'display': 'none',              
        });
        
    }

    if (email.length != 0) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            $('#email').css({
            'border': '1px solid #ff3333',
            'border-radius': '2px',
            'box-shadow': '0px 0px 5px 0px #ff3333',
            'outline': 'red',
            }).focus();

            cek_depan = 0;

            $('#err_notValidEmail').css({
                'display': 'block',  
                'margin-top': '2px'          
            });
    
            $('#err_requiredEmail').css({
                'display': 'none',         
            });
        } else {
            $('#email').css({
                'border': '1px solid green',
                'border-radius': '2px',
                'box-shadow': '0px 0px 5px 0px green',
                'outline': 'red',
                }).focus();

                $('#err_notValidEmail').css({
                    'display': 'none',  
                    'margin-top': '2px'          
                });
        
                $('#err_requiredEmail').css({
                    'display': 'none',         
                });
        }        
    }



    if (password.length === 0) {
        $('#password').css({
            'border': '1px solid #ff3333',
            'border-radius': '2px',
            'box-shadow': '0px 0px 5px 0px #ff3333',
            'outline': 'red',
        }).focus();

        $('#Err_requiredPassword').css({
            'display': 'block',            
        });
        cek_depan = 0;
    } else {

        $('#password').css({
            'border': '1px solid green',
            'border-radius': '2px',
            'box-shadow': '0px 0px 5px 0px green',
            'outline': 'red',
        }).focus();

        $('#Err_requiredPassword').css({
            'display': 'none',            
        });
    }

    if (cek_depan === 1) {

        await jQuery.ajax({
            url: '/login/'+hidden,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },

            data: {
                email: email,
                password: password,
            },

            dataType: 'json',

            beforeSend: function () {
                $("#loader").show();                                                
            },

            complete: (xhr, error) => {
                if (xhr.status == 200) {

                    if(hidden=="customer"){
                        window.location.href="/"
                    }else if(hidden=="cbt"){
                        window.location.href="/"
                    }else if(hidden=="admin"){
                        window.location.href="/"
                    }else if(hidden=="merchant"){
                        window.location.href="/"
                    }
                } else if (xhr.status == 422) {
                    document.getElementById("exampleModalLabel").innerHTML = "E-mail atau Kata Sandi salah";
                    $('#password').css({
                        'border': '1px solid #ff3333',
                        'border-radius': '2px',
                        'box-shadow': '0px 0px 5px 0px #ff3333',
                        'outline': 'red',
                    }).focus();

                    $('#email').css({
                        'border': '1px solid #ff3333',
                        'border-radius': '2px',
                        'box-shadow': '0px 0px 5px 0px #ff3333',
                        'outline': 'red',
                    });

                    $('#exampleModalLabel').css({
                        'color': 'red'
                    });                                        
                    
                } else {

                }
                
                $("#loader").hide();
            },            
            error : function() {
                $("#loader").hide();
            },
        })
    }
}
