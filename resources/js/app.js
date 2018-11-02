
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

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('new-products', require('./components/NewProducts.vue'));
// Vue.component('carousel', require('./components/Carousel.vue'));

const CarouselAsd = require('./components/Carousel')
const NewProducts = require('./components/NewProducts')
const Banner = require('./components/Banner')
const CardSwiper = require('./components/CardSwiper')

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
