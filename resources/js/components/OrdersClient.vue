<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>Order History</div>
                        <div>
                            <a href="/">
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-in-left"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 offset-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="width: 100px">
                                            Photo
                                        </th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in orders">
                                        <th scope="row">{{ order.id }}</th>
                                        <td>
                                            <img
                                                v-bind:src="
                                                    '/storage/' + order.image
                                                "
                                                class="w-50"
                                            />
                                        </td>
                                        <td>{{ order.name }}</td>
                                        <td>{{ order.order_qty }}</td>
                                        <td>{{ order.price }}</td>
                                        <td>{{ order.created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            orders: [],
        };
    },
    mounted() {
        this.loadOrders();
    },
    methods: {
        loadOrders: function () {
            axios
                .get("/api/order/history")
                .then((response) => {
                    //if (response.data.status === "success") {
                    this.orders = response.data.data;
                    // }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
