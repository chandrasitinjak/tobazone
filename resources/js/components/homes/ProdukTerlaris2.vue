<template>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card globalcard p-4" style="background-color:#640000" >
                    <!--            <div class="card-header">-->
                    <!--                <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color:#640000 ; border:none">-->
                    <!--                    <h3 class="m-auto">Produk Terlaris</h3>-->
                    <!--                </nav>-->
                    <!--            </div>-->
                    <h3 class="text-center text-white mt-5">Produk Terlaris</h3>
                    <div class="card-body globalcardbody">
                        <carousel
                            :mouse-drag="true"
                            :scrollPerPage="true"
                            :spacePadding="20"
                            :speed="800"
                            :paginationEnabled="false"
                            :autoplay="true"
                            :perPageCustom="[[0, 1], [991.88, 4]]"
                            :navigationEnabled="true"
                            navigationNextLabel="<i class='fa fa-angle-right fa-3x text-white'></i>"
                            navigationPrevLabel="<i class='fa fa-angle-left fa-3x text-white'></i>"
                        >
                            <slide class="px-2" v-for="product in products">
                                <a :href="'/products/' + product.id">
                                    <div class="card product ">

                                        <div class="imgwrapper">
                                            <img :src="'/images/' + JSON.parse(product.images)[0]" alt="Card image cap"
                                                 style='height: 100%; width: 100%; object-fit: cover'>
                                        </div>


                                        <div class="card-body">
                                            <p class="card-title productname"
                                               style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20ex;">
                                                {{product.name}}</p>
                                            <h6 style="color: #ff5205">Rp {{formatPrice (product.price)}}</h6>
                                            <p class="card-text float-right">
                                                <small class="text-muted">{{ product.merchant_name }}</small>
                                            </p>

                                        </div>
                                    </div>
                                </a>
                            </slide>
                        </carousel>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import carousel2 from "vue-owl-carousel";
import {Carousel, Slide} from "vue-carousel";
import EventBus from "../../eventBus";

export default {
    components: { carousel2, Carousel, Slide },
    props: ["userId", "title"],
    data() {
        return {
            products: [],
        };
    },
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed().replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        async getAllProducts() {
            await window.axios
                .get("/api/product/get-product-terlaris")
                .then(res => {
                    this.products = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        async addToCart(id) {
            let payload = {
                productId: id,
                total: 1,
                userId: this.userId
            };

            await window.axios
                .post("/api/carts", payload)
                .then(res => {
                    this.emitEvent(res.data);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        emitEvent(data) {
            EventBus.$emit("CART_UPDATED", data);
        }
    },
    mounted() {
        this.getAllProducts();
    }
};
</script>

<style>
.card-paket {
    border-radius: 15px;
}

#card-img {
    border-top-right-radius: 15px;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;

}
</style>
