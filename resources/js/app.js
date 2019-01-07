require('./bootstrap');

window.Chart = require('chart.js');

window.Echo.private('members')
    .listen('\\App\\Events\\WeightUpdated', (e) => {
        if (window.location.href.endsWith('/home')) {
            window.location.reload();
        }
    });
