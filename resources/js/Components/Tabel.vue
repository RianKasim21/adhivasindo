<script setup>
defineProps({
    products: Array
})
</script>

<template>
    <div class="text-black font-black text-xl mb-5" style="width: 18rem;">
        <p>NILAI PESERTA</p>
    </div>

    <div class="">
        <div class="overflow-x-auto bg-white rounded rounded-md shadow-md">
            <table class="table text-black">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="product.id">
          <th>{{ index + 1 }}</th>
          <td>{{ product.name }}</td>
          <td>{{ product.description }}</td>
          <td>{{ product.price }}</td>
        </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: []
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await axios.get('http://localhost:8000/api/products'); // Ganti dengan URL API Anda
        this.products = response.data; // Asumsikan response.data adalah array produk
      } catch (error) {
        console.error("There was an error fetching the products:", error);
      }
    }
  }
};
</script>