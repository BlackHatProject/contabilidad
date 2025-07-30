<template>
    <h1>{{ props.products.name }}</h1>
    <div class="card p-4">
      <table class="table">
        <thead>
            <tr>
                <th colspan="2"></th>
                <th colspan="3">Entradas</th>
                <th colspan="3">Salidas</th>
                <th colspan="3">Total</th>
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
                <td>{{ movement.entry_date }}</td>
                <td>{{ movement.entry_type }}</td>
                <!-- Entradas -->
                <td >{{ movement.quantity }}</td>
                <td v-if="movement.entry_type === 'ENTRADA'">{{ movement.unit_cost }}</td>
                <td v-if="movement.entry_type === 'ENTRADA'">{{ movement.quantity * movement.unit_cost }}</td>
                <!-- Salidas -->
                <td></td>
                <td></td>
                <td></td>
                <!-- Totales (puedes mostrarlo para ambos o calcular acumulados si lo prefieres) -->
                <td>{{ movement.quantity }}</td>
                <td>{{ movement.unit_cost }}</td>
                <td>{{ movement.quantity * movement.unit_cost }}</td>
            </tr>

            <tr v-else>
                <td>{{ movement.entry_date }}</td>
                <td>{{ movement.entry_type }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td v-if="movement.entry_type === 'SALIDA'">{{ movement.quantity }}</td>
                <td v-if="movement.entry_type === 'SALIDA'">{{ movement.unit_cost }}</td>
                <td v-if="movement.entry_type === 'SALIDA'">{{ movement.quantity * movement.unit_cost }}</td>
                <td>{{ movement.quantity }}</td>
                <td>{{ movement.unit_cost }}</td>
                <td>{{ movement.quantity * movement.unit_cost }}</td>
            </tr>
        </tbody>
      </table>
  </div>


</template>

<script setup>

import { defineProps } from 'vue';

const props = defineProps({
  products: {type: Object, required: true},
  movements: {type: Object, required: true},
});
console.log(props.products)
console.log(props.movements)

</script>