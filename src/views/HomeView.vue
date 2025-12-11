<template>
  <div class="home-page">

    <!-- 🔹 NAVIGATION -->
    <SearchBox />
    <MenuItem />

    <!-- 🔹 SHOWCASE BANNER -->
    <ShowCase />

    <!-- 🔹 FEATURED CATEGORIES -->
    <Header title="Featured Categories" />
    <section class="categories">
      <Category
        v-for="cat in store.categories"
        :key="cat.id"
        :title="cat.name"
        :subtitle="`${cat.productCount} items`"
        :image="getImageUrl(cat.image)"
        :color="cat.color"
      />
    </section>

    <!-- 🔹 PROMOTIONS -->
    <section class="promotions">
      <Promotion
        v-for="promo in store.promotions"
        :key="promo.id"
        :title="promo.title"
        :image="getImageUrl(promo.image)"
        :bgColor="promo.color"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>

    <!-- 🔹 POPULAR PRODUCTS -->
    <Header title="Popular Products" />
    <section class="products">
      <ProductCard
        v-for="prod in store.products"
        :key="prod.id"
        :product="prod"
      />
    </section>

  </div>
</template>

<script setup>
import { onMounted } from "vue";
import { useProductStore } from "@/stores/product";

// import SearchBox from "@/components/SearchBox.vue";
// import MenuItem from "@/components/MenuItem.vue";
import ShowCase from "@/components/ShowCase.vue";

import Header from "@/components/Header.vue";
import Category from "@/components/Category.vue";
import Promotion from "@/components/Promotion.vue";
import ProductCard from "@/components/Product.vue";

const store = useProductStore();

const API_BASE_URL = "http://localhost:3000";

function getImageUrl(path) {
  if (!path) return "https://via.placeholder.com/300x200?text=No+Image";

  if (path.startsWith("http")) return path;

  return `${API_BASE_URL}/${path.replace(/\\/g, "/")}`;
}

onMounted(() => {
  store.loadAllData();
});
</script>

<style scoped>
.home-page {
  padding: 20px;
}

.categories {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  margin-bottom: 40px;
}

.promotions {
  display: flex;
  gap: 10px;
  margin: 40px 0;
}

.products {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 25px;
}
</style>
