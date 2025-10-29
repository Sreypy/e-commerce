<!-- <template>
  <div id="app">
    This is my first VueJs project
  </div>

</template>

<script setup lang="ts">
// No imports — we removed HelloWorld and RouterView
</script>

<style scoped>
#app {
  font-family: Arial, sans-serif;
  text-align: center;
  margin-top: 100px;
  font-size: 24px;
}
</style> -->



<template>
  <div id="app">
    <!-- <h1>Dynamic Components Example</h1> -->
     <h1>
      
     </h1>

    <section class="categories">
      <Category
        title="Cake&Milk"
        subtitle="14 items"
        image="/images/cake&milk.png"
        color="#F2FCE4"
      />
      <Category
        title="Peach"
        subtitle="12 items"
        image="/images/peach.png"
        color="#FFFCEB"
      />
      <Category
        title="Oganic Kiwi"
        subtitle="21 items"
        image="/images/oganicKiwi.png"
        color="#ECFFEC"
      />
      <Category
      title="Red Apple"
      subtitle="68 items"
      image="/images/redApple.png"
      color="#FEEFEA"
      />

      <Category
      title="Snack"
      subtitle="34 items"
      image="/images/snack.png"
      color="#FFF3EB"
      />

      <Category
      title="Black plum"
      subtitle="25 items"
      image="/images/blackPlum.png"
      color="#FFF3FF"
      />

      <Category
      title="Vegetables"
      subtitle="65 items"
      image="/images/vegetable.png"
      color="#F2FCE4"
      />

      <Category
      title="Headphone"
      subtitle="33 items"
      image="/images/headphone.png"
      color="#FFFCEB"
      />

      <Category
      title="Cake&Milk"
      subtitle="54 items"
      image="/images/Cake_milk.png"
      color="#F2FCE4"
      />

      <Category
      title="Orange"
      subtitle="63 items"
      image="/images/orange.png"
      color="#FFF3FF"
      />
    </section>

    <section class="promotions">
      <Promotion
        title="Everyday Fresh Clean with Our Products"
        image="/images/promotion1.png" 
        bgColor="#F0E8D5"
        buttonText="Shop Now"
        buttonColor="#3BB77E"
      />

      <Promotion
        title="Make your Breakfast Healthy and Easy"
        image="/images/promotion2.png"
        bgColor="#F3E8E8"
        buttonText="Shop Now"
        buttonColor="#3BB77E"
      />

      <Promotion  
        title="The best Organic Products Online"
        image="/images/promotion3.png"
        bgColor="#E7EAF3"
        buttonText="Shop now"
        buttonColor="#FDC040"
      />
    </section>

  </div>
</template>

<script setup>
import Category from './components/Category.vue'
import Promotion from './components/Promotion.vue'
</script>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  padding: 20px;
}
.categories {
  display: flex;
  gap: 15px;
  margin-bottom: 40px;
  justify-content: center;
  height: 220px;
}
.promotions {
  display: flex;
  flex-direction: row;
  gap: 15px;
  /* justify-content: center; */
}
h1 {
  text-align: center;
  margin-bottom: 20px;
}

</style>
