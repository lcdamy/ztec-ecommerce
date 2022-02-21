<template>
    <div></div>
</template>
<script>
export default {
    mounted() {
        this.removeToken();
    },
    methods: {
        removeToken() {
            console.log("clear token");
            localStorage.clear();
        },
    },
};
</script>
