const CACHE_NAME = 'currency-tracker-cache';
const DATA_CACHE_NAME = 'data-cache-v1';
const API_URL = 'https://dev.ailservers.com/sib-currency-tracker-backend/api/data';
// Install the service worker and cache static assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll([
                '/',
                '/index.html',
                '/src/main.jsx',
                '/src/App.jsx',
                '/assets/css/style.css',
                '/App.css',
            ]);
        })
    );
    self.skipWaiting();
});
// Activate the service worker
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keyList) => {
            return Promise.all(
                keyList.map((key) => {
                    if (key !== CACHE_NAME && key !== DATA_CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        })
    );
    self.clients.claim();
});
// Fetch event to handle caching API responses and image assets
self.addEventListener('fetch', (event) => {
    // Handle API requests
    if (event.request.url.includes(API_URL)) {
        event.respondWith(
            caches.open(DATA_CACHE_NAME).then((cache) => {
                return fetch(event.request)
                    .then((response) => {
                        if (response.status === 200) {
                            cache.put(event.request.url, response.clone());
                        }
                        return response;
                    })
                    .catch(() => {
                        return cache.match(event.request);
                    });
            })
        );
    } else if (event.request.destination === 'image') {
        // Handle image requests by caching them
        event.respondWith(
            caches.open(CACHE_NAME).then((cache) => {
                return cache.match(event.request).then((response) => {
                    return response || fetch(event.request).then((networkResponse) => {
                        cache.put(event.request, networkResponse.clone());
                        return networkResponse;
                    });
                });
            })
        );
    } else {
        // Handle non-API, non-image requests (like CSS, JS, HTML)
        event.respondWith(
            caches.match(event.request).then((response) => {
                return response || fetch(event.request);
            })
        );
    }
});
