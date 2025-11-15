<template>
  <div class="product-card">
    <img :src="product.image" />
    <h3>{{ product.name }}</h3>
    <p>{{ product.price }} USD</p>
    <p>Rating: {{ product.rating }}</p>
    <p>Size: {{ product.size }}</p>
    <p>Sold: {{ product.countSold }}</p>
  </div>
</template>

<script setup>
defineProps({
  product: Object
});
</script>
