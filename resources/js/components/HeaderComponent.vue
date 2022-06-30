<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <!-- <a class="navbar-brand" href="#">BoolPress</a> -->
            <router-link :to="{ name: menuItem[0].routeName }"> </router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <div v-for="(item, index) in menuItem" :key="index">
                        <router-link
                            :to="{ name: item.routeName }"
                            class="nav-link"
                        >
                            {{ item.label }}
                        </router-link>
                    </div>
                </div>
            </div>
            <div>
                <a class="text-dark" href="/admin">Area Riservata</a>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menuItem: [
                {
                    label: "Home",
                    routeName: "home",
                },
                {
                    label: "Posts",
                    routeName: "posts",
                },
                {
                    label: "Chi Siamo",
                    routeName: "about",
                },
                {
                    label: "Contact",
                    routeName: "contact",
                }
            ],
        };
    },
};
</script>

<style lang="scss" scoped></style>
