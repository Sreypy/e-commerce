<template>
  <div id="app">

    <!-- 1. HEADER: Featured Categories -->
    <Header title="Featured Categories"/>

    <!-- 2. CATEGORY SECTION -->
    <section class="categories">
      <Category
        v-for="(cat, index) in productStore.categories"
        :key="index"
        :title="cat.name"
        :subtitle="`${cat.productCount} items`"
        :image="getImageUrl(cat.image)"
        :color="cat.color"
      />
    </section>

    <!-- 3. PROMOTION SECTION -->
    <section class="promotions">
      <Promotion
        v-for="(promo, index) in productStore.promotions"
        :key="index"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :bgColor="promo.color"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>

    <!-- 4. HEADER: Popular Products -->
    <Header title="Popular Products"/>

    <!-- 5. GROUPS SECTION -->
    <section class="groups">
      <div
        class="group-card"
        v-for="grp in productStore.groups"
        :key="grp.id"
      >
        <h3>{{ grp.name }}</h3>
      </div>
    </section>

    <!-- 6. PRODUCT GRID (uses ProductCard.vue) -->
    <section class="products">
      <ProductCard
        v-for="prod in productStore.products"
        :key="prod.id"
        :product="prod"
      />
    </section>

  </div>
</template>

<script setup lang="ts">
import Header from './components/Header.vue'
import Category from './components/Category.vue'
import Promotion from './components/Promotion.vue'
import ProductCard from './components/Product.vue'

import { onMounted } from 'vue'
import { useProductStore } from "@/stores/product"

const productStore = useProductStore()

const API_BASE_URL = 'http://localhost:3000'

const getImageUrl = (imagePath: string | undefined) => {
  if (!imagePath) {
    return 'https://via.placeholder.com/300x200?text=No+Image'
  }
  if (imagePath.startsWith('http')) {
    return imagePath
  }
  return `${API_BASE_URL}${imagePath.startsWith('/') ? '' : '/'}${imagePath}`
}

onMounted(async () => {
  await productStore.loadAllData()
})
</script>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  padding: 20px;
}

.categories {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 40px;
  justify-content: center;
}

.promotions {
  display: flex;
  flex-direction: row;
  gap: 5px;
  margin-bottom: 40px;
}

.groups {
  display: flex;
  gap: 15px;
  margin: 0px 5px;
}

.products {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 25px;
  margin-top: 10px;
}
</style>
