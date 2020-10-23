import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../components/admin/Home.vue'
// import PostDetails from '../components/PostDetails.vue';
import Categories from '../components/admin/Categories.vue';
import CategoryCreate from '../components/admin/CategoryCreate.vue';
import CategoryEdit from '../components/admin/CategoryEdit.vue';
import GlobalNumbering from '../components/admin/GlobalNumbering.vue';
import AddAccount from '../components/admin/AddAccount.vue';
import JournalVoucher from '../components/admin/JournalVoucher.vue';
import AddRole from '../components/admin/AddRole.vue';
import AddUser from '../components/admin/AddUser.vue';
// import AdminIndex from '../components/admin/AdminIndex.vue';

const routes = [
    { path: '/admin1/index1', component: Home, name: 'Dashboard' },
    {
        path: '/admin1/categories/index',
        component: Categories,
        name: 'Categories',
        children: [
            {
                path: 'index',
                component: () => Categories,
                name: 'Categories',
                meta: { title: 'Categories', icon: 'clipboard', roles: [] },
            },
        ]
    },
    { path: '/admin1/categories/create', component: CategoryCreate, name: 'Add Category' },
    { path: '/admin1/categories/edit/:id', component: CategoryEdit, name: 'Edit Category' },
    { path: '/admin1/setting/global_numbering', component: GlobalNumbering, name: 'Global Numbering' },
    { path: '/admin1/setting/add_account', component: AddAccount, name: 'Add Account' },
    { path: '/admin1/setting/journal_voucher', component: JournalVoucher, name: 'Journal Voucher' },
    { path: '/admin1/setting/add_role', component: AddRole, name: 'Add Role' },
    { path: '/admin1/setting/add_user', component: AddUser, name: 'Add User' },
    // { path: '/admin', component: AdminIndex, name: 'AdminIndex' },
];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
});

export default router;
