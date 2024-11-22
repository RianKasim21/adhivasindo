<script setup>
import Layout from '@/Components/Layout.vue';
import RightBar from '@/Components/RightBar.vue';
</script>

<template>
  <div class="flex flex-col lg:flex-row bg-white">
    <div class="w-full lg:w-[70%]">
      <Layout></Layout>
    </div>
    <div class="w-full lg:w-[30%]">
      <RightBar></RightBar>
    </div> 
  </div>
</template>
