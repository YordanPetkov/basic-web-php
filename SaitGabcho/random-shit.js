var myVideo = document.getElementById("video1");



function LoggedIn() {
    document.getElementById("video-page-log-text").innerHTML="<strong>You must logged in before watch our videos!</strong>";
}

function Register(){
    document.getElementById("video-page-reg-text").innerHTML="<strong>You must registered before watch our videos!</strong>";
}

function WelcomeUser(nickname)
{
    document.getElementById("form-input").style.visibility="hidden";
    document.getElementById("form-title").innerHTML="Hello";


}


function playPause() {
    if (myVideo.paused) myVideo.play();
    else myVideo.pause();
    }

function makeBig() {
    myVideo.style.width = 560;
}

function makeSmall() {
    myVideo.style.width = 320;
}

function makeNormal() {
    myVideo.style.width = 420;
}