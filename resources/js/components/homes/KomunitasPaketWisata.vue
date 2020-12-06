<template>
    <div class="col-md-12">
        <br><br><br>
        <div class="card globalcard">
            <div class="card-header">
                <nav class="navbar navbar-expand-lg mproduct p-1" style="background-color: transparent; border:none">
                    <h3 class="m-auto">Produk Terlaris</h3>
                </nav>
            </div>
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
                        navigationNextLabel="<i class='fa fa-angle-right fa-3x'></i>"
                        navigationPrevLabel="<i class='fa fa-angle-left fa-3x'></i>"
                >
                    <slide class="px-2">
                        <div class="card-paket" style="height: 12rem">
                            <img id="card-img" src="https://images.unsplash.com/photo-1606940077503-8cd3365e5cdc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080"
                                 alt="Card image cap"
                                 style='height: 100%; width: 100%; object-fit: cover'>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-white mx-3 mt-2">Kuliner</h5>
                            </div>
                        </div>
                    </slide>
                    <slide class="px-2">
                        <div class="card product" style="height: 12rem">
                            <img src="https://images.unsplash.com/photo-1606940077503-8cd3365e5cdc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080"
                                 alt="Card image cap"
                                 style='height: 100%; width: 100%; object-fit: cover'>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-white">Kuliner</h5>
                            </div>
                        </div>

                    </slide>
                    <slide class="px-2">
                        <div class="card product" style="height: 12rem">
                            <img src="https://images.unsplash.com/photo-1606940077503-8cd3365e5cdc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080"
                                 alt="Card image cap"
                                 style='height: 100%; width: 100%; object-fit: cover'>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-white">Kuliner</h5>
                            </div>
                        </div>

                    </slide>
                    <slide class="px-2">
                        <div class="card product" style="height: 12rem">
                            <img src="https://images.unsplash.com/photo-1606940077503-8cd3365e5cdc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080"
                                 alt="Card image cap"
                                 style='height: 100%; width: 100%; object-fit: cover'>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-white">Kuliner</h5>
                            </div>
                        </div>

                    </slide>
                    <slide class="px-2">
                        <div class="card product" style="height: 12rem">
                            <img src="https://images.unsplash.com/photo-1606940077503-8cd3365e5cdc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxfDB8MXxhbGx8fHx8fHx8fA&ixlib=rb-1.2.1&q=80&w=1080"
                                 alt="Card image cap"
                                 style='height: 100%; width: 100%; object-fit: cover'>
                            <div class="card-img-overlay">
                                <h5 class="card-title text-white">Kuliner</h5>
                            </div>
                        </div>

                    </slide>

                </carousel>
            </div>
        </div>
    </div>

</template>

<script>
    import carousel2 from "vue-owl-carousel";
    import {Carousel, Slide} from "vue-carousel";
    import EventBus from "../../eventBus";

    export default {
        components: {carousel2, Carousel, Slide},
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
