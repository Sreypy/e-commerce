<template>
  <nav class="menu">

    <!-- LEFT SIDE ITEMS -->
    <div class="left-menu">

      <!-- Browse All Categories -->
      <div class="menu-item browse">
        <span class="icon">📂</span>
        Browse All Categories
      </div>

      <!-- Hot Deals -->
      <router-link to="/Category/Cake&Milk" class="menu-item">
        <span class="icon">🔥</span> Hot Deals
      </router-link>

      <!-- Other Menu Items -->
      <router-link to="/" class="menu-item">Home</router-link>
      <router-link to="/food" class="menu-item">Food</router-link>
      <router-link to="/vegetables" class="menu-item">Vegetables</router-link>
      <router-link to="/drinks" class="menu-item">Drinks</router-link>
      <router-link to="/cookies" class="menu-item">Cookies</router-link>
      <router-link to="/meat" class="menu-item">Meat & Seafood</router-link>
      <router-link to="/bakery" class="menu-item">Bakery</router-link>

    </div>

    <!-- RIGHT SIDE: PHONE SUPPORT -->
    <div class="support-box">
      <span class="phone-icon">📞</span>
      <div>
        <h4>099 777 888</h4>
        <p>24/7 Support Center</p>
      </div>
    </div>

  </nav>
</template>

<script setup>
// No JS needed for static menu
</script>

<style scoped>
.menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 28px;
  background: white;
  border-bottom: 1px solid #e6e6e6;
  font-family: "Poppins", sans-serif;
}

/* LEFT MENU ITEMS */
.left-menu {
  display: flex;
  gap: 28px;
  align-items: center;
}

/* MENU ITEM BASE STYLE */
.menu-item {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 15px;
  color: #253D4E;
  text-decoration: none;
  font-weight: 500;
  padding: 8px 10px;
  border-radius: 6px;
  transition: 0.25s ease;
}

.menu-item:hover {
  background: #F0F6F1;
  color: #55AA55;
}

/* SPECIAL STYLE FOR 'Browse All Categories' */
.browse {
  background: #3BB77E;
  color: white;
  font-weight: 600;
  padding: 10px 15px;
  border-radius: 6px;
}

/* ICONS */
.icon {
  font-size: 18px;
}

/* ACTIVE LINK COLOR */
.router-link-active {
  color: #3BB77E !important;
}

/* SUPPORT BOX (RIGHT SIDE) */
.support-box {
  display: flex;
  align-items: center;
  gap: 12px;
}

.phone-icon {
  font-size: 28px;
  color: #3BB77E;
}

.support-box h4 {
  margin: 0;
  font-size: 17px;
  font-weight: 700;
  color: #253D4E;
}

.support-box p {
  margin: 0;
  font-size: 12px;
  color: #7E7E7E;
}
</style>
