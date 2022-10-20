<template>
    <h1>Single Post Page</h1>
</template>

<script>
export default {
    name: 'SinglePost',
    methods: {
        getSinglePost() {
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {
                console.log(response);
            });
        }
    },
    mounted() {
        this.getSinglePost();
    }
}
</script>

<style>
</style>