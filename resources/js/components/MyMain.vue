<template>
    <div class="container">
        <h2 class=mb-5>Posts List</h2>
        <div class="row">
            <div class="card col-12 mb-3" v-for="(post,index) in posts" :key="index">
                <img src="#" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <p class="card-text">{{post.category?post.category.name:'-'}}</p>
                    <p class="card-text">{{post.tag?post.tag.name:'-'}}</p>
                    <a href="#" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    name: 'MyMain',
    data(){
        return {
        posts: []
            }
    },
    methods:{
        getPosts(){
            axios.get('/api/posts')
            .then((response) => {
                this.posts =response.data.results;
                console.log(response.data.results);
            });
        }
    },
    mounted(){
        this.getPosts();
    }

}
</script>

<style>

</style>