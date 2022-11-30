<script setup lang="ts">
import AuthPanel from '../components/AuthPanel.vue'

defineProps<{
  routeName;
}>();

</script>

<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({});
</script>

<template>
    <auth-panel :routeName="routeName"/>
</template>

<style>
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
