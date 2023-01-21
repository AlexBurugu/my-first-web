//making the chats dynamic
//get the form
var form = document.querySelector('.typing-area'),
    //get the inpu
    inputField = form.querySelector('.input-field'),
    //get the btn
    sendBtn = form.querySelector('button'),
    chatBox = document.querySelector('.chat-box');

//prevent the fprm from submitting
form.onsubmit = (e) => {
        e.preventDefault();
    } //to prevent errors to insert msg in the db table
    //run a function when th btn is clicked

sendBtn.onclick = () => {
        //testing console.log('hello');
        //onclicking the form is submited
        //start ajax when the button is clicked
        //1.start xml object
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/insert-chat.php", true); //xhr.open takes many parameters bt we only pass metho,url and async...method "POST" is used to send data
        xhr.onload = () => {
                //do what the file in the url is suppose to do
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        inputField.value = ""; //leave the textarea blank when the message is inserted in the db table
                        scrollBottom();
                        //let data = xhr.response;
                        /*testing console.log(data);
                        if (data == "success") {
                            location.href = "users.php";
                        } else {
                            error.textContent = data;
                            error.style.opacity = "1";
                        }*/
                    }
                }

            }
            //send th form data through ajax to php
        let formData = new FormData(form); //creating new formData object
        xhr.send(formData); //send form data o php
    }
    //stop "scrollBottom() funcyion" whenthe user tries to scroll to the top
chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
        //get users-message
        var usersList = document.querySelector('.users-list');
        //testing console.log('hello');
        //onclicking the form is submited
        //start ajax when the button is clicked
        //1.start xml object
        let xhr = new XMLHttpRequest();
        //use GET method to receive dat not to send
        xhr.open("POST", "php/get-chat.php", true); //xhr.open takes many parameters bt we only pass metho,url and async...method "POST" is used to send data
        xhr.onload = () => {
                //do what the file in the url is suppose to do
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        //testing console.log(data);
                        // usersList.innerHTML = data;
                        chatBox.innerHTML = data;
                        if (!chatBox.classList.contains("active")) { //if the active class does not contain chatbox the scroll to bottom function will execute
                            scrollBottom();
                        }

                    }
                }

            }
            //send th form data through ajax to php
        let formData = new FormData(form); //creating new formData object
        xhr.send(formData); //send form data o php

    }, 500) //runs frequently after evry 500ms

//scroll the chats automatically to the bottom
function scrollBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
    //trying to scroll up it won't becoz ajax is calling after evry 500ms so it auto.. scrolllrd to the bottom
}
/*emojichat
$(document).ready(function() {
    $("#textarea").emojioneArea({
        pickerPostion: "top"
    });
});*/