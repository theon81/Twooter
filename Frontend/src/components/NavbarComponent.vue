<template>
  <nav>
    <i class='bx bx-menu toggle-sidebar'></i>
    <form action="#">
      <div class="form-group">
        <input type="text" placeholder="Search for stuff...">
        <i class='bx bx-search icon'></i>
      </div>
    </form>
    <a href="#" class="nav-link">
      <i class='bx bxs-bell icon'></i>
      <span class="badge">26</span>
    </a>
    <a href="#" class="nav-link">
      <i class='bx bxs-message-square-dots icon'></i>
      <span class="badge">7</span>
    </a>
    <span class="divider"></span>
    <div class="profile">
      <img src="../assets/img/Jane.png" alt="User Profile Picture">
      <ul class="profile-link">
        <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile </a></li>
        <li><a href="#"><i class='bx bxs-cog'></i> Settings </a></li>
        <li><router-link to="/logout"><i class='bx bxs-log-out-circle'></i> Sign out </router-link></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
};
</script>