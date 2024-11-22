<script setup>
import NavLink from './NavLink.vue';
import { CalendarDateRangeIcon, ChatBubbleBottomCenterIcon, Squares2X2Icon, UsersIcon, UserIcon } from '@heroicons/vue/24/outline';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
</script>

<template>
  <div class="w-full lg:w-72 rounded rounded-tr-3xl h-full bg-gray-800 text-white flex flex-col py-5">
    <ul>
      <li class="my-2 mx-6">
        <NavLink :active="route().current('dashboard')">
          <Squares2X2Icon class="w-4 mr-2"></Squares2X2Icon> Dashboard
        </NavLink>
      </li>
      <li class="my-2 mx-16">
        <NavLink>
          <CalendarDateRangeIcon class="w-4 mr-2"></CalendarDateRangeIcon> Modul
        </NavLink>
      </li>
      <li class="my-2 mx-16">
        <NavLink>
          <UsersIcon class="w-4 mr-2"></UsersIcon> Peserta
        </NavLink>
      </li>
      <li class="my-2 mx-16">
        <NavLink>
          <ChatBubbleBottomCenterIcon class="w-4 mr-2"></ChatBubbleBottomCenterIcon> Group Chat
        </NavLink>
      </li>
      <li class="my-2 mx-16">
        <NavLink>
          <UserIcon class="w-4 mr-2"></UserIcon> Pemateri
        </NavLink>
      </li>
    </ul>
    <div class="mt-8 px-6 py-4 text-red-400 cursor-pointer hover:text-red-600">
      <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
    </div>
  </div>
</template>

  
  <script>
  export default {};
  </script>
  
  <style scoped>
  </style>
  