<template>
  <div>
    <Header />

    <h2>3 Sekolah Unggulan</h2>
    <div class="content">
      <SekolahCard
        v-for="(item, index) in tigaSekolah"
        :key="index"
        :id="item.id"
        :nama="item.nama"
        :deskripsi="item.deskripsi"
        :logo="item.logo"
      />
    </div>

    <!-- <div class="lihat-semua">
      <router-link to="/semua-sekolah">Lihat Semua Sekolah</router-link>
    </div> -->
  </div>
</template>

<script>
import SekolahCard from "../components/Sekolah.vue";
import Header from "../components/Header.vue";

export default {
  components: {
    SekolahCard,
    Header,
  },
  data() {
    return {
      daftarSekolah: [],
    };
  },
  computed: {
    tigaSekolah() {
      return this.daftarSekolah.slice(0, 3); // tampilkan hanya 3 pertama
    },
  },
  mounted() {
    fetch("http://16.0.0.4:8000/api/schools")
      .then((res) => res.json())
      .then((data) => {
        this.daftarSekolah = data;
      })
      .catch((err) => {
        console.error("Gagal ambil data sekolah:", err);
      });
  },
};
</script>

<style scoped>
.content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 16px;
  padding: 16px;
}

h2 {
  text-align: center;
  margin-top: 16px;
}

.lihat-semua {
  text-align: center;
  margin-bottom: 20px;
}

.lihat-semua a {
  color: #1e88e5;
  text-decoration: none;
  font-weight: bold;
}
</style>
