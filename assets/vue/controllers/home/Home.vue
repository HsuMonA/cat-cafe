<template>
  <div>Hello {{ name }}!</div>
  <button type="button" class="btn btn-primary">Primary Button</button>
</template>

<script setup>
defineProps({
  name: String,
});
</script>
