
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const CarouselAsd = require('./components/homes/Carousel')
const NewProducts = require('./components/homes/NewProducts')
const Banner = require('./components/homes/Banner')
const CardSwiper = require('./components/homes/CardSwiper')
const CartIcon = require('./components/carts/CartIcon')
const AddToCartButton = require('./components/AddToCartButton')
const Cart = require('./components/carts/Cart')
const ShippingPage = require('./components/shippings/Container')
const ProductListMerchantPage = require('./components/merchants/ProductList')
const MerchantPage = require('./components/register/MerchantChooser')
const CustomerPage = require('./components/register/CustomerChooser')
const OrderListMerchantPage = require('./components/merchants/OrderList')
const OnProcessOrderListMerchantPage = require('./components/merchants/OnProcessOrderList')
const OrderListCustomerPage = require('./components/customers/OrderList')
const PaymentConfirmation = require('./components/payments/PaymentConfirmation')
const BlogList = require('./components/blogs/BlogList')
const RegCustomer = require('./components/register/AddCustomerModal')
const RegMerchant = require('./components/register/AddMerchantModal')

new Vue({
  el: '#app',
  components: { CarouselAsd }
});

new Vue({
  el: '#new-product',
  components: { NewProducts }
})

new Vue({
  el: '#card-swiper',
  components: { CardSwiper }
})

new Vue({
  el: '#banner',
  components: { Banner }
})

new Vue({
  el: '#cart-icon',
  components: { CartIcon }
})

new Vue({
  el: '#add-to-cart-button',
  components: { AddToCartButton }
})

new Vue({
  el: '#cart',
  components: { Cart }
})

new Vue({
  el: '#shipping-page',
  components: { ShippingPage }
})

new Vue({
  el: '#product-list',
  components: { ProductListMerchantPage }
})

new Vue({
  el: '#merchant-page',
  components: { MerchantPage }
})

new Vue({
  el: '#customer-page',
  components: { CustomerPage }
})

new Vue({
  el: '#order-list-merchant',
  components: { OrderListMerchantPage }
})

new Vue({
  el: '#order-list-customer',
  components: { OrderListCustomerPage }
})

new Vue({
  el: '#payment-confirmation',
  components: { PaymentConfirmation }
})

new Vue({
  el: '#blog-list',
  components: { BlogList }
})

new Vue({
  el: '#reg-customer',
  components: { RegCustomer }
})

new Vue({
  el: '#reg-merchant',
  components: { RegMerchant }
})

new Vue({
  el: '#on-process-order-list',
  components: { OnProcessOrderListMerchantPage }
})