<template>
  <h1>Add a product</h1>
  <form @submit.prevent="createProduct" class="form-container">
    <div class="input">
      <input type="text" v-model="name" id="name" required placeholder="Product Name">
      <input type="number" v-model="price" id="price" required placeholder="Product Price">
    </div>
    <button type="submit">Add</button>
    <router-link to="/products">
      <button type="button">Cancel</button>
    </router-link>
  </form>
</template>

<script>
// import { createProduct } from '../services/productService.js';

// export default {
//   name: 'AddProduct',
//   data() {
//     return {
//       name: '',
//       price: '',
//     };
//   },
//   methods: {
//     async createProduct() {
//       const productData = {
//         name: this.name,
//         price: this.price,
//       };

//       try {
//         await createProduct(productData);
//         this.$router.push('/products');
//       } catch (error) {
//         console.error('Cannot create product:', error);
//       }
//     },
//   },
// };

export default {
  name: 'AddProduct',
  data() {
    return {
      name: '',
      price: '',
    };
  },
  methods: {
    async createProduct() {
      const productData = {
        name: this.name,
        price: this.price,
      };
      try {
        const response = await fetch('/CreateProduct', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(productData),
        });
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const data = await response.json();
        this.$router.push('/products');
      } catch (error) {
        console.error('Cannot create product:', error);
      }
    },
  },
};
</script>

<style scoped>
.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.input {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 400px;
  margin-bottom: 20px;
}

.button-container {
  display: flex;
  justify-content: center;
  gap: 10px;
}
</style>