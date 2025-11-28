<template>
  <div class="product-card">

    <!-- BADGE (Promotion / Hot / Sale) -->
    <div
      v-if="badgeText"
      class="badge"
      :class="badgeColor"
    >
      {{ badgeText }}
    </div>

    <!-- IMAGE -->
    <img :src="image" class="product-img" />

    <div class="info">
      <p class="brand">Hodo Foods</p>
      <h3 class="title">{{ product.name }}</h3>

      <!-- RATING -->
      <div class="rating">
        <i 
          v-for="n in 5" 
          :key="n"
          class="fa-star"
          :class="n <= product.rating ? 'fas filled' : 'far empty'"
        ></i>
        <span class="rating-number">{{ product.rating }}</span>
      </div>

      <p class="size">{{ product.size }}</p>

      <!-- PRICES -->
      <div class="price-row">
        <span class="new-price">${{ product.price }}</span>

        <!-- Old price (API or calculated) -->
        <span v-if="finalOldPrice" class="old-price">
          ${{ finalOldPrice }}
        </span>
        
        <button 
          class="btn-add" 
          v-if="qty === 0" 
          @click="increase"
          >
          Add +
        </button>

        <button class="btn-add" v-else>
          <div class="qty-inline">
            <span class="qty-icon" @click.stop="decrease">▾</span>
            <span class="qty-value">{{ qty }}</span>
            <span class="qty-icon" @click.stop="increase">▴</span>
          </div>
        </button>

      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";

const props = defineProps({
  product: Object,
});

const API_BASE_URL = "http://localhost:3000";

/* --------------------------
   IMAGE FIXER
--------------------------- */
function normalizeImagePath(img) {
  if (!img) return null;
  try {
    const arr = JSON.parse(img);
    return arr[0].replace(/\\/g, "/");
  } catch {
    return img.replace(/\\/g, "/");
  }
}

const image = computed(() => {
  const clean = normalizeImagePath(props.product.image);
  if (!clean) return "https://via.placeholder.com/300x200?text=No+Image";
  if (clean.startsWith("http")) return clean;
  return `${API_BASE_URL}/${clean}`;
});

/* --------------------------
   BADGE LOGIC
--------------------------- */
const isHot = computed(() => {
  return props.product.countSold > 10 || props.product.rating >= 5;
});

const isSale = computed(() => {
  // Rule: product is on Sale if countSold = 0 OR promotion percentage > 0
  return props.product.countSold === 0 ||
         (!!props.product.promotionAsPercentage && Number(props.product.promotionAsPercentage) > 0);

});

const badgeText = computed(() => {
  if (props.product.promotionAsPercentage)
    return `-${props.product.promotionAsPercentage}%`;
  if (isHot.value) return "Hot";
  if (isSale.value) return "Sale";
  return null;
});

const badgeColor = computed(() => {
  if (props.product.promotionAsPercentage) return "green";
  if (isHot.value) return "red";
  if (isSale.value) return "yellow";
  return "";
});

/* --------------------------
   OLD PRICE FROM API OR AUTO-CALCULATE
--------------------------- */
// const finalOldPrice = computed(() => {
//   if (props.product.oldPrice) return props.product.oldPrice;

//   if (props.product.promotionAsPercentage) {
//     const discount = props.product.promotionAsPercentage;
//     const price = props.product.price;

//     const calculated = (price / (1 - discount / 100)).toFixed(2);
//     return calculated;
//   }

//   return null;
// });

const finalOldPrice = computed(() => {
  // Prefer backend oldPrice if available
  if (props.product.oldPrice !== undefined && props.product.oldPrice !== null) {
    return props.product.oldPrice;
  }

  // Always generate an old price (example: +20%)
  const price = props.product.price;
  return (price * 1.116).toFixed(2);
});

/* --------------------------
   QUANTITY CONTROL
--------------------------- */
const qty = ref(0);
const increase = () => qty.value++;
const decrease = () => { if (qty.value > 0) qty.value--; };
</script>

<style scoped>
.product-card {
  width: 240px;
  padding: 15px;
  border: 1px solid #10b981;
  border-radius: 14px;
  background: white;
  position: relative;
  transition: 0.25s ease-in-out;
}
.product-card:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  transform: translateY(-3px);
}

/* BADGES */
.badge {
  position: absolute;
  top: 12px;
  left: 10px;
  padding: 4px 12px;
  color: white;
  font-weight: bold;
  border-radius: 8px;
  font-size: 14px;
}
.badge.green { background: #10b981; }
.badge.red { background: #ef4444; }
.badge.yellow { background: #fbbf24; }

/* IMAGE */
.product-img {
  width: 180px;
  height: 160px;
  object-fit: contain;
  margin: 10px auto;
  display: block;
}

.brand {
  font-size: 12px;
  color: #6b7280;
}
.title {
  font-size: 15px;
  font-weight: 600;
  margin-top: 5px;
}

/* RATING */
.rating {
  display: flex;
  align-items: center;
  gap: 3px;
  margin: 6px 0;
}
.filled { color: #f6ad55; }
.empty { color: #d1d5db; }
.rating-number {
  margin-left: 6px;
  color: #6b7280;
  font-size: 13px;
}

/* SIZES & PRICES */
.size { color: #6b7280; font-size: 13px; }
.price-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  margin-top: 8px;
}
.btn-add {
  width: 30%;
  flex-shrink: 0;
  padding: 6px 12px;
  font-size: 14px;
  border-radius: 6px;
  background: #10b981;
  color: white;
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;

}
.qty-inline {
  display: flex;
  align-items: center;
  gap: 6px;
}
.qty-value {
  min-width: 20px;
  text-align: center;
}
.qty-icon {
  font-size: 14px;
  color: white;
  cursor: pointer;
  user-select:auto
}

.new-price {
  font-size: 20px;
  font-weight: bold;
  color: #10b981;
}
.old-price {
  text-decoration: line-through;
  font-size: 14px;
  color: #9ca3af;
  margin-right: 4rem;
}

</style>