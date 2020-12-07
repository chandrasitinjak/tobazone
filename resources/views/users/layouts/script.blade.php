<script src="/js/app.js" defer></script>
<!-- jQuery (Necessary for All JavaScript Plugins) -->
{{--<script src="/user-assets/js/jquery/jquery-2.2.4.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Popper js -->
<script src="/user-assets/js/popper.min.js"></script>
<!-- Bootstrap js -->
{{-- <script src="/user-assets/js/bootstrap.min.js"></script> --}}
<!-- Plugins js -->
{{-- <script src="/user-assets/js/plugins.js"></script> --}}
<!-- Classy Nav js -->
<script src="/user-assets/js/classy-nav.min.js"></script>
<!-- Active js -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="application/javascript" src="/js/login.js"> </script>



<script type="application/javascript">
    $(document).ready(function () {


        $('#searchagain').click(function() {
            $('#headerSearch').focus();
        });

        $('.imagesliderholder img').on('click', function() {
            $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
            $('#enlargeImageModal').modal('show');
        });
        

        $('#email').keypress(function(e){
            if(e.which == 13){  //Enter is key 13
                login();
            }
        });

        $('#email').keypress(function(e){
            if(e.which == 13){  //Enter is key 13
                login();
            }
        });

        $('#password').keypress(function(e){
            if(e.which == 13){  //Enter is key 13
                login();
            }
        });
    });            
</script>


