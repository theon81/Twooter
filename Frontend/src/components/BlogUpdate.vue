<template>
  <h1>Edit post</h1>
  <form @submit.prevent="updateBlog" class="form-container">
    <div class="input">
      <input type="text" v-model="title" id="title_input" required placeholder="Title">
      <input type="text" v-model="content" id="content_input" required placeholder="Content">
      <input type="text" v-model="author" id="author" required placeholder="Sign">
    </div>
    <button type="submit">Save</button>
    <router-link to="/blogs">
      <button type="button">Cancel</button>
    </router-link>
  </form>
</template>

<script>
import { fetchBlogById, updateBlog } from '../services/blogService.js';

export default {
  name: 'EditBlog',
  data() {
    return {
      title: '',
      content: '',
      author: '',
      blogId: this.$route.params.id,
    };
  },
  mounted() {
    this.loadBlog();
  },
  methods: {
    async loadBlog() {
      try {
        const blog = await fetchBlogById(this.blogId);
        console.log(blog);
        this.title = blog.title || '';
        this.content = blog.content || '';
        this.author = blog.author || '';
      } catch (error) {
        console.error('Failed to load item:', error);
        alert('Cannot load item. Please try again later');
      }
    },
    async updateBlog() {
      const blogData = {
        title: this.title,
        content: this.content,
        author: this.author,
      };

      try {
        await updateBlog(this.blogId, blogData);
        alert('Updated post!');
        this.$router.push('/blogs');
      } catch (error) {
        console.error('Failed to update item:', error);
        alert('Cannot update item. Please try again later');
      }
    },
  },
};
</script>