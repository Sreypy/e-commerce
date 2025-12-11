<template>
  <div class="header">

    <!-- BRAND -->
    <div class="brand">
    <img src="/public/icon.png" alt="logo" />
    <div class="brand-text">
        <span class="title">Melon</span>
        <p class="subtitle">Mart & Grocery</p>
    </div>
    </div>


    <!-- CATEGORY + SEARCH -->
    <div class="search-area">

      <select v-model="selectedCategory">
        <option value="">All Categories</option>
        <option 
          v-for="cat in categories" 
          :key="cat.id" 
          :value="cat.id"
        >
          {{ cat.name }}
        </option>
      </select>

      <input 
        type="text" 
        placeholder="Search for items"
        v-model="searchText"
      />

      <button class="search-btn" @click="search">
        <img 
          src="https://cdn.jsdelivr.net/npm/lucide-static/icons/search.svg" 
          alt="Search" 
          width="16" 
          height="16" 
        />
      </button>
    </div>

    <!-- RIGHT MENU -->
    <div class="right-menu">

  <div class="menu-item">
    <img src="https://cdn.jsdelivr.net/npm/lucide-static/icons/user.svg" />
    <span>Account</span>
  </div>

  <div class="menu-item">
    <img src="https://cdn.jsdelivr.net/npm/lucide-static/icons/arrow-left-right.svg" />
    <span>Compare</span>
  </div>


  <div class="menu-item">
    <img src="https://cdn.jsdelivr.net/npm/lucide-static/icons/heart.svg" />
    <span>Wishlist</span>
  </div>

  <div class="menu-item">
    <img src="https://cdn.jsdelivr.net/npm/lucide-static/icons/shopping-cart.svg" />
    <span>Cart</span>
  </div>

  <!-- <div class="mart">Mart & Grocery</div> -->

</div>


  </div>
</template>

<script setup>
import { ref } from "vue";
import { useProductStore } from "@/stores/product";

const store = useProductStore();

const selectedCategory = ref("");
const searchText = ref("");

const categories = store.categories;

function search() {
  store.searchProducts(searchText.value, selectedCategory.value);
}
</script>

<style scoped>
/* MAIN HEADER */
.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 30px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.06);
  margin-bottom: 25px;
}

/* BRAND */
.brand {
  display: flex;
  align-items: center;
  gap: 8px;
}

.brand img {
  width: 45px;
  height: 45px;
}

.brand-text {
  display: flex;
  flex-direction: column;
  line-height: 1.1;
}

.brand-text .title {
  font-size: 36px;
  font-weight: 900;
  color: #46a346;
  margin: 0;
}

.brand-text .subtitle {
  font-size: 14px;
  color: #0c0c0c;
  margin: 0;
  margin-top: -3px;
}


/* SEARCH AREA */
.search-area {
  display: flex;
  align-items: center;
  gap: 10px;
}

.search-area select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.search-area input {
  width: 280px;
  padding: 10px;
  border: 1px solid #ccc;
  outline: none;
  border-radius: 6px;
}

.search-area input:focus {
  border-color: #3ca35c;
}

.search-btn {
  background: #3ca35c;
  border: none;
  color: white;
  padding: 10px 15px;
  border-radius: 6px;
  cursor: pointer;
}

/* RIGHT MENU */
.right-menu {
  display: flex;
  align-items: center;
  gap: 20px;
}

.menu-item {
  display: flex;
  align-items: center;
  gap: 6px;
  cursor: pointer;
  transition: 0.2s;
}

.menu-item img {
  width: 18px;
  height: 18px;
  opacity: 0.8;
}

.menu-item:hover span,
.menu-item:hover img {
  color: #46a346;
  filter: brightness(1.2);
}

.menu-item span {
  font-size: 14px;
  font-weight: 600;
  color: #2a2a2a;
}

/* Mart button */
/* .mart {
  background: #46a346;
  padding: 8px 14px;
  border-radius: 6px;
  color: white;
  font-size: 14px;
  font-weight: 700;
} */


</style>
