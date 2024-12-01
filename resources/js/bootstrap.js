import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// DARK MODE TOGGLE BUTTON
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM loaded with JavaScript');
    hljs.highlightAll();
    document.documentElement.classList.remove('dark');
});

/*
let colorTheme = localStorage.getItem('color-theme');
if (colorTheme === 'undefined' || colorTheme === null) {
    localStorage.setItem('color-theme', 'light');
    colorTheme = 'light';
}

if (colorTheme === 'dark') {
    // document.documentElement.classList.add('dark');
    document.documentElement.classList.remove('dark');
} else {
    document.documentElement.classList.remove('dark');
}

if (localStorage.getItem('color-theme') === 'dark') {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

let themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function () {
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
});*/
