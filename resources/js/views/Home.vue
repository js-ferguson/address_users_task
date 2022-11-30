<script setup lang="ts">
import AuthPanel from '../components/AuthPanel.vue'

defineProps<{
  routeName;
}>();

</script>

<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
    data() {
        return {
            title: "title"
        }
    },

    methods: {

    }
});
</script>

<template>
    <auth-panel :routeName="routeName"/>
</template>