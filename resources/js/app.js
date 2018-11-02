
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
const CartIcon = require('./components/CartIcon')

const app = new Vue({
    el: '#app',
    components: { CarouselAsd }
});

const newProduct = new Vue({
    el: '#new-product',
    components: { NewProducts }
})

const cardSwiper = new Vue({
    el: 'card-swiper',
    components: { CardSwiper }
})

const banner = new Vue({
    el: '#banner',
    components: { Banner }
})

const cartIcon = new Vue({
    el: '#cart-icon',
    components: { CartIcon }
})
