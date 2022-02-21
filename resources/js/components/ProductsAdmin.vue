<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="card-header d-flex justify-content-between">
                        <div>List Products</div>
                        <div>
                            <a href="/dashboard/product/create"
                                ><button class="btn btn-primary">
                                    Add new product
                                </button></a
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8 offset-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 100px">Photo</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Original-Price</th>
                                <th scope="col">Discout-Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products">
                                <th scope="row">{{ product.id }}</th>
                                <td>
                                    <img
                                        v-bind:src="'/storage/' + product.image"
                                        class="w-50"
                                    />
                                </td>
                                <td>{{ product.name }}</td>
                                <td>{{ product.quantity }}</td>
                                <td>
                                    {{ product.price }}
                                    <sub
                                        ><b>{{ product.code }}</b></sub
                                    >
                                </td>
                                <td>
                                    {{ product.discounted_price }}
                                    <sub
                                        ><b>{{ product.code }}</b></sub
                                    >
                                </td>
                                <td>{{ product.description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            products: [],
        };
    },
    mounted() {
        this.loadProducts();
    },
    methods: {
        loadProducts: function () {
            const token = localStorage.getItem("token");
            let config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .get("/api/products", config)
                .then((response) => {
                    if (response.data.status === "success") {
                        this.products = response.data.data;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
