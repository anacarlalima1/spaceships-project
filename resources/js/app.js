import { createApp } from 'vue';
import SpaceshipList from './components/SpaceshipList.vue';

const app = createApp({});

app.component('spaceship-list', SpaceshipList);

app.mount('#app');
