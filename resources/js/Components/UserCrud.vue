<template>
    <div>
      <h2>User Management</h2>
      <button @click="showForm = true; resetForm()">Add User</button>
      
      <ul>
        <li v-for="user in users" :key="user.id">
          {{ user.name }} - {{ user.email }}
          <button @click="editUser(user)">Edit</button>
          <button @click="deleteUser(user.id)">Delete</button>
        </li>
      </ul>
  
      <div v-if="showForm">
        <input v-model="form.name" placeholder="Name">
        <input v-model="form.email" placeholder="Email">
        <input v-model="form.address" placeholder="Address">
        <input v-model="form.phone" placeholder="Phone">
        <input v-model="form.password" placeholder="Password" type="password">
        <button @click="saveUser">Save</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        users: [],
        form: {
          id: null,
          name: '',
          email: '',
          address: '',
          phone: '',
          password: '',
        },
        showForm: false,
      };
    },
    mounted() {
      this.fetchUsers();
    },
    methods: {
      async fetchUsers() {
        const response = await axios.get('/api/users');
        this.users = response.data;
      },
      resetForm() {
        this.form = { id: null, name: '', email: '', address: '', phone: '', password: '' };
      },
      async saveUser() {
        if (this.form.id) {
          await axios.put(`/api/users/${this.form.id}`, this.form);
        } else {
          await axios.post('/api/users', this.form);
        }
        this.fetchUsers();
        this.showForm = false;
      },
      editUser(user) {
        this.form = { ...user, password: '' };
        this.showForm = true;
      },
      async deleteUser(id) {
        await axios.delete(`/api/users/${id}`);
        this.fetchUsers();
      },
    },
  };
  </script>
  