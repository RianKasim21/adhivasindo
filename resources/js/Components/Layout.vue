<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import RightBar from '@/Components/RightBar.vue';
import { CalendarDateRangeIcon, UserIcon } from '@heroicons/vue/24/outline'
import { ref, onMounted } from "vue";
import Modul from './Modul.vue';
import Tabel from './Tabel.vue';

// Dynamic current date
const currentDate = ref("");

onMounted(() => {
    const today = new Date();
    // Format tanggal (misalnya: "21 November 2024")
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    currentDate.value = today.toLocaleDateString('id-ID', options); // Ubah 'id-ID' sesuai lokal
});
</script>

<template>
    <AuthenticatedLayout>
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
      </template>
  
      <div class="flex flex-col lg:flex-row">
        <div>
          <SideBar></SideBar>
        </div>
  
        <div class="pb-12 w-full lg:w-[80%]">
          <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-gradient-to-t from-[#6547ff] via-[#a28afa] to-[#ae9af6] shadow-sm sm:rounded-lg">
              <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between">
                <div class="w-full lg:w-[50%]">
                  <div class="text-gray-900">
                    <p class="text-sm text-yellow-300 font-bold uppercase mb-5">Pemograman</p>
                  </div>
                  <div>
                    <span class="text-2xl text-white mt-2">Pemograman Frontend Modern Dengan React dan Angular</span>
                    <p class="text-white text-[10px]">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia placeat, ducimus dolorem veniam nisi...
                    </p>
                  </div>
                  <div class="flex flex-wrap justify-between mt-8">
                    <div class="flex items-center text-white gap-2">
                      <UserIcon class="size-6" />
                      <p>Pemateri By Joseph</p>
                    </div>
                    <div class="flex items-center text-white gap-2">
                      <CalendarDateRangeIcon class="size-6" />
                      <p>{{ currentDate }}</p>
                    </div>
                  </div>
                </div>
                <div class="w-full lg:w-[20%] flex justify-end mt-5 lg:mt-0">
                  <div class="p-3 bg-white flex justify-center rounded rounded-md text-black">
                    <button>MULAI LEARNING</button>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="pt-10 px-2">
              <Modul></Modul>
            </div>
            <div class="pt-10 px-2">
              <Tabel></Tabel>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
