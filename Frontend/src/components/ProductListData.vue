<template>
  <main class="table" id="products_table">
    <section class="table__header">
      <h1>Product Management</h1>
      <router-link to="/products/add">
        <button>Add product</button>
      </router-link>
      <div class="input-group">
        <input type="search" placeholder="Search products...">
        <img src="../assets/img/search.png" alt="">
      </div>
    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th> ID </th>
            <th> PRODUCT NAME </th>
            <th> Price </th>
            <th> ACTION </th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="6">Loading...</td>
          </tr>
          <tr v-for="user in products" :key="user.id" v-else>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.price }}</td>
            <td>
              <router-link :to="`/products/edit/${user.id}`">
                <button>Edit</button>
              </router-link>
              <button @click="confirmDelete(user.id)">Remove</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</template>

<script>
import { fetchProducts, deleteProduct as deleteProductService } from '../services/productService.js';

export default {
  name: 'ProductDataTable',
  data() {
    return {
      products: [],
      loading: false,
    };
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    async loadProducts() {
      this.loading = true;
      try {
        this.products = await fetchProducts();
      } catch (error) {
        console.error('Cannot load item:', error);

        alert('Cannot load item data.');
      } finally {
        this.loading = false;
      }
    },
    async removeProduct(id) {
      try {
        await deleteProductService(id);
        this.loadProducts();
      } catch (error) {
        console.error('Cannot remove item:', error);

        alert('Cannot remove item data.');
      }
    },
    confirmDelete(id) {
      if (confirm('Are you sure you want to remove this item?')) {
        this.removeProduct(id);
      }
    },
  },
};
</script>