<template>
    <h1>PRODUCTOS</h1>
    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus fs-4"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body d-flex justify-content-center">
                    <div class="p-1 input-group row">
                        <div class="col-12">
                            <label for="">Nombre del producto</label><br>
                            <input type="text" class="form-control w-100" v-model="createProducts.name">
                        </div>
                        <div class="col-12">
                            <label for="">Cantidad</label><br>
                            <input type="number" class="form-control w-100" v-model="createProducts.quantity">
                        </div>
                        <div class="col-12">
                            <label for="">Precio del producto</label><br>
                            <input type="number" class="form-control w-100" v-model="createProducts.price">
                        </div>              
                    
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" @click="storeProduct()" class="btn btn-primary">Guardar</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { defineEmits } from 'vue';
import axios from 'axios';


const createProducts = reactive({

    name       : '',
    quantity   : 0,
    price      : 0.0,
    entry_type : 'ENTRADA',

})

const emit = defineEmits(['refresh'])

function storeProduct(){

    let data = {
        name: createProducts.name,
        quantity: createProducts.quantity,
        price: createProducts.price,
        entry_type: createProducts.entry_type,
    }
  //console.log(data)
  try {
    const response = axios.post('http://127.0.0.1:8000/api/products/store', data);
    
    console.log('Éxito:', response.data);
    //emit('close-modal')
    emit("refresh")
    
  } catch (error) {
    console.error('Error en la solicitud:', error);
    
    if (error.response) {
      // El servidor respondió con un código de error
      console.error('Datos del error:', error.response.data);
      console.error('Status:', error.response.status);
      console.error('Headers:', error.response.headers);
      
      if (error.response.status === 405) {
        console.error('Sugerencia: Prueba con PUT/PATCH en lugar de POST');
      }
    } else if (error.request) {
      // La solicitud fue hecha pero no hubo respuesta
      console.error('No se recibió respuesta del servidor');
    } else {
      // Hubo un error al configurar la solicitud
      console.error('Error al configurar la solicitud:', error.message);
    }
  }
}

const clearProduct = () => {
    createProducts.name=""
    createProducts,quantity=0
    createProducts.price=0.0
}
</script>