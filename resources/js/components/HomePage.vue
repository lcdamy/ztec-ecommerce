<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- @if (auth()->check()) -->
                <div class="card p-4 mb-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            Balance:
                            <strong
                                >{{ balance }} <sub>{{ currency }}</sub></strong
                            >
                        </div>
                    </div>
                </div>
                <!-- @endif -->
                <div class="row">
                    <!-- @foreach ($products as $product) -->
                    <div class="col-4 mt-2" v-for="product in products">
                        <div>
                            <div class="card p-1">
                                <img
                                    v-bind:src="'/storage/' + product.image"
                                    alt=""
                                    srcset=""
                                />
                                <div class="d-flex justify-content-between">
                                    <div class="pl-1">
                                        <div>
                                            <strong>{{ product.name }}</strong>
                                        </div>

                                        <div
                                            v-if="
                                                product.price !=
                                                product.discounted_price
                                            "
                                        >
                                            <div>
                                                Before:
                                                <strong
                                                    ><del>{{
                                                        product.price
                                                    }}</del>
                                                    <sub>{{
                                                        product.code
                                                    }}</sub></strong
                                                >
                                            </div>

                                            <div>
                                                After:
                                                <strong
                                                    >{{
                                                        product.discounted_price
                                                    }}
                                                    <sub>{{
                                                        product.code
                                                    }}</sub></strong
                                                >
                                            </div>
                                        </div>

                                        <div
                                            v-if="
                                                product.price ==
                                                product.discounted_price
                                            "
                                        >
                                            <div>
                                                <strong
                                                    >{{ product.price }}
                                                    <sub>{{
                                                        product.code
                                                    }}</sub></strong
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-1">
                                        <a v-bind:href="'/order/' + product.id">
                                            <button
                                                class="btn btn-success"
                                                style="width: 70px"
                                            >
                                                <i class="bi bi-bag-fill"></i
                                                >Buy
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- @endforeach -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["currency", "balance", "token"],
    data: function () {
        return {
            products: [],
        };
    },
    mounted() {
        this.loadProducts();
        this.saveToken();
    },
    methods: {
        saveToken: function () {
            console.log(this.token);
            if (!localStorage.getItem("token")) {
                localStorage.setItem("token", this.token);
            }
        },
        loadProducts: function () {
            axios
                .get("/api/items")
                .then((response) => {
                    // if (response.data.status === "success") {
                    this.products = response.data.data;
                    //  }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
