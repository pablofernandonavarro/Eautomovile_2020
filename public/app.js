

require('./bootstrap');

window.Vue = require('vue');


Vue.component('note-component', require('./components/NoteComponent.vue').default);



const app = new Vue({
    el: '#app',
});
