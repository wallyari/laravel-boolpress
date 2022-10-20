<template>
<div>
    <article v-if="post">
        <div class="card mb-3">
            <img class="img-fluid" :src="post.cover" :alt="post.title">
                <div class="card-body">
                <span class="badge badge-danger mb-2 mr-2 p-1 " v-for="tag in post.tags" :key="tag.id">{{tag.name}}</span>
                <h5 class="card-title">Title: {{post.title}}</h5>
                <p class="card-text">Content: {{post.content}}</p>
                <p class="card-text"><small class="text-muted">Category: {{post.category?post.category.name:'No Category'}}</small></p>
                </div>
        </div>
        <router-link class="btn btn-primary" :to="{name:'blog'}">Back to the List</router-link>
    </article>
    <div class="d-flex justify-content-center" v-else>
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null,
        }
    },
    methods: {
        getSinglePost() {
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
            .then((response) => {
                this.post = response.data.results;
            })
            .catch((error) => {
                this.$router.push({name: 'not-found'});
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