importScripts("https://www.gstatic.com/firebasejs/4.2.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/4.2.0/firebase-messaging.js");

var config = {
    apiKey: "AIzaSyCvQ5U6FFNR-JJ199KvqaqLUL0b0PcpTFU",
    authDomain: "alrateb-a6ea5.firebaseapp.com",
    databaseURL: "https://alrateb-a6ea5.firebaseio.com",
    projectId: "alrateb-a6ea5",
    storageBucket: "",
    messagingSenderId: "65118355243"
};
firebase.initializeApp(config);
// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();
