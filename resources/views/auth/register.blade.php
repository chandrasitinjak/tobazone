@extends('users.layouts.app')

@section('content')
    <style>
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button1:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>

    <div class="row justify-content-center" style="min-height: 300px">
        <div class="col-12">

            <div class="card m-3">
                <div class="card-header" ><h4>Mendaftar sebagai</h4>
                    <ul class="nav nav-tabs border-0 my-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="mediumbtn active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pembeli</a>
                        </li>
                        <div class="small mx-3">atau sebagai </div>
                        <li class="nav-item">
                            <a class="mediumbtn " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Penjual</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="reg-customer">
                                <reg-customer/>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div id="reg-merchant">
                                <reg-merchant/>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>

                </div>


            </div>
        </div>



    </div>

    <script>
        var $myGroup = $('#myGroup');
        $myGroup.on('show.bs.collapse','.collapse', function() {
            $myGroup.find('.collapse.show').collapse('hide');
        });
    </script>
@endsection
