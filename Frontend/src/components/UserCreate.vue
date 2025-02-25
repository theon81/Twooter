<template>
    <h1>Add User</h1>
    <form @submit.prevent="createAccount" class="form-container">
        <div class="input">
            <input type="text" v-model="username" id="username" required placeholder="Username">
            <input type="password" v-model="password" id="password" required placeholder="Password">
        </div>
        <button type="submit">Add</button>
        <router-link to="/users">
            <button type="button">Cancel</button>
        </router-link>
    </form>
</template>

<script>
import { createUser } from '../services/userService.js';

export default {
    name: 'AddUser',
    data() {
        return {
            username: '',
            password: '',
        };
    },
    methods: {
        async createAccount() {
            const userData = {
                username: this.username,
                password: this.password,
            };

            try {
                await createUser(userData);
                this.$router.push('/users');
            } catch (error) {
                console.error('Cannot create user:', error);
            }
        },
    },
};
</script>