### Installation

```bash
$ composer install
$ yarn install
$ php -S localhost:8001 -t public
http://localhost:8001/
http://localhost:8001/fr
http://localhost:8001/ru
```


[1]: https://firebase.google.com/docs/cloud-messaging/js/client
[2]: https://firebase.google.com/docs/web/setup#add-sdk-and-initialize

```
https://console.firebase.google.com/?pli=1
https://console.firebase.google.com/project/sprutfirebase/overview
```


```
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
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
const analytics = getAnalytics(app);
```



```bash 
$ npm install firebase || yarn add firebase
$ npm run watch
```

[1]: https://console.firebase.google.com/project/sprutfirebase/settings/cloudmessaging/web:MzBmNThjMjMtYTk4Yy00OThhLThiNzktNWFmMjFmZTBhMjBm
