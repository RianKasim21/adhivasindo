<script setup>
defineProps({
    nilai: Array
});
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
                        <th>Rank</th>
                        <th>Nama</th>
                        <th>Class</th>
                        <th>Modul</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in paginatedData" :key="item.id">
                        <th>{{ startIndex + index + 1 }}</th>
                        <td>{{ item.rank }}</td>
                        <td>{{ item.nama }}</td>
                        <td>{{ item.class }}</td>
                        <td>{{ item.modul }}</td>
                        <td>{{ item.point }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Controls -->
        <div class="flex justify-between items-center mt-5">
            <button 
                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" 
                :disabled="currentPage === 1" 
                @click="prevPage"
            >
                Previous
            </button>
            <p>Page {{ currentPage }} of {{ totalPages }}</p>
            <button 
                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" 
                :disabled="currentPage === totalPages" 
                @click="nextPage"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            nilai: [],
            currentPage: 1, // Current page
            itemsPerPage: 10 // Items per page
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.nilai.length / this.itemsPerPage);
        },
        paginatedData() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.nilai.slice(start, end);
        },
        startIndex() {
            return (this.currentPage - 1) * this.itemsPerPage;
        }
    },
    methods: {
        async fetchnilai() {
            try {
                const response = await axios.get('http://localhost:8000/api/nilai');
                this.nilai = response.data;
            } catch (error) {
                console.error("There was an error fetching the nilai:", error);
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        }
    },
    mounted() {
        this.fetchnilai();
    }
};
</script>
