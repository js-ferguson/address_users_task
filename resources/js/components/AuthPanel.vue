<script setup lang="ts">
import axios from "axios";
import { stringify } from "json5";

defineProps<{
    routeName;
}>();

const emit = defineEmits(['updateAuthenticated'])

</script>

<template>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-sm-6" id="signin-panel">
                {{ routeName === "home" ? "Login" : "Signup!" }}
            </div>
            <div class="col-sm-3" id="backend-view">
                <form @submit.prevent="submit">
                    <div class="mb-3" v-if="routeName === 'signup'">
                        <label for="InputName" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="InputName"
                            aria-describedby="nameHelp"
                            v-model="form.name"
                        />
                        <span v-if="errors.name" class="text-danger">{{
                            errors.name[0]
                        }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label"
                            >Email address</label
                        >
                        <input
                            type="email"
                            class="form-control"
                            id="InputEmail"
                            aria-describedby="emailHelp"
                            v-model="form.email"
                        />
                        <span v-if="errors.email" class="text-danger">{{
                            errors.email[0]
                        }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label"
                            >Password</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="InputPassword"
                            v-model="form.password"
                        />
                        <span v-if="errors.password" class="text-danger">{{
                            errors.password[0]
                        }}</span>
                    </div>
                    <div class="mb-3" v-if="routeName === 'signup'">
                        <label
                            for="InputPasswordConfirmation"
                            class="form-label"
                            >Confirm Password</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="InputPasswordConfirmation"
                            v-model="form.password_confirmation"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, DefineComponent } from "vue";
export default defineComponent({
    data() {
        return {
            form: {
                email: "",
                password: "",
                password_confirmation: "",
                name: "",
            },
            errors: {},
        };
    },

    methods: {
        submit() {
            this.routeName === "signup" ? this.register() : this.login();
        },

        register() {
            axios
                .post("/api/register", this.form)
                .then(() => {
                    this.$router.push({ name: "Addresses" });
                    localStorage.setItem("authenticated", "true");
                    this.emitter.emit("update-authenticated");
                })
                .catch((error: any) => {
                    this.errors = error.response.data.errors;
                });
        },

        login() {
            axios
                .post("/api/login", {
                    email: this.form.email,
                    password: this.form.password,
                })
                .then(() => {
                    this.$router.push({ name: "Addresses" });
                    localStorage.setItem("authenticated", "true");
                    this.emitter.emit("update-authenticated");
                    
                })
                .catch((error: any) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
});
</script>

<style scoped>
/* .container {
 padding-right: 0;
 margin-right: 0;
} */

#signin-panel {
    height: 50vh;
    background-color: #fff;
    display: grid;
    align-items: center;
    justify-content: right;
    margin-top: 200px;
    padding-right: 20px;
    font-size: 40px;
    border-top: 1px solid lightgrey;
    border-left: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}

#backend-view {
    height: 50vh;
    background-color: #f3f4f6;
    display: grid;
    align-items: center;
    margin-top: 200px;
    border-top: 1px solid lightgrey;
    border-right: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}
</style>
