<script setup lang="ts">
import AuthPanel from "../components/AuthPanel.vue";

defineProps<{
    routeName;
}>();
</script>

<template>
    <div class="container">
        <div class="row">
          
            <div v-if="addresses.length === 0" class="col-sm-8 signin-panel">
                <h4>You have no addresses</h4>
            </div>
            <div v-else class="col-sm-8 signin-panel">
                <div v-for="address in addresses" class="address-box" @click='editAddress(address)'>
                    <span>{{ address.line1 }}</span
                    ><span v-if="address.line2">{{ `, ${address.line2}` }}</span
                    ><span v-if="address.line3">{{ `, ${address.line3}` }}</span
                    ><span v-if="address.line4">{{
                        `, ${address.line4}`
                    }}</span>
                    <div>
                        {{ address.city }}, {{ address.stateCode }},
                        {{ !address.stateCode ? `${address.stateName},` : "" }}
                        {{ address.countryCode }}
                    </div>
                </div>
            </div>
            <div class="col-sm-4" id="backend-view">
                <div class="mt-5"><h4>{{ edit ? "Edit address" : "Add new address" }}</h4></div>
                <form @submit.prevent="submit(edit)">
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
                        {{ edit ? 'Save Changes' : 'Submit' }}
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
            addresses: [],
            edit: false,
        };
    },

    mounted() {
        axios
            .get("/api/user")
            .then((response) => {
                this.user = response.data;
                this.address.user_id = this.user.id;
                this.fetch();
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
        submit(edit) {
            if (!edit) {
               axios
                .post("/api/addresses/create", this.address)
                .then((response) => {
                    console.log(response);
                    this.fetch();
                })
                .catch((error) => {
                    console.log(error);
                }); 
            } else {
                console.log(edit)
                axios
                .post("/api/addresses/update", this.address)
                .then((response) => {
                    console.log(response);
                    this.edit = false;
                    this.address = {}
                    this.fetch();
                })
                .catch((error) => {
                    console.log(error);
                }); 
            }
            
        },

        fetch() {
            axios
                .get("/api/addresses/" + this.user.id)
                .then((response) => {
                    console.log(response);
                    this.addresses = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        editAddress(address) {
            console.log(address)
            this.edit = true
            this.address = address
        },

        update(id) {

        }

    },
});
</script>

<style scoped>
#backend-view {
    height: 80vh;
    background-color: #f3f4f6;
    /* display: grid; */
    /* align-items: center; */
    margin-top: 50px;
    border-top: 1px solid lightgrey;
    border-right: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}
.signin-panel {
    margin-top: 50px;
    padding: 25px;
    border-top: 1px solid lightgrey;
    border-left: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
}

.address-box {
    border: 1px solid lightgrey;
    border-radius: 7px;
    padding: 10px;
    font-size: 20px;
    width: 100%;
    margin-bottom: 10px;
}
</style>
