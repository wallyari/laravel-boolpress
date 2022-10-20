<template>
<div class="card col-12 mb-3">
                <img :src="post.cover" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Title: {{post.title}}</h5>
                    <p class="card-text">Content: {{truncateText(post.content, 50)}}</p>
                    <p class="card-text">Category: {{post.category?post.category.name:'No Category'}}</p>
                    <router-link :to="{name:'single-post',params:{slug:post.slug}}" class="btn btn-danger">Read more</router-link>
                </div>
            </div>
</template>


<script>
export default {
    name: 'MyPost',
    props:['post'],
    methods:{
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
        }
}
</script>

<style>

</style>