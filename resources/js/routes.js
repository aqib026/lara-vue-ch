import Owners from './components/Owners.vue';
import Addresses from './components/Addresses.vue';
import Cars from './components/Cars.vue';
import ViewDetail from './components/ViewDetail.vue';
import EditDetail from './components/EditDetail.vue';

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
    },
    {
        name: 'detail',
        path: '/detail/:type/:id',
        component: ViewDetail
    },
    {
        name: 'edit',
        path: '/edit/:type/:id',
        component: EditDetail
    }

];
