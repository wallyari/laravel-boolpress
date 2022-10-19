<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Boolpress</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li v-for="(item,index) in menuItems" class="nav-item active" :key="index">
                        <a class="nav-link" :href="item.link">{{item.name}}</a>
                    </li>                   
                </ul>
            </div>
        </nav>
        
    </header>
</template>

<script>
    export default {
        name: 'MyHeader',
        data(){
            return{
                menuItems: [
                        {
                        name: 'Home',
                        link: '#'
                        },
                        {
                        name: 'Blog',
                        link: '#'
                        },
                        {
                        name: 'Contact',
                        link: '#'
                        },
                        {
                        name: 'About Us',
                        link: '#'
                        },
                    ],
            }
        }
    }
</script>

<style>
</style>