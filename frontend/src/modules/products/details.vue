<template>
    <InventoryTable 
    :products="product"
    :movements="movements"
    />
</template>

<script setup>
import { onMounted, reactive, ref } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import InventoryTable from '@/components/tables/InventoryTable.vue';

const route = useRoute();
const productId = route.params.id;
//const product = ref([])

const product = reactive({

    name       : '',
    costing_method: null,

})
/*const movements = reactive({

    quantity        : [],
    unit_cost       : [],
    entry_date      : [],
    entry_type      : [],

})*/

const movements = ref([]);

const getOneProduct = async (id) => {
    //loading.value = true
    try {
        const response = await axios.get(`http://127.0.0.1:8000/api/products/${id}`);

        let datos = response.data
        console.log(datos)
        product.name = datos.name
        product.costing_method = datos.inventory[0].costing_method
        console.log(product)

        datos.inventory_lots.forEach(element => {
            element.movements.forEach(subElement => {
                movements.value.push({
                    quantity: subElement.quantity,
                    unit_cost: element.unit_cost,
                    entry_date: subElement.movement_date,
                    entry_type: subElement.movement_type
                });
            })
        });


        /*datos.inventory_lots.forEach(element => {
            movements.unit_cost.push(element.unit_cost)
            console.log(element.movements)
            element.movements.forEach(subElement => {
                console.log(subElement)
                movements.quantity.push(subElement.quantity)
                movements.entry_type.push(subElement.movement_type)
                movements.entry_date.push(subElement.movement_date)
            })
        });*/
        console.log(movements)
    } catch (error) {
        console.error('Error al obtener los productos:', error.message);
    }
    //loading.value = false
}




onMounted(() => {getOneProduct(productId)})
</script>