<template>
  <div class="showcase">
    <div class="left-box">
      <h1>Don’t miss amazing grocery deals</h1>
      <p>Sign up for the daily newsletter</p>

      <div class="subscribe-box">
        <input type="email" placeholder="Your email address" />
        <button>Subscribe</button>
      </div>
    </div>

    <!-- RIGHT IMAGE (foreground image) -->
    <img 
      src="/fresh-apples-shopping-mesh-bag-with-branch-apples-removebg 1.png" 
      class="main-image" 
    />
  </div>
</template>

<style scoped>
/* MAIN SHOWCASE */
.showcase {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 40px 50px;
  border-radius: 16px;
  margin-bottom: 40px;
  background-color: #f4e795;

  /* BACKGROUND IMAGE */
  background-image: url("/3389452 1.png");
  background-size: cover;        /* Fill entire showcase area */
  background-position: center;
  background-repeat: no-repeat;

  /* HEIGHT */
  min-height: 390px;
  position: relative;
}

/* LEFT CONTENT */
.left-box {
  display: flex;
  flex-direction: column;
  gap: 12px;
  width: 45%;
}

.left-box h1 {
  font-size: 30px;
  font-weight: 700;
  color: #2a4d14;
}

.left-box p {
  font-size: 16px;
  color: #3a6130;
}

/* EMAIL + BUTTON */
.subscribe-box {
  display: flex;
  gap: 10px;
}

.subscribe-box input {
  padding: 12px 15px;
  border: 1px solid #b7d6a2;
  border-radius: 8px;
  width: 260px;
  outline: none;
}

.subscribe-box button {
  background: #5ca85c;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.25s;
}

/* FOREGROUND IMAGE (Right image) */
.main-image {
  height: 100%;      /* same height as showcase */
  max-height: 550px; /* optional limit */
  object-fit: none;
  width: 850px;
  position: absolute;
  right: 0;
}

</style>
