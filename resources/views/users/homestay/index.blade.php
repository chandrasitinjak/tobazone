@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class=" col-md-1">

            </div>
            <div class="col-md-10">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg"
                                 alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg"
                                 alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg"
                                 alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class=" col-md-1">

            </div>
        </div>

    </div>

<section class="shop_grid_area section-padding-80">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="card" style="background-color: #FFFAF4" style="outline: none">
                    <div>
                        <form action="/homestays/search" method="POST">
                            {{ csrf_field() }}
                            <div class="container">

                                <br><br>
                                <div class="row justify-content-md-center">
                                    <div class="col col-md-1">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="lokasi">Destinasi Penginapan</label>
                                        <div id="lokasi" class="input-container">
                                            <i class="fa fa-map-marker icon fa-lg" style="color:#000000;"></i>
                                            <input class="form-control" type="text" placeholder="Lokasi" name="kecamatan">
                                        </div>
                                        <label for="check">Check In</label>
                                        <div class="row" id="check">
                                            <div class="input-container col-md-6">
                                                <i class="fa fa-calendar icon fa-lg" style="color:#000000;"></i>
                                                <input class="form-control" type="date" name="check-in">
                                            </div>

                                            <div class="input-container col-md-6">
                                                <i class="fa fa-moon-o icon fa-lg" style="color:#000000;"></i>
                                                <input class="form-control" type="number" name="durasi">
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <label for="tamu">Tamu dan Kamar</label>
                                        <div id="tamu" class="input-container ">
                                            <i class="fa fa-users icon fa-lg" style="color:#000000;"></i>
                                            <input class="form-control" type="number" min="1" name="check-in">
                                        </div>
                                        <br>
                                        <div>

                                            <button class="form-control" style="background-color:#000000; color:#ffffff;" type="submit">Cari</button>

                                        </div>
                                    </div>
                                    <div class="col col-md-1">

                                    </div>
                                </div>

                                <br><br>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="col-md-4 card">--}}
{{--            <div class="single-product-wrapper">--}}
{{--                <div style="margin: 10px">--}}

{{--                    <a href="{{ '../images/'. $homestays[0]->image}}">--}}
{{--                        <div class="product-img">--}}
{{--                            <img src="{{ '../images/'. $homestays[0]->image}}"  style='width: 100%; object-fit: cover' alt="">--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="product-description">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <a href="{{ url('/homestays/find', $homestays[0]->id)}}"><h6>{{--}}
{{--                                        $homestays[0]->name }}</h6></a>--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <div class="col-md-6" align="right">--}}
{{--                                <p> {{--}}
{{--                                    $homestays[0]->address }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <p class="product-price" style="color: #FF8311; "> Rp.{{--}}
{{--                                    $homestays[0]->price }}</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6" align="right">--}}
{{--                                <p> {{--}}
{{--                                    $homestays[0]->username }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
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

          <div class="row">
            @foreach ($homestays as $product)
              <div class="col-12 col-sm-6 col-lg-4">
                  <div class="single-product-wrapper card">
                      <div style="margin: 10px">

                          <a href="{{ '../images/'. $product->image}}">
                              <div class="product-img">
                                  <img src="{{ '../images/'. $product->image}}"  style='width: 100%; object-fit: cover' alt="">
                              </div>
                          </a>
                          <div class="product-description">
                              <div class="row">
                                  <div class="col-md-6">
                                      <a href="{{ url('/homestays/find', $product->id)}}"><h6>{{
                                              $product->name }}</h6></a>
                                  </div>
                                  <br>
                                  <div class="col-md-6" align="right">
                                      <p> {{
                                          $product->address }}</p>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <p class="product-price" style="color: #FF8311; "> Rp.{{
                                          $product->price }}</p>
                                  </div>
                                  <div class="col-md-6" align="right">
                                      <p> {{
                                          $product->username }}</p>
                                  </div>
                                  <br><br>
                              </div>
                          </div>
                      </div>
                      </a>
                  </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- Pagination -->
{{--        <nav aria-label="navigation">--}}
{{--          <ul class="pagination mt-50 mb-70">--}}
{{--            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">21</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>--}}
{{--          </ul>--}}
{{--        </nav>--}}
      </div>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->
@endsection

<script>
    import MainPage from "../../../js/components/homestay/MainPage";
    import CarouselHomestay from "../../../js/components/homestay/CarouselHomestay";

    export default {
        components : {MainPage,CarouselHomestay}
    }
</script>
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

