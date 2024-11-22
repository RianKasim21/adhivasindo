<script setup>
import { ChevronRightIcon } from '@heroicons/vue/24/outline';
</script>

<template>
  <div class="w-full min-h-screen p-5 lg:p-10 bg-white text-black flex flex-col">
    <!-- Header -->
    <div class="flex flex-col justify-center items-center">
      <div class="rounded-full w-20 h-20 overflow-hidden">
        <img class="w-full h-full object-cover" src="img/gojo.jpeg" alt="Profile Picture" />
      </div>
      <div class="pt-3 font-extrabold uppercase text-center">
        <p>SELAMAT DATANG, {{ $page.props.auth.user.name }}</p>
      </div>
      <div class="text-gray-500 text-sm text-center">
        <p>Di LMS by Adhivasindo</p>
      </div>
    </div>

    <!-- Card Section -->
    <div class="my-10 flex justify-center">
      <div class="card bg-base-100 w-full max-w-md shadow-xl">
        <div class="card-body">
          <h2 class="card-title">Card title!</h2>
          <p>If a dog chews shoes whose shoes does he choose?</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Buy Now</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Jadwal Pemateri Section -->
    <div class="px-3 lg:px-5">
      <div class="font-semibold mb-5">
        <p>JADWAL PEMATERI</p>
      </div>
      <div class="space-y-5">
        <!-- Jadwal 1 -->
        <button @click="handleClick('Storytelling dalam pemasaran')"
          class="flex items-center bg-gray-100 p-3 rounded-md shadow-sm w-full text-left">
          <div class="w-12 h-12 overflow-hidden rounded-md">
            <img src="img/biru.jpeg" class="w-full h-full object-cover" alt="Jadwal 1" />
          </div>
          <div class="ml-3 flex-grow">
            <p class="font-medium">Storytelling dalam pemasaran</p>
            <p class="text-gray-400 text-sm">09.00 - 11.00 With mr.ijam</p>
          </div>
          <ChevronRightIcon class="w-6 h-6 text-gray-500 ml-auto" />
        </button>

        <!-- Jadwal 2 -->
        <button @click="handleClick('Pemrograman Frontend Modern')"
          class="flex items-center bg-gray-100 p-3 rounded-md shadow-sm w-full text-left">
          <div class="w-12 h-12 overflow-hidden rounded-md">
            <img src="img/pink.jpeg" class="w-full h-full object-cover" alt="Jadwal 2" />
          </div>
          <div class="ml-3 flex-grow">
            <p class="font-medium">Pemrograman Frontend Modern</p>
            <p class="text-gray-400 text-sm">09.00 - 11.00 With mr.ijam</p>
          </div>
          <ChevronRightIcon class="w-6 h-6 text-gray-500 ml-auto" />
        </button>

        <!-- Jadwal 3 -->
        <button @click="handleClick('Pengembangan API')"
          class="flex items-center bg-gray-100 p-3 rounded-md shadow-sm w-full text-left">
          <div class="w-12 h-12 overflow-hidden rounded-md">
            <img src="img/kuning.jpeg" class="w-full h-full object-cover" alt="Jadwal 3" />
          </div>
          <div class="ml-3 flex-grow">
            <p class="font-medium">Pengembangan API</p>
            <p class="text-gray-400 text-sm">09.00 - 11.00 With mr.ijam</p>
          </div>
          <ChevronRightIcon class="w-6 h-6 text-gray-500 ml-auto" />
        </button>
      </div>
    </div>

  </div>
</template>

<script>
export default {};
</script>

<style scoped></style>