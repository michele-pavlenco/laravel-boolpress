<template>

<main>
  <router-view>

  </router-view>
</main>
</template>

<script>
import Axios from 'axios'

export default {
  name: 'MainComponent',
  data(){
    return{
      posts: [],
    }
  },
  methods:{

  //   getDetail(slug, index){
  //     Axios.get('api/posts/'+slug).then((response)=>{
  //     console.log(response.data);
  //     this.posts[index].detail = response.data;
  //   })
  //   }
  // },
  // created(){
  //   Axios.get('api/posts').then((response)=>{
  //     console.log(response);
  //     this.posts = response.data;
  //   })

  }
}
</script>

<style lang="scss" scoped>



</style>