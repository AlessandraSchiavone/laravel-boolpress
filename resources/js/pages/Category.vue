<template>
    <section class="my-5" v-if="!loading && JSON.stringify(category) != '{}' ">
       <h1>Post appartenenti alla categoria: {{ category.name }}</h1>
       <ul v-if="category.posts.length > 0">
           <li
           v-for="post in category.posts"
            :key="`post-${post.id}`">
                <router-link :to="{name: 'single-post' , params:{ slug: post.slug }} ">{{ post.title }}</router-link>   
            </li>
       </ul>
       <h3 v-else class="text-danger"> nessun post associato
       </h3>
    </section>
    <NotFound v-else-if="JSON.stringify(category) == '{}' && !loading "/>
    <Loader v-else/> 
</template>

<script>
import Loader from '../components/Loader';
import NotFound from './NotFound';
export default {
name:'Category',
    components:{
         Loader,
         NotFound 
     },
    data:function(){
        return {
            category:null,
            loading:true
        }
    },
    created:function(){
        this.getCategory(this.$route.params.slug);
    },
    methods:{
        getCategory:function(slug){
            axios
                .get(`http://127.0.0.1:8000/api/categories/${slug}`)
                .then(
                    res => {
                        this.category= res.data;
                        this.loading= false;
                    }
                )
                .catch(
                    err => {
                        console.log(err);
                    }
                );
        }
    }
}
</script>

<style lang="scss" scoped>
    ul{
        margin-top:20px;
        margin-left:30px;
    }
</style>