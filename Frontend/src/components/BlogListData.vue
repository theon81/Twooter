<template>
    <main class="table" id="blogs_table">
        <section class="table__header">
            <h1>Post management</h1>
            <router-link to="/blogs/add">
                <button>Add post</button>
            </router-link>
            <div class="input-group">
                <input type="search" placeholder="Search for posts...">
                <img src="../assets/img/search.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> TITLE </th>
                        <th> CONTENT </th>
                        <th> AUTHOR </th>
                        <th> ACTION </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="loading">
                        <td colspan="6">Loading...</td>
                    </tr>
                    <tr v-for="blog in blogs" :key="blog.id" v-else>
                        <td>{{ blog.id }}</td>
                        <td>{{ blog.title }}</td>
                        <td>{{ blog.content }}</td>
                        <td>{{ blog.author }}</td>
                        <td>
                            <router-link :to="`/blogs/edit/${blog.id}`">
                                <button>EDIT</button>
                            </router-link>
                            <button @click="confirmDelete(blog.id)">REMOVE</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</template>

<script>
import { fetchBlogs, deleteBlog as deleteBlogService } from '../services/blogService.js';

export default {
    name: 'BlogDataTable',
    data() {
        return {
            blogs: [],
            loading: false,
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
            } catch (error) {
                console.error('Cannot load item:', error);

                alert('Cannot load item data.');
            } finally {
                this.loading = false;
            }
        },
        async removeBlog(id) {
            try {
                await deleteBlogService(id);
                this.loadBlogs();
            } catch (error) {
                console.error('Cannot remove item:', error);

                alert('Cannot remove item data.');
            }
        },
        confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                this.removeBlog(id);
            }
        },
    },
};
</script>