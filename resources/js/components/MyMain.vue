<template>
    <div class="container">
        <h1 class="mb-3">Posts List</h1>
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else class="row">
            <div class="card col-12 mb-3" v-for="(post, index) in posts" :key="index">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{truncateText(post.content, 50)}}</p>
                    <p class="card-text">{{post.category?post.category.name:'-'}}</p>
                    <a href="#" class="btn btn-danger">Read more</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'MyMain',
        data() {
            return {
                posts: [ ],
                currentPage: 1,
                lastPage: null, //inizializzazione prima della chiamata 
                loading: true
            }
        },
        methods: {
            
            getPosts() {
                this.loading = true;

                axios.get('/api/posts')
                .then((response) => {
                    this.posts = response.data.results.data;
                    this.loading = false;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;

                });
            },
            
            truncateText(text, maxLength) {
                     if(text){
                if (text.length < maxLength) {
                    return text;
                } else {
                    return text.substring(0, maxLength) + '...';
                }
            }
    else{
        return '';
    }
}
},
        
        mounted() {
            this.getPosts();
        }
    }
</script>

<style>
</style>