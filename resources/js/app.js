/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-main', require('./components/admin/AppMain.vue').default);
// Vue.component('nav-bar', require('./components/admin/NavBar.vue').default);
// Vue.component('side-bar', require('./components/admin/SideBar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './routes/routes'
import Vuex from 'vuex';
import Axios from 'axios';
import BootstrapVue from 'bootstrap-vue';
import ElementUI from 'element-ui';
// import store from './store';
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';
Vue.use(BootstrapVue);
Vue.use(ElementUI);

// window.default_locale = "{{ config('app.locale') }}";
// window.fallback_locale = "{{ config('app.fallback_locale') }}";
// window.messages ;
import Lang from 'lang.js';
// import VueI18n from 'vue-i18n';
// Vue.use(VueI18n);

// Vue.prototype.trans = new Lang({messages, locale: default_locale, fallback: fallback_locale});


Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        userToken: null,
        user: null,
        EditedPost: {},
        visitedViews: [],
        cachedViews: [],
        routes: [],
        addRoutes: [],
    },
    getters: { //center
        visitedViews: state => state.visitedViews,
        cachedViews: state => state.cachedViews,
        routes: state => state.routes,
        isLogged(state) {
            return !!state.userToken;
        },
        isAdmin(state) {
            if (state.user) {
                return state.user.is_admin;
            }
            return null;
        }
    },
    mutations: {
        setUserToken(state, userToken) {
            state.userToken = userToken;
            localStorage.setItem('userToken', JSON.stringify(userToken));
            axios.defaults.headers.common.Authorization = `Bearer ${userToken}`;
        },
        removeUserToken(state) {

            state.userToken = null;
            localStorage.removeItem('userToken');
        },
        setUser(state, user) {
            state.user = user;
        },
        logout(state) {
            state.userToken = null;
            localStorage.removeItem('userToken');
            window.location.pathname = "/";
        },
        EditPost(state, post) {
            state.EditedPost = post;
        },
        SET_ROUTES: (state, routes) => {
            state.addRoutes = routes;
            state.routes = router.concat(routes);
        },
        ADD_VISITED_VIEW: (state, view) => {
            if (state.visitedViews.some(v => v.path === view.path)) {
                return;
            }

            state.visitedViews.push(
                Object.assign(
                    {},
                    view,
                    {
                        title: view.meta.title || 'no00-name',
                    }
                )
            );
        },
        ADD_CACHED_VIEW: (state, view) => {
            if (state.cachedViews.includes(view.name)) {
                return;
            }

            if (!view.meta.noCache) {
                state.cachedViews.push(view.name);
            }
        },

        DEL_VISITED_VIEW: (state, view) => {
            for (const [i, v] of state.visitedViews.entries()) {
                if (v.path === view.path) {
                    state.visitedViews.splice(i, 1);
                    break;
                }
            }
        },
        DEL_CACHED_VIEW: (state, view) => {
            for (const i of state.cachedViews) {
                if (i === view.name) {
                    const index = state.cachedViews.indexOf(i);
                    state.cachedViews.splice(index, 1);
                    break;
                }
            }
        },

        DEL_OTHERS_VISITED_VIEWS: (state, view) => {
            state.visitedViews = state.visitedViews.filter(v => {
                return v.meta.affix || v.path === view.path;
            });
        },
        DEL_OTHERS_CACHED_VIEWS: (state, view) => {
            for (const i of state.cachedViews) {
                if (i === view.name) {
                    const index = state.cachedViews.indexOf(i);
                    state.cachedViews = state.cachedViews.slice(index, index + 1);
                    break;
                }
            }
        },

        DEL_ALL_VISITED_VIEWS: state => {
            // keep affix tags
            const affixTags = state.visitedViews.filter(tag => tag.meta.affix);
            state.visitedViews = affixTags;
        },
        DEL_ALL_CACHED_VIEWS: state => {
            state.cachedViews = [];
        },

        UPDATE_VISITED_VIEW: (state, view) => {
            for (let v of state.visitedViews) {
                if (v.path === view.path) {
                    v = Object.assign(v, view);
                    break;
                }
            }
        },
    },
    actions: {
        addView({ dispatch }, view) {
            dispatch('addVisitedView', view);
            dispatch('addCachedView', view);
        },
        addVisitedView({ commit }, view) {
            commit('ADD_VISITED_VIEW', view);
        },
        addCachedView({ commit }, view) {
            commit('ADD_CACHED_VIEW', view);
        },

        delView({ dispatch, state }, view) {
            return new Promise(resolve => {
                dispatch('delVisitedView', view);
                dispatch('delCachedView', view);
                resolve({
                    visitedViews: [...state.visitedViews],
                    cachedViews: [...state.cachedViews],
                });
            });
        },
        delVisitedView({ commit, state }, view) {
            return new Promise(resolve => {
                commit('DEL_VISITED_VIEW', view);
                resolve([...state.visitedViews]);
            });
        },
        delCachedView({ commit, state }, view) {
            return new Promise(resolve => {
                commit('DEL_CACHED_VIEW', view);
                resolve([...state.cachedViews]);
            });
        },

        delOthersViews({ dispatch, state }, view) {
            return new Promise(resolve => {
                dispatch('delOthersVisitedViews', view);
                dispatch('delOthersCachedViews', view);
                resolve({
                    visitedViews: [...state.visitedViews],
                    cachedViews: [...state.cachedViews],
                });
            });
        },
        delOthersVisitedViews({ commit, state }, view) {
            return new Promise(resolve => {
                commit('DEL_OTHERS_VISITED_VIEWS', view);
                resolve([...state.visitedViews]);
            });
        },
        delOthersCachedViews({ commit, state }, view) {
            return new Promise(resolve => {
                commit('DEL_OTHERS_CACHED_VIEWS', view);
                resolve([...state.cachedViews]);
            });
        },

        delAllViews({ dispatch, state }, view) {
            return new Promise(resolve => {
                dispatch('delAllVisitedViews', view);
                dispatch('delAllCachedViews', view);
                resolve({
                    visitedViews: [...state.visitedViews],
                    cachedViews: [...state.cachedViews],
                });
            });
        },
        delAllVisitedViews({ commit, state }) {
            return new Promise(resolve => {
                commit('DEL_ALL_VISITED_VIEWS');
                resolve([...state.visitedViews]);
            });
        },
        delAllCachedViews({ commit, state }) {
            return new Promise(resolve => {
                commit('DEL_ALL_CACHED_VIEWS');
                resolve([...state.cachedViews]);
            });
        },

        updateVisitedView({ commit }, view) {
            commit('UPDATE_VISITED_VIEW', view);
        },

        LoginUser({commit}, payload) {
            axios.post('/api/login', payload)
                .then(res => {
                    console.log(res);
                    commit('setUserToken', res.data.token);
                    axios.get('/api/user')
                        .then(res => {
                            //console.log(res.data);
                            commit('setUser', res.data.user);
                        });
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
});

const app = new Vue({
    el: '#app',
    router,
    store:store,
});


import Echo from "laravel-echo"

window.io = require('socket.io-client');

// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname + ':6001'
// });

