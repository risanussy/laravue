<template>
  <div class="container pt-4">
    <h1>E - Commerce</h1>
    <br>
    <h3>Tambah Barang</h3>
    <form @submit.prevent="create()">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama" @input="e => valueNama = e.target.value" :value="valueNama" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" @input="e => valueHarga = e.target.value" :value="valueHarga" required>
      </div>
      <div class="mb-3">
        <label for="Desc" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="Desc" @input="e => valueDesc = e.target.value" :value="valueDesc" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br>
    <hr>
    <br><br>
    <h3>Barang</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody v-for="(data, index) in datas" :key="data.id">
        <tr>
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ data.nama }}</td>
          <td>{{ data.harga }}</td>
          <td>{{ data.desc }}</td>
          <td>
            <button class="btn btn-danger" @click="() => hapus(data.id)">
              Hapus
            </button>  
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br><br><br>
  </template>

<script>
import axios from "axios"

export default {
  name: 'App',
  data(){
    return {
      datas : [],
      valueNama : '',
      valueHarga : '',
      valueDesc : '',
    }
  },
  mounted(){
    axios.get("http://localhost:8000/api/products")
      .then(res =>{
        console.log(res.data)
        this.datas = res.data
      })
  },
  methods: {
    create(){
      axios.post("http://localhost:8000/api/products", {
        nama: this.valueNama,
        harga: this.valueHarga,
        desc: this.valueDesc
      })
        .then(() => {
          this.reload()
          this.valueNama = ''
          this.valueHarga = ''
          this.valueDesc = ''
        })
    },

    reload(){
      axios.get("http://localhost:8000/api/products")
        .then(res =>{
          console.log(res.data)
          this.datas = res.data
        })
    },

    hapus(id){
      axios.delete("http://localhost:8000/api/products/" + id)
        .then(() =>{
          alert("Berhasil Dihapus")
          this.reload()
        })
    }
  }
}
</script>

<style>
</style>
