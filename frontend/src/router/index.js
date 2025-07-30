import { createMemoryHistory, createRouter } from 'vue-router'

import Home from '@/modules/Home.vue';
import Products from '@/modules/products/index.vue'
import detailsProduct from '@/modules/products/details.vue';
import Inventory from '@/modules/inventory/index.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/products', component: Products },
  { path: '/product/:id', component: detailsProduct },
  { path: '/inventory', component: Inventory },
]

const router = createRouter({
  history: createMemoryHistory(),
  routes,
})

export default router;