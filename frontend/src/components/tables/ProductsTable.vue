<template>
    <table class="table">

        <thead>

            <tr>
                <th scope="col">id</th>
                <th scope="col">productos</th>
                <th scope="col">acciones</th>
            </tr>

        </thead>

        <tbody>
            <tr v-for="product in props.products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td class="d-flex">
                    <RouterLink :to="`/product/${product.id}`">
                        <i class="bi bi-eye fs-5" style="margin-right: .5em;"></i>
                    </RouterLink>
                    <i class="bi bi-pencil fs-5"></i>
                </td>
            </tr>

        </tbody>

    </table>
</template>

<script setup>
import { defineProps } from 'vue';
import { RouterLink } from 'vue-router';

const props = defineProps({
  products: {type: Object, required: true},
  //loading: { type: Boolean, default: false },
});

// hacer que la tabla tenga una carga antes de los datos
</script>