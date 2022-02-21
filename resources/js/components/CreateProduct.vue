<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Add Product</div>
                        <div>
                            <a href="/dashboard">
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-in-left"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Name
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value=""
                                        autocomplete="name"
                                        autofocus
                                        v-model="fields.name"
                                    />
                                    <div
                                        class="alert alert-danger"
                                        v-if="errors && errors.name"
                                    >
                                        {{ errors.name }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="price"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Price</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="price"
                                        type="price"
                                        class="form-control"
                                        name="price"
                                        value=""
                                        autocomplete="price"
                                        v-model="fields.price"
                                    />
                                    <div
                                        class="alert alert-danger"
                                        v-if="errors && errors.price"
                                    >
                                        {{ errors.price }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="quantity"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Quantity</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="quantity"
                                        type="number"
                                        class="form-control"
                                        name="quantity"
                                        value=""
                                        autocomplete="quantity"
                                        v-model="fields.quantity"
                                    />
                                    <div
                                        class="alert alert-danger"
                                        v-if="errors && errors.price"
                                    >
                                        {{ errors.quantity }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="description"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Product Details</label
                                >

                                <div class="col-md-6">
                                    <textarea
                                        id="description"
                                        type="description"
                                        class="form-control"
                                        name="description"
                                        autocomplete="new-description"
                                        cols="30"
                                        rows="5"
                                        v-model="fields.description"
                                    >
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="description-confirm"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Image</label
                                >
                                <div class="col-md-6">
                                    <input
                                        id="image"
                                        type="file"
                                        class="form-control-file"
                                        name="image"
                                        v-on:change="onFileChange"
                                    />
                                    <div
                                        class="alert alert-danger"
                                        v-if="errors && errors.image"
                                    >
                                        {{ errors.image }}
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success" v-if="loading">
                                Please wait
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Save Product
                                    </button>
                                </div>
                            </div>
                        </form>
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
            fields: { name: "", price: "", quantity: "", description: "" },
            image: null,
            errors: {},
            loading: false,
        };
    },
    mounted() {},
    methods: {
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.image = files[0];
        },
        submit() {
            this.loading = true;
            let formData = new FormData();
            formData.append("name", this.fields.name);
            formData.append("price", this.fields.price);
            formData.append("quantity", this.fields.quantity);
            formData.append("description", this.fields.description);
            formData.append("image", this.image);
            const token = localStorage.getItem("token");
            let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                    Authorization: "Bearer " + token,
                },
            };
            axios
                .post("/api/product", formData, config)
                .then((response) => {
                    this.errors = {};
                    if (response.data.status === "success") {
                        window.location.href = "/dashboard/products";
                    }
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log(error);
                    this.loading = false;
                });
        },
    },
};
</script>
