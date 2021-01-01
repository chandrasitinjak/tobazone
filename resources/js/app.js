/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import StarRating from 'vue-star-rating';

import Vuelidate from 'vuelidate';
Vue.use(Loading, {
    color: '#073763'
});

Vue.use(VueSweetalert2);


Vue.use(Vuelidate)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Carousel = require('./components/homes/Carousel').default
const NewProducts = require('./components/homes/NewProducts').default
const NewProductsSuggest = require('./components/homes/NewProductsSuggest').default
const Banner = require('./components/homes/Banner').default
const CartIcon = require('./components/carts/CartIcon').default
const AddToCartButton = require('./components/AddToCartButton').default
const Cart = require('./components/carts/Cart').default
const ShippingPage = require('./components/shippings/Container').default
const ProductListMerchantPage = require('./components/merchants/ProductList').default
const OrderListMerchantPage = require('./components/merchants/OrderList').default
const OnProcessOrderListMerchantPage = require('./components/merchants/OnProcessOrderList').default
const OrderListCustomerPage = require('./components/customers/OrderList').default
const PaymentConfirmation = require('./components/payments/PaymentConfirmation').default
const BlogList = require('./components/blogs/BlogList').default
const RegCustomer = require('./components/register/AddCustomerModal').default
const RegMerchant = require('./components/register/AddMerchantModal').default
const RegCebt = require('./components/register/AddCbtModal').default
const TrackingPage = require('./components/customers/TrackingPage').default
const SearchProduct = require('./components/search/SearchProduct').default
const LoginModal = require('./components/auths/LoginModal').default
const Spinner = require('./components/Spinner').default
const SuccesOrdersList = require('./components/merchants/SuccesOrdersList').default
const ProductsUlos = require('./components/search/Ulos').default
const ProductsPakaian = require('./components/search/Pakaian').default
const ProductsMakanan = require('./components/search/Makanan').default
const ProductsAksesoris = require('./components/search/Aksesoris').default
const ProductsObat = require('./components/search/Obat').default
const AddToWishlistButton = require('./components/AddToWishlistButton').default
const UserRating = require('./components/merchants/UserRating').default
const UserRatingSecond = require('./components/merchants/UserRatingSecond').default
const ProdukTerlaris = require('./components/homes/ProdukTerlaris').default
const MainPage = require('./components/homestay/MainPage').default
const CarouselHomestay = require('./components/homestay/CarouselHomestay').default
const CreateHomestay = require('./components/homestay/merchant/CreateHomestay').default
const UpdateHomestay = require('./components/homestay/merchant/UpdateHomestay').default
const ListLogin = require('./components/auths/ListLogin').default
const EditAlamat = require('./components/auths/EditAlamat').default
const EditAlamatMerchant = require('./components/auths/EditAlamatMerchant').default
const StatusKoperasi = require('./components/koperasi/StatusKoperasi').default
const LayananMaintenence = require('./components/koperasi/LayananMaintenence').default
const AllHomestay = require('./components/homestay/merchant/AllHomestay').default
const KoperasiTidakAktif = require('./components/Koperasi/KoperasiTidakAktif').default
const AkunPending = require('./components/Koperasi/AkunPending').default
const InformasiDicari = require('./components/homes/InformasiDicari').default
const KomunitasPaketWisata = require('./components/homes/KomunitasPaketWisata').default
const FormPesanHomestay = require('./components/Homestay/FormPesanHomestay').default
const NewOrder = require('./components/homestay/merchant/NewOrder').default
const ProdukTerlaris2 = require('./components/homes/ProdukTerlaris2').default
const PaketRating = require('./components/paket/Rating').default
const HomestayTerlaris = require('./components/homestay/HomestayTerlaris').default
const SuccessOrder = require('./components/homestay/merchant/SuccessOrder').default
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
        EditAlamat,
        EditAlamatMerchant,
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
        PaketRating,
        HomestayTerlaris,
        SuccessOrder
    },
    data() {
        return {
            message: '',
            rows: [
                {nama_produk: '', kategori: ''}
            ],
        }
    },
    methods: {
        addRow() {
            this.rows.push({nama_produk: '', kategori: ''});
        },
        deleteRow() {
            this.rows.pop();
        },
    },

});