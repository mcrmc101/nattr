self.addEventListener('push', function (event) {
    if (event.data) {
        const data = event.data.json();
        self.registration.showNotification(data.title, {
            body: data.body,
            icon: '/icons/iso/512.png'
        });
    }
});

self.addEventListener('install', function (event) {
    console.log('Service Worker installed');
});

self.addEventListener('activate', function (event) {
    console.log('Service Worker activated');
});

self.addEventListener('pushsubscriptionchange', function (event) {
    console.log('Push subscription changed', event);
});