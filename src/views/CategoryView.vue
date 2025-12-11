<template>
  <div class="card">
    <!-- Background image -->
    <div class="card-bg"></div>

    <!-- Overlay content -->
    <div class="card-content">
      <h2 class="card-title">Coke & Milk</h2>
      <p class="card-subtitle">Home > Category > Coke & Milk</p>
    </div>
  </div>
</template>


<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
console.log(route.query.type); // "hot-deals"

// No script needed for static card
</script>

<style scoped>
.card {
  position: relative;
  width: 100%;
  height: 180px;
  border-radius: 12px;
  overflow: hidden;
  background-color: #87ce8a; /* green base */
  display: flex;
  align-items: flex-end;
  justify-content: left;
}

/* Background image layer */
.card-bg {
  position: absolute;
  inset: 0;
  background-image: url("/12Asset 1@4022244422x 1.png");
  background-size: cover;
  background-position: center;
  opacity: 0.9; /* allows green to show through */
}

/* Text overlay */
.card-content {
  position: relative;
  color: white;
  text-align: center;
  padding-left: 30px;
  margin-bottom: 45px;
}

.card-title {
  font-size: 1.5rem;
  font-weight: bold;
}

.card-subtitle {
  font-size: 1rem;
  opacity: 0.9;
}
</style>