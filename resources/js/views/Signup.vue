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



