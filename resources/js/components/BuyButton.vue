<template>
    <div>
        <button class="btn btn-success" @click="orderProduct">
            <i class="bi bi-bag-fill"></i> Buy
        </button>
    </div>
</template>

<script>
export default {
    props: ["product", "balance"],
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        orderProduct() {
            const token = localStorage.getItem("token");
            let config = {
                headers: {
                    Authorization: "Bearer " + token,
                },
            };
            let data = JSON.parse(this.product);
            if (parseInt(data.discounted_price) > parseInt(this.balance)) {
                alert("You need to top-up your wallet first!");
                return;
            }
            axios
                .post("/api/order", data, config, {
                    headers: { "content-Type": "application/json" },
                })
                .then((response) => {
                    if (response.data.status === "success") {
                        window.location.href = "/order/history";
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
