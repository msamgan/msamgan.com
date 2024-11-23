import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded with JavaScript');
    hljs.highlightAll();
});
