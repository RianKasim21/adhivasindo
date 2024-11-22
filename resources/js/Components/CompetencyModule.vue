<template>
    <div class="bg-white p-4 rounded-lg shadow-md">
      <h4 class="text-lg font-bold">{{ title }}</h4>
      <p class="mt-2 text-gray-600">{{ description }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: ['title', 'description'],
  };
  </script>
  
  <style scoped>
  </style>
  