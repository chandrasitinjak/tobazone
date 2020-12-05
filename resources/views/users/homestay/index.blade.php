@extends('users.layouts.app')
@section('title') {{ "Homestays" }}
@endsection

@section('content')

<section class="shop_grid_area section-padding-80">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="card" style="background-color: #FFFAF4">
                    <div>
                        <form action="/homestays/search" method="POST">
                            {{ csrf_field() }}
                            <div class="container">
                                <br><br>
                                <label for="lokasi">Destinasi Penginapan</label>
                                <div id="lokasi" class="input-container">
                                    <i class="fa fa-map-marker icon fa-lg" style="color:#000000;"></i>
                                    <input class="form-control" type="text" placeholder="Lokasi"
                                           name="kecamatan">
                                </div>
                                <label for="check">Check In</label>
                                <div class="row" id="check">
                                    <div class="input-container col-md-5">
                                        <i class="fa fa-calendar icon fa-lg" style="color:#000000;"></i>
                                        <input class="form-control" type="date" name="check-in">
                                    </div>
                                    <div class="input-container col-md-5">
                                        <i class="fa fa-moon-o icon fa-lg" style="color:#000000;"></i>
                                        <input class="form-control" type="number" name="durasi">
                                    </div>
                                </div>
                                <label for="tamu">Tamu dan Kamar</label>
                                <div id="tamu" class="input-container ">
                                    <i class="fa fa-users icon fa-lg" style="color:#000000;"></i>
                                    <input class="form-control" type="number" min="1" name="check-in">
                                </div>
                                <br>
                                <div>
                                    <button class="form-control"
                                            style="background-color:#000000; color:#ffffff;" type="submit">Cari
                                    </button>
                                </div>
                                <br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--        -->
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
        <nav aria-label="navigation">
          <ul class="pagination mt-50 mb-70">
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">21</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </nav>
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

