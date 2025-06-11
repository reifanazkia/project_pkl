<template>
  <div>
    <Header />
    <div v-if="sekolah">
      <h2>{{ sekolah.nama }}</h2>
      <img :src="sekolah.logo" alt="Logo Sekolah" />
      <p>{{ sekolah.deskripsi }}</p>
      <p>{{ sekolah.alamat }}</p>
      <p>Kontak: {{ sekolah.kontak }}</p>
    </div>
    <div v-else>
      <p>Loading data sekolah...</p>
    </div>
  </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
  components: { Header },
  data() {
    return {
      sekolah: null
    };
  },
  mounted() {
    const id = this.$route.params.id;
    fetch(`http://16.0.0.4:8000/api/schools/${id}`)
      .then(res => res.json())
      .then(data => {
        this.sekolah = data;
      })
      .catch(err => {
        console.error('Gagal ambil data detail sekolah:', err);
      });
  }
};
</script>
