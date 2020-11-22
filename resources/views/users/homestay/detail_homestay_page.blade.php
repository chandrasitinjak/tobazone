@extends('users.layouts.appPenginapan')
@section('title') {{ "Homestays" }}
@endsection

@section('content')

<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="card container" style="background-color: #FFFAF4">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h6>{{$homestays->name}}</h6>
                </div>
                <div class="col-md-6" align="right">
                    <h6 style="color: #FF8311">Harga Kamar/Hari </h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>{{$homestays->address}}</h6>
                </div>
                <div class="col-md-6" align="right">
                    <h6 style="color: #FF8311">Rp. {{$homestays->price}}</h6>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="container card" style="background-color: #FFFAF4">
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <img src="{{ '../../images/assets/no-image.jpg'}}" alt="">
                </div>
                <div class="col-md-4">
                    <br>
                    <p>Check-in</p>
                    <div class="input-container">
                        <i class="fa fa-calendar icon fa-lg" style="color:#000000;"></i>
                        <input style="background-color: #F5F5F5" type="date" class="form-control">
                    </div>
                    <p>Durasi</p>
                    <div class="input-container">
                        <i class="fa fa-moon-o icon fa-lg" style="color:#000000;"></i>
                        <input style="background-color: #F5F5F5" type="number" min="1" class="form-control">
                    </div>
                    <p>Jumlah Kamar</p>
                    <div class="input-container">
                        <i class="fa fa-bed icon fa-lg" style="color:#000000;"></i>
                        <input style="background-color: #F5F5F5" type="number" min="1" max="{{$homestays->room_available}}" class="form-control">
                    </div>
                    <br>
                    <br>
                    <button class="btn form-control" style="background-color: #0b0b0b; color: white">Pesan Homestay</button>
                    <br><br>
                </div>
            </div>
            <br><br>
            <p>{{$homestays->description}}</p>
            <br><br><br><br>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection

<style scoped>
    /* Style the input container */
    .input-container {
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    /* Style the form icons */
    .icon {
        padding: 10px;
        background: #F5F5F5;
        color: white;
        min-width: 50px;
        text-align: center;
    }

</style>
