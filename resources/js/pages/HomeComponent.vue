<template>
    <section class="">
        <div class="container h-100 pt-5">
            <div class="row h-100 justify-content-center">
                <div class="col-3 text-white">
                    <h4>Categorie</h4>
                    <ul>
                        <li
                            v-for="(category, index) in categories"
                            :key="index"
                        >
                            <router-link
                                :to="{
                                    name: 'category',
                                    params: { slug: category.slug },
                                }"
                                >{{ category.name }}</router-link
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    <div v-if="posts.length > 0">
                        <carousel :per-page="2" :mouse-drag="false">
                            <slide v-for="(post, index) in posts" :key="index">
                                <div class="card mx-auto" style="width: 18rem">
                                    <img
                                        class="img-fluid card-img-top"
                                        :src="`/storage/${post.image}`"

                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">{{post.title}}</h5>
                                        <p class="card-text">
                                           {{post.content}}
                                        </p>
                                        <a href="#" class="btn btn-primary"
                                            >Go somewhere</a
                                        >
                                    </div>
                                </div>
                                <img />
                            </slide>
                        </carousel>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
    name: "HomeComponent",
    components: {
        Carousel,
        Slide,
    },

    data() {
        return {
            categories: [],
            posts: [],
        };
    },
    mounted() {
        axios
            .get("/api/categories/")
            .then((res) => {
                this.categories = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
        axios.get("/api/posts/").then((res) => {
            this.posts = res.data.slice(0, 3);
            console.log(this.posts);
        });
    },
};
</script>

<style lang="scss" scoped>
section {
    background-image: url("https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg");
    width: 100%;
    height: 100vh;
    background-size: cover;
    h1 {
        filter: drop-shadow(1px 6px 5px black);
    }
}
</style>
