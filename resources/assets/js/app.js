try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

window.Chart = require('chart.js');

import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: window.pusherKey,
    cluster: 'eu',
    encrypted: true,
});

window.Echo.private('members')
    .listen('\\App\\Events\\WeightUpdated', (e) => {
        if (window.location.href.endsWith('/home')) {
            window.location.reload();
        }
    });
