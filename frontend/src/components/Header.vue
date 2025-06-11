<template>
  <header class="header">
    <div class="logo-container">
      <img src="../assets/logo.png" alt="Logo" class="logo" />
      <h1 class="judul">Sangkuriang</h1>
    </div>
    <nav class="menu">
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Profil</a></li>
        <li><a href="#">Kontak</a></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'HeaderBar',
};
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1e88e5;
  padding: 10px 20px;
  color: white;
}

.logo-container {
  display: flex;
  align-items: center;
}

.logo {
  height: 40px;
  margin-right: 10px;
}

.judul {
  font-size: 1.2rem;
}

.menu ul {
  display: flex;
  gap: 20px;
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu a {
  color: white;
  text-decoration: none;
}

.menu a:hover {
  text-decoration: underline;
}
</style>
