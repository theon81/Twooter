<template>
    <h1>Edit User</h1>
    <form @submit.prevent="updateAccount" class="form-container">
        <div class="input">
            <input type="text" v-model="username" id="username" required placeholder="Username">
            <input type="password" v-model="password" id="password" required placeholder="Password">
            <input type="text" v-model="role" id="role" required placeholder="Role">
        </div>
        <button type="submit">Save</button>
        <router-link to="/users">
            <button type="button">Cancel</button>
        </router-link>
    </form>
</template>

<script>
import { fetchUserById, updateUser } from '../services/userService.js';

export default {
    name: 'EditUser',
    data() {
        return {
            username: '',
            password: '',
            role: '',
            userId: this.$route.params.id,
        };
    },
    mounted() {
        this.loadUser();
    },
    methods: {
        async loadUser() {
            try {
                const user = await fetchUserById(this.userId);
                console.log(user);
                this.username = user.username || '';
                this.password = user.password || '';
                this.role = user.role.toString() || '';
            } catch (error) {
                console.error('Cannot load item:', error);
                alert('Cannot load item. Please try again later');
            }
        },
        async updateAccount() {
            const userData = {
                username: this.username,
                password: this.password,
                role: this.role,
            };

            try {
                await updateUser(this.userId, userData);
                this.$router.push('/users');
            } catch (error) {
                console.error('Cannot update user:', error);
                alert('Cannot update user. Please try again later');
            }
        },
    },
};

</script>
