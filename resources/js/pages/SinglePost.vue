<template>
<section class="my-5" v-if="!loading && JSON.stringify(post) != '{}' ">
    <h1>{{ post.title }}</h1>
    <div class="post-info my-3">
        <div  vlass="h4" v-if="post.category"> 
            <router-link :to="{ name :'category', params:{ slug: post.category.slug }}" class=" badge badge-primary">
              {{ post.category.name }} </router-link>
        </div>
        <div class="h5" v-if="post.tags.length > 0 ">
          <span 
                v-for="tag in post.tags"
                :key="`tag-${tag.id}`"
                class="badge badge-pills badge-info mr-2">
                {{ tag.name }}
            </span>  
        </div>
    </div>
    <img class="img-fluid" :src="post.cover" :alt="post.title">
    <p class="my-4">{{ post.content }}</p>
    <router-link :to="{ name: 'blog' }" class="btn btn-primary">Torna al blog</router-link>   
</section>
<NotFound v-else-if="JSON.stringify(post) == '{}' && !loading "/>
<Loader v-else/> 
</template>

<script>
import Loader from '../components/Loader.vue';
import NotFound from './NotFound';
export default {
    name:'SinglePost',
     components:{
        Loader,
        NotFound 
    },
    data:function(){
        return {
            post: null,
            loading:true
        }
    },
    created:function(){
        this.getPost(this.$route.params.slug);
    },
    methods:{
        getPost:function(slug){
            axios
                .get(`http://127.0.0.1:8000/api/posts/${slug}`)
                .then(
                    res => {
                        this.post= res.data;
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

<style>

</style>