<template>
    <!-- Posting -->
    <form @submit.prevent="createBlog">
        <header class="header">
            <div class="header-left">
                <div class="search-bar">
                    <img src="../assets/img/Jane.png" alt="User Profile Picture">
                    <input type="text" v-model="title" placeholder="Title" style="width: auto;">
                    <input type="text" v-model="content" placeholder="What's on your mind?">
                    <input type="text" v-model="author" placeholder="Sign" style="width: auto;">
                </div>
            </div>
            <div class="header-right">
                <button class="upload-btn" style="submit">Post</button>
            </div>
        </header>
    </form>
    <!-- Post content -->
    <section v-if="loading" class="post-section">
        <p>Loading...</p>
    </section>
    <section v-for="blog in blogs" :key="blog.id" class="post-section" v-else>
        <div class="post-header">
            <!-- <img :src="blog.avatar" alt="User Avatar"> -->
            <img src="../assets/img/pfp.png" alt="User Avatar">
            <p class="post-name">{{ blog.author }}</p>
        </div>
        <div class="post-content">
            <h5 class="post-text">{{ blog.title }}</h5>
            <p class="post-text">{{ blog.content }}</p>
        </div>
    </section>

</template>

<script>
import { createBlog, fetchBlogs } from '../services/blogService.js';

export default {
    name: 'AddBlog',
    data() {
        return {
            blogs: [],
            loading: false,
            title: '',
            content: '',
            author: '',
        };
    },
    mounted() {
        this.loadBlogs();
    },
    methods: {
        async loadBlogs() {
            this.loading = true;
            try {
                this.blogs = await fetchBlogs();
                this.blogs.reverse();
            } catch (error) {
                console.error('Cannot load item:', error);
                alert('Cannot load item.');
            } finally {
                this.loading = false;
            }
        },
        async createBlog() {
            const blogData = {
                title: this.title,
                content: this.content,
                author: this.author,
            };

            try {
                await createBlog(blogData);
                alert('Posted!');
                this.title = '';
                this.content = '';
                this.author = '';
                this.loadBlogs();
            } catch (error) {
                console.error('Cannot post:', error);
                alert('Error occurred. Please try again.');
            }
        }
    },
};
</script>