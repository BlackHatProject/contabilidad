<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 p-2">
                    <horizontalMenu></horizontalMenu>
                </div>
                <div class="container">
                    <RouterView></RouterView>
                </div>
            </div>
        </div>
    </div>
    
    
</template>

<script setup>

import horizontalMenu from '@/components/layout/horizontalMenu.vue';
import { RouterView } from "vue-router";

</script>

<style scoped>

</style>
