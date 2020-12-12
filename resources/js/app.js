/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import StarRating from 'vue-star-rating'

import Vuelidate from 'vuelidate'

Vue.use(VueSweetalert2);


Vue.use(Vuelidate)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Carousel = require('./components/homes/Carousel')
const NewProducts = require('./components/homes/NewProducts')
const NewProductsSuggest = require('./components/homes/NewProductsSuggest')
const Banner = require('./components/homes/Banner')
const CartIcon = require('./components/carts/CartIcon')
const AddToCartButton = require('./components/AddToCartButton')
const Cart = require('./components/carts/Cart')
const ShippingPage = require('./components/shippings/Container')
const ProductListMerchantPage = require('./components/merchants/ProductList')
const OrderListMerchantPage = require('./components/merchants/OrderList')
const OnProcessOrderListMerchantPage = require('./components/merchants/OnProcessOrderList')
const OrderListCustomerPage = require('./components/customers/OrderList')
const PaymentConfirmation = require('./components/payments/PaymentConfirmation')
const BlogList = require('./components/blogs/BlogList')
const RegCustomer = require('./components/register/AddCustomerModal')
const RegMerchant = require('./components/register/AddMerchantModal')
const RegCebt = require('./components/register/AddCbtModal')
const TrackingPage = require('./components/customers/TrackingPage')
const SearchProduct = require('./components/search/SearchProduct')
const LoginModal = require('./components/auths/LoginModal')
const Spinner = require('./components/Spinner')
const SuccesOrdersList = require('./components/merchants/SuccesOrdersList')
const ProductsUlos = require('./components/search/Ulos')
const ProductsPakaian = require('./components/search/Pakaian')
const ProductsMakanan = require('./components/search/Makanan')
const ProductsAksesoris = require('./components/search/Aksesoris')
const ProductsObat = require('./components/search/Obat')
const AddToWishlistButton = require('./components/AddToWishlistButton')
const UserRating = require('./components/merchants/UserRating')
const UserRatingSecond = require('./components/merchants/UserRatingSecond')
const ProdukTerlaris = require('./components/homes/ProdukTerlaris')
const MainPage = require('./components/homestay/MainPage')
const CarouselHomestay = require('./components/homestay/CarouselHomestay')
const CreateHomestay = require('./components/homestay/merchant/CreateHomestay')
const UpdateHomestay = require('./components/homestay/merchant/UpdateHomestay')
const ListLogin = require('./components/auths/ListLogin')
const StatusKoperasi = require('./components/koperasi/StatusKoperasi')
const LayananMaintenence = require('./components/koperasi/LayananMaintenence')
const AllHomestay = require('./components/homestay/merchant/AllHomestay')
const KoperasiTidakAktif = require('./components/Koperasi/KoperasiTidakAktif')
const AkunPending = require('./components/Koperasi/AkunPending')
const InformasiDicari = require('./components/homes/InformasiDicari')
const KomunitasPaketWisata = require('./components/homes/KomunitasPaketWisata')
const FormPesanHomestay = require('./components/Homestay/FormPesanHomestay')
const NewOrder = require('./components/homestay/merchant/NewOrder')
const ProdukTerlaris2 = require('./components/homes/ProdukTerlaris2')
// const Test = require('./components/test/test');

Vue.component('star-rating', StarRating)

Vue.mixin({
    data: function () {
        return {
            get urlGlobalKoperasi() {
                return 'https://tobazone-koperasi.herokuapp.com/'
            }
        }
    }
})

const app = new Vue({
    el: '#app',
    components: {
        LayananMaintenence,
        KoperasiTidakAktif,
        StatusKoperasi,
        AkunPending,
        UserRating,
        UserRatingSecond,
        // Test,
        AddToWishlistButton,
        Carousel,
        NewProducts,
        NewProductsSuggest,
        Banner,
        SearchProduct,
        CartIcon,
        OrderListCustomerPage,
        Cart,
        AddToCartButton,
        ShippingPage,
        TrackingPage,
        PaymentConfirmation,
        RegCustomer,
        RegMerchant,
        BlogList,
        ProductListMerchantPage,
        OrderListMerchantPage,
        OnProcessOrderListMerchantPage,
        LoginModal,
        Spinner,
        SuccesOrdersList,
        ProductsUlos,
        ProductsPakaian,
        ProductsMakanan,
        ProductsAksesoris,
        ProductsObat,
        ProdukTerlaris,
        MainPage,
        CarouselHomestay,
        CreateHomestay,
        UpdateHomestay,
        ListLogin,
        RegCebt,
        InformasiDicari,
        KomunitasPaketWisata,
        AllHomestay,
        FormPesanHomestay,
        NewOrder,
        ProdukTerlaris2,
    },
    data() {
        return {
            message: ''
        }
    }

});
