<template>
    

        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th colspan="3" class="text-center">Entradas</th>
                        <th colspan="3" class="text-center">Salidas</th>
                        <th colspan="3" class="text-center">Total</th>
                    </tr>
                    <tr>
                        <th scope="col">fecha</th>
                        <th scope="col">detalles</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">costo unitario</th>
                        <th scope="col">costo total</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">costo unitario</th>
                        <th scope="col">costo total</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">costo unitario</th>
                        <th scope="col">costo total</th>
                    </tr>
                </thead>
                <tbody v-for="(movement, index) in props.movements" :key="index">

                    <tr v-if="movement.entry_type === 'ENTRADA'">
                        <td>{{ formatDate(movement.entry_date) }}</td>
                        <td>{{ movement.entry_type }} (<span class="text-primary fs-6">{{ movement.quantity }}</span>)</td>
                        <!-- Entradas -->
                        <td>{{ movement.quantity }}</td>
                        <td>{{ parseFloat(movement.unit_cost).toFixed(2) }}</td>
                        <td>{{ parseInt(movement.quantity) * parseFloat(movement.unit_cost).toFixed(2) }}</td>
                        <!-- Salidas -->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!-- Totales (puedes mostrarlo para ambos o calcular acumulados si lo prefieres) -->
                        <td>{{ movement.quantity }}</td>
                        <td>{{ parseFloat(movement.unit_cost).toFixed(2) }}</td>
                        <td>{{ parseInt(movement.quantity) * parseFloat(movement.unit_cost).toFixed(2) }}</td>
                    </tr>

                    <tr v-else>
                        <td>{{ formatDate(movement.entry_date) }}</td>
                        <td>{{ movement.entry_type }} (<span class="text-danger fs-6">{{ movement.quantity }}</span>)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ movement.quantity }}</td>
                        <td>{{ parseFloat(movement.unit_cost).toFixed(2) }}</td>
                        <td>{{ movement.quantity * movement.unit_cost }}</td>
                        <td>{{ movement.quantity }}</td>
                        <td>{{ parseFloat(movement.unit_cost).toFixed(2) }}</td>
                        <td>{{ parseInt(movement.quantity) * parseFloat(movement.unit_cost).toFixed(2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


  

</template>

<script setup>

import { defineProps, computed } from 'vue';

const props = defineProps({
  products: {type: Object, required: true},
  movements: {type: Object, required: true},
});
console.log(props.products)
console.log(props.movements)

function formatDate(fecha) {
  const date = new Date(fecha);
  const dia = date.getDate().toString().padStart(2, '0');
  const mes = (date.getMonth() + 1).toString().padStart(2, '0');
  return `${dia}/${mes}`;
}

const acumulador = computed((quantity) =>{return props.movements.quantity - quantity})
</script>