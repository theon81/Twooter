<template>
  <main class="table" id="customers_table">
    <section class="table__header">
      <h1>User Management</h1>
      <router-link to="/users/add">
        <button>Add User</button>
      </router-link>
      <div class="input-group">
        <input type="search" placeholder="Tìm kiếm...">
        <img src="../assets/img/search.png" alt="">
      </div>
    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th> ID </th>
            <th> USERNAME </th>
            <th> PASSWORD </th>
            <th> ROLE </th>
            <th> ACTION </th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="6">Loading...</td>
          </tr>
          <tr v-for="user in users" :key="user.id" v-else>
            <td>{{ user.id }}</td>
            <td>{{ user.username }}</td>
            <td>{{ user.password }}</td>
            <td>{{ user.role === 0 ? 'ADMIN' : 'USER' }}</td>
            <td>
              <router-link :to="`/users/edit/${user.id}`">
                <button> Edit </button>
              </router-link>
              <button @click="confirmDelete(user.id)"> Remove </button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</template>
<script>
import { fetchUsers, deleteUser as deleteUserService } from '../services/userService.js';

export default {
  name: 'UserDataTable',
  data() {
    return {
      users: [],
      loading: false,
    };
  },
  mounted() {
    this.loadUsers();
  },
  methods: {
    async loadUsers() {
      this.loading = true;
      try {
        this.users = await fetchUsers();
      } catch (error) {
        console.error('Cannot load item:', error);
        alert('Cannot load item data.');
      } finally {
        this.loading = false;
      }
    },
    async removeUser(id) {
      try {
        await deleteUserService(id);
        this.loadUsers();
      } catch (error) {
        console.error('Cannot remove item:', error);
        alert('Cannot remove item data.');
      }
    },
    confirmDelete(id) {
      if (confirm('Are you sure you want to remove this user?')) {
        this.removeUser(id);
      }
    },
  },
};
</script>
<style></style>