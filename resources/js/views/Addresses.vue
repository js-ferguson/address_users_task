<script setup lang="ts">
import AuthPanel from "../components/AuthPanel.vue";

defineProps<{
    routeName;
}>();
</script>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";
export default defineComponent({
    data() {
        return {
            title: "Manage your addresses",
            user: {},
            name: "",
        };
    },

    mounted() {
        axios
            .get("/api/user")
            .then((response) => {
                this.user = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    methods: {},
});
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h2>{{ title }}, {{user.name}}</h2>
            </div>
        </div>
    </div>
</template>