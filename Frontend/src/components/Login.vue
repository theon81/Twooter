<template>
  <div class="container">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center">
      <h2>Sign in!</h2>
      <input type="text" placeholder="username" v-model="username" @keydown.enter="login" />
      <input type="password" placeholder="password" v-model="password" @keydown.enter="login" />
      <button @click="login" style="width: 150px;">Sign in</button>
    </div>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      username: '',
      password: ''
    };
  },
  methods: {
    login() {
      if (!this.username || !this.password) {
        alert('Please fill out both fields.');
        return;
      }
      axios.post('http://127.0.0.1:8000/api/Auth/login', {
        username: this.username,
        password: this.password,
        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }).then(response => {
        const token = response.data.token;
        const role = response.data.role;
        localStorage.setItem('token', token);
        console.log('Token:', token, 'Role:', role);
        this.$store.dispatch('login', response.data.user);
        this.$router.push('/dashboard');
      }).catch(error => {
        console.error('Login failed:', error);
        alert('Cannot sign in. Please check your login credentials.');
      });
    }
  }

};
</script>