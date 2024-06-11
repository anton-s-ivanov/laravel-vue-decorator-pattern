<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink :to="{name: 'users-list'}">Список пользователей</RouterLink>
        <RouterLink :to="{name: 'new-user-form'}">Создать пользователя</RouterLink>
      </nav>
    </div>
  </header>
  
  <RouterView />
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
  max-width: 50%;
  margin-bottom: 50px;
  display: contents;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin: 2rem 0;
  display: flex;
}

nav a.router-link-exact-active {
  color: var(--color-text);
  font-weight: 800;
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: flex;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
  text-decoration: none;
  color: gray;
}

nav a:first-of-type {
  border: 0;
  padding-left: 0;
}

</style>
