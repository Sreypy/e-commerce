<template>
  <RouterLink :to="`/category/${title}`" class="category-link">
    <div class="category" :style="{ backgroundColor: color }">
      <img :src="image" alt="Category image" />
      <h3>{{ title }}</h3>
      <p>{{ subtitle }}</p>
    </div>
  </RouterLink>
  
</template>

<script setup>
defineProps({
  title: String,
  subtitle: String,
  image: String,
  color: String
});
</script>

<style scoped>
.category-link {
  text-decoration: none;
}
.category {
  padding: 16px;
  border-radius: 12px;
  color: #253D4E;
  text-align: center;
  width: 100px;
  cursor: pointer;
  transition: 0.2s;
}
.category:hover {
  transform: scale(1.05);
}
.category img {
  width: 100%;
  height: 70px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 0px;
}
</style>
