<template>
    <horizontalMenu></horizontalMenu>
    <div class="container-fluid">
        <div class="mb-4 p-2">
            
        </div>
        <div class="row">
            <div class="col-12">
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
