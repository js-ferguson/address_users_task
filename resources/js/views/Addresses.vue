<script setup lang="ts">
import AuthPanel from "../components/AuthPanel.vue";

defineProps<{
    routeName;
}>();
</script>

<template>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-sm-6" id="signin-panel">Add address</div>
            <div class="col-sm-3" id="backend-view">
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="InputLine1" class="form-label"
                            >Address Line 1:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputLine1"
                            aria-describedby="nameHelp"
                            v-model="address.line1"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputLine2" class="form-label"
                            >Address Line 2:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputLine2"
                            aria-describedby="emailHelp"
                            v-model="address.line2"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputLine3" class="form-label"
                            >Address Line 3:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputLine3"
                            v-model="address.line3"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputLine4" class="form-label"
                            >Address Line 4:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputLine4"
                            v-model="address.line4"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputCity" class="form-label">City:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="InputCity"
                            v-model="address.city"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputPostalCode" class="form-label"
                            >Postal Code:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputPostalCode"
                            v-model="address.postalCode"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputCountryCode" class="form-label"
                            >Country Code:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputCountryCode"
                            v-model="address.countryCode"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputStateCode" class="form-label"
                            >State Code:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputStateCode"
                            v-model="address.stateCode"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputStateName" class="form-label"
                            >State Name:</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="InputStateName"
                            v-model="address.stateName"
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
import { defineComponent } from "vue";
import axios from "axios";
export default defineComponent({
    data() {
        return {
            title: "Manage your addresses",
            user: {},
            name: "",
            address: {
                line1: "",
                line2: "",
                line3: "",
                line4: "",
                city: "",
                postalCode: "",
                countryCode: "",
                stateCode: "",
                stateName: "",
            },
        };
    },

    mounted() {
        axios
            .get("/api/user")
            .then((response) => {
                this.user = response.data;
            })
            .catch((error) => {
                if (error.response.status === 401) {
                    this.emitter.emit("update-authenticated");
                    localStorage.removeItem("authenticated");
                    this.$router.push({ name: "Home" });
                }
            });
    },

    methods: {
        submit() {
            this.address.user_id = this.user.id
            axios
                .post("/api/addresses/create", this.address)
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
});
</script>

<style>
#backend-view {
    height: 80vh;
    background-color: #f3f4f6;
    display: grid;
    align-items: center;
    margin-top: 50px;
    border-top: 1px solid lightgrey;
    border-right: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}
#signin-panel {
    height: 80vh;
    background-color: #fff;
    display: grid;
    align-items: center;
    justify-content: right;
    margin-top: 50px;
    padding-right: 20px;
    font-size: 40px;
    border-top: 1px solid lightgrey;
    border-left: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}
</style>
