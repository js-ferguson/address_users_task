<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">IvvyTask</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="#"
                            >Home</a
                        > -->
                        <router-link
                            class="nav-link active"
                            aria-current="home"
                            :to="{ name: 'Home' }"
                            >Home</router-link
                        >
                    </li>
                    <li class="nav-item" v-if="!loggedIn">
                        <router-link class="nav-link" :to="{ name: 'Signup' }"
                            >Signup!</router-link
                        >
                    </li>
                    <li class="nav-item" v-if="loggedIn">
                        <!-- <router-link class="nav-link" :to="{name:'Signup'}">Signup!</router-link> -->
                        <a
                            class="nav-link"
                            @click="logout"
                            aria-current="page"
                            href="#"
                            >Logout</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script lang="ts">
import axios from "axios";
import { defineComponent } from "vue";
export default defineComponent({
    data() {
        return {
            loggedIn: false,
        };
    },

    mounted() {
        this.emitter.on("update-authenticated", () => {
            this.updateLoggedIn();
        });

        localStorage.getItem("authenticated")
            ? (this.loggedIn = true)
            : (this.loggedIn = false);
    },

    methods: {
        logout() {
            axios
                .post("/api/logout")
                .then((response) => {
                    localStorage.removeItem('authenticated')
                    this.$router.push({ name: "Home" });
                    this.emitter.emit("update-authenticated");
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        updateLoggedIn() {
            localStorage.authenticated === "true"
                ? (this.loggedIn = true)
                : (this.loggedIn = false);
        },
    },
});
</script>
