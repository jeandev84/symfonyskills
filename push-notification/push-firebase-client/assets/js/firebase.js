// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";

// import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyCk9A_a3bKwcmO9eTzs5CGQHoEm9qL3cQM",
    authDomain: "sprutfirebase.firebaseapp.com",
    projectId: "sprutfirebase",
    storageBucket: "sprutfirebase.appspot.com",
    messagingSenderId: "992994472109",
    appId: "1:992994472109:web:af6712e8d1627dbecc5624",
    measurementId: "G-5R3E1V1W9P"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);

// Initialize Firebase Cloud Messaging and get a reference to the service
const messaging = getMessaging(app);


(() => {

    console.log('Requesting permission...')
    Notification.requestPermission().then((permission) => {
         if (permission === 'granted') {
             console.log('Notification permission granted')
         } else {
             console.log('Notification permission rejected!')
         }
    })

})()


const vapidKey = "BJQBvYavjAF_tnrasM97CmT9KYUKWiR0DqsyNTJYDif-QZnaxusHl07ec7rTpjLYv26dWJ_AfIHrP_vzddQh_M0";

getToken(messaging, {vapidKey: vapidKey}).then((token) => {

    if (token) {
        console.log(token)
        ///ajax///send the token to the backend in order to save it related to the user. (push-firebase-engine)
    }
});