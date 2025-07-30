<template>
    <div class="card p-4">
        <div class="card-head">
            <CreateProductModal

            @refresh="refresh"
            />
        </div>
    
        <div class="card-body">
            <ProductsTable 
            :products="products" 
            />
        </div>

    </div>



</template>

<script setup>
import axios from 'axios';
import CreateProductModal from '@/components/modals/CreateProductModal.vue';
import ProductsTable from '@/components/tables/ProductsTable.vue';
import { onMounted, ref } from 'vue';

//const loading = ref(false)
const products = ref([])

const getProducts = async () => {
    //loading.value = true
    try {
        const response = await axios.get('http://127.0.0.1:8000/api/products');
        
        let datos = response.data
        products.value = response.data;
        /*datos.forEach(element => {
            products.id.push(element.id)
            products.name.push(element.name)
        });*/
    } catch (error) {
        console.error('Error al obtener los productos:', error.message);
    }
    //loading.value = false
}

const refresh = () => {
    getProducts()
}


onMounted(() => refresh());

</script>
