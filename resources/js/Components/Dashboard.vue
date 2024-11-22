<template>
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-3/4 p-6">
        <div class="bg-purple-200 p-6 rounded-lg">
          <h2 class="text-xl font-bold">Pemrograman Frontend Modern dengan React dan Angular</h2>
          <p class="mt-2 text-gray-700">
            Pemateri: <strong>Josep</strong> | Tanggal: <strong>14-06-2025</strong>
          </p>
          <button class="mt-4 px-6 py-2 bg-purple-500 text-white rounded-lg">Mulai Learning</button>
        </div>
  
        <h3 class="mt-6 text-lg font-bold">Modul Kompetensi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
          <CompetencyModule
            title="Pemrograman"
            description="Membangun API Standar Industri..."
          />
          <CompetencyModule
            title="Creative Marketing"
            description="Strategi Menarik Pelanggan..."
          />
          <CompetencyModule
            title="Management SDM"
            description="Efektif Mengelola Tim..."
          />
        </div>
      </div>
  
      <div class="w-full lg:w-1/4 p-6 bg-gray-100">
        <Calendar />
      </div>
    </div>
  </template>
  
  <script>
  import CompetencyModule from './CompetencyModule.vue';
  import Calendar from './Calendar.vue';
  
  export default {
    components: {
      CompetencyModule,
      Calendar,
    },
  };
  </script>
  
  <style scoped>
  </style>
  