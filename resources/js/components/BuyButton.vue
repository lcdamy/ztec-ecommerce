<template>
    <div>
        <button class="btn btn-success" @click="orderProduct">Buy</button>
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
            let data = JSON.parse(this.product);
            if (parseInt(data.discounted_price) > parseInt(this.balance)) {
                alert("You need to top-up your wallet first!");
                return;
            }
            axios
                .post("/order", data, {
                    headers: { "content-Type": "application/json" },
                })
                .then((respsone) => {
                    if (respsone.data === "success") {
                        alert("Item Purchased");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
