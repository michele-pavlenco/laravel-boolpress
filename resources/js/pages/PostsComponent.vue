<template>
    <section v-if="posts.length > 0">
        <h1 class="text-white text-center pt-5">Tutti i posts</h1>
        <div class="container">
            <div class="row justify-content-between pt-5 pb-5">
                <div
                    v-for="(post, index) in posts"
                    :key="post.id"
                    class="card"
                    style="width: 18rem"
                >
              
                    <img
                        :src="`/storage/${post.image}`!= '/storage/null' ? `/storage/${post.image}` : 'https://picsum.photos/500/250?random='+index"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ index }} - {{ post.title }}
                        </h5>
                        <p class="card-text">
                            {{ post.content }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Category: {{ post.category.name }}
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush" v-if="post.tags">
                        <li
                            class="list-group-item"
                            v-for="tag in post.tags"
                            :key="tag.id"
                        >
                           Tag: {{ tag.name }}
                        </li>
                    </ul>
                    <div class="card-body">
                        <router-link
                            :to="{
                                name: 'single-post',
                                params: { slug: post.slug },
                            }"
                        >
                            Visualizza Post
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "PostsComponent",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        axios.get("/api/posts").then((response) => {
            this.posts = response.data;
            console.log(this.posts);
        });
    },
};
</script>

<style lang="scss" scoped>
section {
    background-image: url("https://img.wallpapersafari.com/desktop/1920/1080/45/34/Ms4ELT.jpg");
    width: 100%;
    height: 100%;
    background-size: cover;
    h1 {
        filter: drop-shadow(1px 6px 5px black);
    }
    .row {
        row-gap: 50px;
    }
}
</style>
