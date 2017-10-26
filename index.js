/**
 * Created by apple on 2017/6/9.
 */

var serverData, statusDiv;
var SERVER_URL = "index.php";
window.onload = function () {
    serverData = document.getElementById("serverData");
    statusDiv = document.getElementById("statusDiv");
    startListenServer();
}

function startListenServer() {
    statusDiv.innerHTML = "start connect server.....";
    var es = new EventSource(SERVER_URL);
    es.addEventListener("newDate", newDateHandler);
    es.onopen = openHandler;
    es.onerror = errorHandler;
    es.onmessage = messageHandler;
}

function openHandler(e) {
    statusDiv.innerHTML = "Server open";
}

function errorHandler(e) {
    statusDiv.innerHTML = "error";
}

function messageHandler(e) {
    serverData.innerHTML = e.data;
}

function newDateHandler(e) {
    serverData.innerHTML = e.data;
}