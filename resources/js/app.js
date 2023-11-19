import './bootstrap';
import { createApp } from 'vue';
import DriverIndex from "./components/DriverIndex.vue";
//import * as all from 'vue'
//console.log(all)

const app = createApp({});

app.component('driver-index', DriverIndex);

app.mount('#aptest');
import IMask from 'imask';
let phoneInput = document.querySelector('.tel');
const phoneMask = new IMask(phoneInput, {
    mask: "+{7}(000)000-00-00",
});

// import '../../node_modules/vue/dist/vue';
// import Vue from '';




