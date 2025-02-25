<template>
    <section id="sidebar">
        <router-link to="/dashboard" class="brand"><img src="../assets/img/logo.png" alt="" style="width: 45px;"></router-link>
        <ul class="side-menu">
            <li><router-link to="/dashboard" class="feed" active-class="feed-active"><i class='bx bxs-dashboard icon'></i> Feed </router-link></li>
            <li class="divider" data-text="Moderation"> Moderation </li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i> Items <i
                        class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><router-link to="/products"> Product Management </router-link></li>
                    <li><router-link to="/blogs"> Post Management </router-link></li>
                </ul>
            </li>
            <li class="divider" data-text="Other"> Other </li>
            <li><router-link to="/users"><i class='bx bxs-user icon'></i> User Management </router-link></li>
        </ul>
    </section>
</template>

<script>
import '../assets/SidebarComponent.css';

export default {
    name: "Sidebar",
};
</script>