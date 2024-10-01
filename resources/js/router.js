import { createRouter, createWebHistory } from 'vue-router';
import SpaceshipList from './components/SpaceshipList.vue';
import AddSpaceship from './components/SpaceshipAdd.vue';

const routes = [
    {
        path: '/',
        name: 'SpaceshipList',
        component: SpaceshipList,
    },
    {
        path: '/add-spaceship',
        name: 'AddSpaceship',
        component: AddSpaceship,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
