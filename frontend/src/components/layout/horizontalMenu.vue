<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary h-100">
        <div class="container-fluid">
            <RouterLink class="navbar-brand text-light" to="/">Navbar</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav flex align-items-center">
                    <!--li class="nav-item">
                    <RouterLink class="mx-2 p-2" to="/">Home</RouterLink>
                    </li-->
                    <li class="nav-item">
                    <RouterLink class="mx-2 p-2 text-light" style="text-decoration:none" to="/">Productos</RouterLink>
                    </li>
                    <!--li class="nav-item">
                    <RouterLink class="mx-2 p-2" to="/inventory">Inventario</RouterLink>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li-->
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { RouterLink } from 'vue-router';
</script>
