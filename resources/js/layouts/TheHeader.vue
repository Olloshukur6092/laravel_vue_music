<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <ul class="navbar-nav p-2">
        <li class="nav-item">
          <router-link to="/" class="nav-link" style="font-size:22px;">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/singers" class="nav-link" style="font-size:22px;">Singer</router-link>
        </li>
      </ul>
    </div>
  </nav>
  <router-view />
</template>

<script>
export default {};
</script>

<style>
</style>