<template>
    <div class="card-head d-flex justify-content-between p-2">
        <h1>{{ props.title }}</h1>
        <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus fs-4"></i>
        </button>
    </div>

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
                        <div class="col-12 mb-1">
                            <label for="">Cantidad</label><br>
                            <input type="number" class="form-control w-100" v-model="createMovement.quantity">
                        </div>
                        <div class="col-12 mb-1">
                            <label for="">Precio del producto</label><br>
                            <input type="number" class="form-control w-100" v-model="createMovement.price">
                        </div>              
                        <div class="col-12 mb-1">
                            <label for="">Tipo de movimiento</label><br>
                            <select class="form-select" v-model="createMovement.entry_type" aria-label="Default select example">
                                <option value="ENTRADA">ENTRADA</option>
                                <option value="SALIDA">SALIDA</option>
                            </select>
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
import { reactive, defineProps, defineEmits } from 'vue';
import axios from 'axios';

const props = defineProps({
  title: {type: Array, required: true},
  productId: {type: Array, required: true},
  //movements: {type: Object, required: true},
});
console.log(props.productId)

const createMovement = reactive({

    quantity   : 0,
    price      : 0.0,
    entry_type : '',

})

const clearMovement = () => {
    createMovement.quantity=0
    createMovement.price=0.0
    createMovement.entry_type=''
}

const emit = defineEmits(['refresh'])

function storeProduct(){

    let data = {
        product_id  : props.productId,
        quantity: createMovement.quantity,
        price: createMovement.price,
        entry_type: createMovement.entry_type,
    }
  console.log(data)
  try {
    const response = axios.post('http://127.0.0.1:8000/api/inventoryLots/store', data);
    
    console.log('Éxito:', response.data);
    clearMovement()
    //emit("refresh")
    
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



</script>