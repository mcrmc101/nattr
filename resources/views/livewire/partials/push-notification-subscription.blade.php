<div>
    <button id="push-subscription-button" onclick="initializePushNotifications()">
        Subscribe to Push Notifications
    </button>
    <input type="hidden" id="vKey" value="{{ config('app.vapid.public') }}">
</div>

<script>
    async function registerServiceWorker() {
        try {
            const registration = await navigator.serviceWorker.register('/service-worker.js');
            console.log('Service Worker registered successfully:', registration);
            return registration;
        } catch (error) {
            console.error('Service Worker registration failed:', error);
            throw error;
        }
    }

    async function subscribeUserToPush(registration) {
        let vKey = document.getElementById('vKey').value
        const subscribeOptions = {
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(vKey)
        };

        try {
            const subscription = await registration.pushManager.subscribe(subscribeOptions);
            console.log('User is subscribed:', subscription);
            return subscription;
        } catch (error) {
            console.error('Failed to subscribe the user:', error);
            throw error;
        }
    }

    async function initializePushNotifications() {
        if (!('Notification' in window) || !('serviceWorker' in navigator)) {
            alert('This browser does not support notifications');
            return;
        }

        try {
            const permission = await Notification.requestPermission();
            if (permission !== 'granted') {
                throw new Error('Permission not granted for Notification');
            }

            const registration = await registerServiceWorker();

            // Wait for the Service Worker to be ready
            await navigator.serviceWorker.ready;

            const subscription = await subscribeUserToPush(registration);

            await @this.subscribe(
                subscription.endpoint,
                btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))),
                btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth'))))
            );

            console.log('Push notification subscription successful');
        } catch (error) {
            console.error('Error:', error);
        }
    }

    document.addEventListener('livewire:load', function() {
        Livewire.on('subscriptionSaved', () => {
            alert('You have successfully subscribed to push notifications!');
        });
    });

    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/');

        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);

        for (var i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }
</script>
