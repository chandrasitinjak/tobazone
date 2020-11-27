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
                    <h4 >{{$homestays->name}}</h4>
                </div>
                <div class="col-md-6" align="right">
                    <p style="color: #FF8311">Harga Kamar/Hari </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{$homestays->address}}</p>
                </div>
                <div class="col-md-6" align="right">
                    <h4 style="color: #FF8311">Rp. {{$homestays->price}}</h4>
                </div>
            </div>
            <br>
        </div>
        <br><br>
        <div class="container card" style="background-color: #FFFAF4">
            <form method="POST" action="{{url('/homestay/pesan/'. $homestays->id)}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <br>
                        <img src="{{ '../../images/'.$homestays->image}}" style="height: 100%; width: 100%; object-fit: cover" alt="">
                    </div>
                    <div class="col-md-4">
                        <br>
                        <p>Check-in</p>
                        <div class="input-container">
                            <i class="fa fa-calendar icon fa-lg" style="color:#000000;"></i>
                            <input style="background-color: #F5F5F5" type="date" name="checkIn"
                                   class="form-control">
                        </div>
                        <p>Durasi</p>
                        <div class="input-container">
                            <i class="fa fa-moon-o icon fa-lg" style="color:#000000;"></i>
                            <input style="background-color: #F5F5F5" name="durasi" type="number" min="1"
                                   class="form-control">
                        </div>
                        <p>Jumlah Kamar</p>
                        <div class="input-container">
                            <i class="fa fa-bed icon fa-lg" style="color:#000000;"></i>
                            <input style="background-color: #F5F5F5" type="number" name="jumlahKamar" min="1" class="form-control">
                        </div>
<!--                        <p>Metode Pembayaran</p>-->
<!--                        <div class="input-container">-->
<!--                            <input type="radio" id="male" name="gender" value="male">-->
<!--                            <label for="male">Ovo</label><br>-->
<!--                            <input type="radio" id="female" name="gender" value="female">-->
<!--                            <label for="female">Gopay</label><br>-->
<!--                            <input type="radio" id="other" name="gender" value="other">-->
<!--                            <label for="other">BNI</label>-->
<!--                        </div>-->
                        <br>
                        <br>
                        <button class="btn form-control"
                                style="background-color: #0b0b0b; color: white">Pesan Homestay
                        </button>
                        <br><br>
                    </div>
                </div>
            </form>
            <br><br>
            <p class="container">{{$homestays->description}}</p>
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
                            <div
                                class="product-topbar d-flex align-items-center justify-content-between">
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
