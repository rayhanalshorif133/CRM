/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
         apiKey: "AIzaSyDurnWw_YcrZGhHqW8YYVoaFATeNYQHfik",
  authDomain: "push-notification-29dac.firebaseapp.com",
  projectId: "push-notification-29dac",
  storageBucket: "push-notification-29dac.appspot.com",
  messagingSenderId: "572029365357",
  appId: "1:572029365357:web:2fbc4b27c430a7d06ee364",
  measurementId: "G-0GV5K18XYY"
    });

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
