//lets send sign in details using js
// testingconsole.log("hello");
//getting the form sign up form
var form = document.querySelector('.signup form'),
    //get the siign in btn
    letBtn = form.querySelector('.button input'),
    error = form.querySelector('.error-text');
//prevent the fprm from submitting
form.onsubmit = (e) => {
        e.preventDefault();
    }
    //run a function when th btn is clicked
letBtn.onclick = () => {
    //testing console.log('hello');
    //onclicking the form is submited
    //start ajax when the button is clicked
    //1.start xml object
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true); //xhr.open takes many parameters bt we only pass metho,url and async...method "POST" is used to send data
    xhr.onload = () => {
            //do what the file in the url is suppose to do
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    //testing console.log(data);
                    if (data == "success") {
                        location.href = "loginchat.php";
                    } else {
                        error.textContent = data;
                        error.style.opacity = "1";
                    }
                }
            }

        }
        //send th form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //send form data o php
}