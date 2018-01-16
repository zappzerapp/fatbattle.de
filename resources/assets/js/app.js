try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

window.Chart = require('chart.js');