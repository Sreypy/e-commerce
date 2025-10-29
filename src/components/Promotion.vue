<template>
  <div class="promo" :style="{ backgroundColor: bgColor }">
    <img :src="image" alt="Promotion images" />
    <div class="content">
      <h2>{{ title }}</h2>
      <!-- <p>{{ description }}</p> -->
      <ButtonComponent :text="buttonText" :color="buttonColor" />
    </div>
  </div>
</template>

<script setup>
import ButtonComponent from './ButtonComponent.vue'

defineProps({
  title: String,
  description: String,
  image: String,
  bgColor: String,
  buttonText: String,
  buttonColor: String
});
</script>

<style scoped>
.promo {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  border-radius: 16px;
  color: #253D4E;
  gap: 20px;
  width: 750px;
  height: 250px;
}
.promo img {
  width: 250px;
  height: 270px;
  object-fit: none;
  object-position: right;
  border-radius: 12px;
  
}
.content {
  flex: 1;
}
.content h2 {
  margin: 0;
  font-size: 22px;
}
.content p {
  margin: 8px 0 16px;
  font-size: 16px;
}
</style>
