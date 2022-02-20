<template>
    <div class="card mt-4">
        <div class="card-header">Top-up History</div>
        <div class="row">
            <div class="col-8 offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Transaction</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="top in tops">
                            <th scope="row">{{ top.id }}</th>
                            <td>
                                {{ top.amount }} <sub>{{ top.code }}</sub>
                            </td>
                            <td>{{ top.mode }}</td>
                            <td>{{ top.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            tops: [],
        };
    },
    mounted() {
        this.loadTops();
    },
    methods: {
        loadTops: function () {
            axios
                .get("/api/tops")
                .then((response) => {
                    //if (response.data.status === "success") {
                    this.tops = response.data.data;
                    // }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
