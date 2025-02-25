<template>
  <h1>Edit Product</h1>
  <form @submit.prevent="updateProduct" class="form-container">
    <div class="input">
      <input type="text" v-model="name" id="name" required placeholder="Product Name">
      <input type="number" v-model="price" id="price" required placeholder="Product Price">
    </div>
    <button type="submit">Save</button>
    <router-link to="/products">
      <button type="button">Cancel</button>
    </router-link>
  </form>
</template>

<script>
import { fetchProductById, updateProduct } from '../services/productService.js';

export default {
  name: 'EditProduct',
  data() {
    return {
      name: '',
      price: '',
      productId: this.$route.params.id,
    };
  },
  mounted() {
    this.loadProduct();
  },
  methods: {
    async loadProduct() {
      try {
        const product = await fetchProductById(this.productId);
        console.log(product);
        this.name = product.name || '';
        this.price = product.price || '';
      } catch (error) {
        console.error('Cannot load item:', error);
        alert('Cannot load item. Please try again later');
      }
    },
    async updateProduct() {
      const productData = {
        name: this.name,
        price: this.price,
      };

      try {
        await updateProduct(this.productId, productData);
        alert('Updated product!');
        this.$router.push('/products');
      } catch (error) {
        console.error('Cannot update product:', error);
        alert('Cannot update product. Please try again later');
      }
    },
  },
};
</script>
