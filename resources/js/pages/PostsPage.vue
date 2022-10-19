<template>
    <div class="container">
        <h1 class="mb-3">Posts List</h1>
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else class="row">
                <MyPost v-for="(post, index) in posts" :key="index" :post="post" />
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="(currentPage==1?'disabled':'')"><a class="page-link" href="#" @click="getPosts(currentPage - 1)">Prev</a></li>
                <li class="page-item disabled"><a class="page-link">
                    <span> {{currentPage}}/{{lastPage}}</span></a></li>
                <li class="page-item" :class="(currentPage==lastPage?'disabled':'')"><a class="page-link" href="#" @click="getPosts(currentPage + 1)">Next</a></li>
            </ul>
        </nav>

    </div>
</template>

<script>
    import MyPost from '../components/MyPost.vue'
    export default {
        name: 'PostsPage',
        components: {
            MyPost

            },
        data() {
            return {
                posts: [ ],
                currentPage: 1,
                lastPage: null, //inizializzazione prima della chiamata 
                loading: true
            }
        },
        methods: {
            
            getPosts(page) {
                this.loading = true;

                axios.get('/api/posts',{
                    params:{
                        page:page
                    }
                })
                .then((response) => {
                    this.posts = response.data.results.data;
                    this.loading = false;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;

                });
            }
            
    },        
        mounted() {
            this.getPosts(1);
        }
    }
</script>

<style>
</style>