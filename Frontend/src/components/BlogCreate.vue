<template>
  <h1>Add a new post</h1>
  <form @submit.prevent="createBlog" class="form-container">
    <div class="input">
      <input type="text" v-model="title" id="1" required placeholder="Title">
      <input type="text" v-model="content" id="2" required placeholder="Content">
      <input type="text" v-model="author" id="3" required placeholder="Sign">
    </div>
    <button type="submit">Save</button>
    <router-link to="/blogs">
      <button type="button">Cancel</button>
    </router-link>
  </form>
</template>

<script>
import { createBlog } from '../services/blogService.js';
import '../assets/BlogCreate.css';

export default {
  name: 'AddBlog',
  data() {
    return {
      title: '',
      content: '',
      author: '',
    };
  },
  methods: {
    async createBlog() {
      const blogData = {
        title: this.title,
        content: this.content,
        author: this.author,
      };

      try {
        await createBlog(blogData);
        this.$router.push('/blogs');
      } catch (error) {
        console.error('Cannot create post:', error);
      }
    },
  },
};
</script>