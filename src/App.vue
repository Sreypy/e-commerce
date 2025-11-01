
<template>
  <div id="app">

    <!-- Category Section -->
    <section class="categories">
      <Category
        v-for="(cat, index) in categories"
        :key="index"
        :title="cat.title"
        :subtitle="cat.subtitle"
        :image="cat.image"
        :color="cat.color"
      />
    </section>

    <!-- Promotion Section -->
    <section class="promotions">
      <Promotion
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :bgColor="promo.bgColor"
        :buttonText="promo.buttonText"
        :buttonColor="promo.buttonColor"
      />
    </section>
  </div>
</template>

<script setup>
import Category from './components/Category.vue'
import Promotion from './components/Promotion.vue'

// ✅ Local variables (arrays) that represent components
const categories = [
  { title: "Cake & Milk", subtitle: "14 items", image: "/images/cake&milk.png", color: "#F2FCE4" },
  { title: "Peach", subtitle: "12 items", image: "/images/peach.png", color: "#FFFCEB" },
  { title: "Organic Kiwi", subtitle: "21 items", image: "/images/oganicKiwi.png", color: "#ECFFEC" },
  { title: "Red Apple", subtitle: "68 items", image: "/images/redApple.png", color: "#FEEFEA" },
  { title: "Snack", subtitle: "34 items", image: "/images/snack.png", color: "#FFF3EB" },
  { title: "Black Plum", subtitle: "25 items", image: "/images/blackPlum.png", color: "#FFF3FF" },
  { title: "Vegetables", subtitle: "65 items", image: "/images/vegetable.png", color: "#F2FCE4" },
  { title: "Headphone", subtitle: "33 items", image: "/images/headphone.png", color: "#FFFCEB" },
  { title: "Cake & Milk", subtitle: "54 items", image: "/images/Cake_milk.png", color: "#F2FCE4" },
  { title: "Orange", subtitle: "63 items", image: "/images/orange.png", color: "#FFF3FF" }
]

const promotions = [
  { 
    title: "Everyday Fresh Clean with Our Products", 
    image: "/images/promotion1.png", 
    bgColor: "#F0E8D5", 
    buttonText: "Shop Now", 
    buttonColor: "#3BB77E" 
  },
  { 
    title: "Make your Breakfast Healthy and Easy", 
    image: "/images/promotion2.png", 
    bgColor: "#F3E8E8", 
    buttonText: "Shop Now", 
    buttonColor: "#3BB77E" 
  },
  { 
    title: "The best Organic Products Online", 
    image: "/images/promotion3.png", 
    bgColor: "#E7EAF3", 
    buttonText: "Shop now", 
    buttonColor: "#FDC040" 
  }
]
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
  height: auto;
}
.promotions {
  display: flex;
  flex-direction: row;
  gap: 5px;
}
h1 {
  text-align: center;
  margin-bottom: 20px;
}
</style>
