<template>
    <div class="card-body">
        <form method="POST" @submit.prevent="submit">
            <div class="form-group row">
                <label
                    for="amount"
                    class="col-md-4 col-form-label text-md-right"
                    >Amount to Top-up</label
                >

                <div class="col-md-6">
                    <input
                        id="amount"
                        type="text"
                        class="form-control"
                        name="amount"
                        value=""
                        autocomplete="amount"
                        autofocus
                        v-model="fields.amount"
                    />
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.amount"
                    >
                        {{ errors.amount }}
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save Balance
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            fields: { amount: "" },
            errors: {},
        };
    },
    mounted() {},
    methods: {
        submit() {
            axios
                .post("/api/top/balance", this.fields)
                .then((response) => {
                    this.errors = {};
                    if (response.data.status === "success") {
                        window.location.href = "/top";
                    }
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log(error);
                });
        },
    },
};
</script>
