<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div>
      <ul class="navbar-nav p-2">
        <li class="nav-item">
          <router-link to="/" class="nav-link me-2" style="font-size:22px;">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/singers" class="nav-link me-2" style="font-size:22px;">Singer</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/song-lang" class="nav-link me-2" style="font-size:22px;">Songs-Lang</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/song-genre" class="nav-link me-2" style="font-size:22px;">Song-Genre</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/songs" class="nav-link me-2" style="font-size:22px;">Songs</router-link>
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