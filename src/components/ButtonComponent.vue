<template>
  <button class="btn" :style="{ backgroundColor: color }">
    {{ text }}
  </button>
</template>

<script setup>
defineProps({
  text: String,
  color: String
});
</script>

<style scoped>
.btn {
  border: none;
  color: white;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  font-size: 16px;
  margin-top: 20px;
}
.btn:hover {
  opacity: 0.9;
}
</style>
