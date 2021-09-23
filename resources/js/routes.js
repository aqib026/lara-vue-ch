import Owners from './components/Owners.vue';
import Addresses from './components/Addresses.vue';
import Cars from './components/Cars.vue';

export const routes = [
    {
        name: 'owners',
        path: '/owners',
        component: Owners
    },
    {
        name: 'addresses',
        path: '/addresses',
        component: Addresses
    },
    {
        name: 'cars',
        path: '/cars',
        component: Cars
    }
];
