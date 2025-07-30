<template>

    <nav class="navbar navbar-expand-lg navbar-light bg-light h-100">

        <div class="p-4 flex flex-column">
            <RouterLink class="navbar-brand" href="#">Navbar</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav flex flex-column">

                    <li class="nav-item">
                        <RouterLink class="mx-2 p-2" to="/products">Productos</RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="mx-2 p-2" to="/inventory">Inventario</RouterLink>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><RouterLink class="mx-2 p-2" to="/products">Productos</RouterLink></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inventario
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><RouterLink class="mx-2 p-2" to="/inventory">Inventario</RouterLink></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>

<style scoped>

</style>