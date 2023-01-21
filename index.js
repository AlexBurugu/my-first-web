//autotype functions
const textEl = document.getElementById('text')
    //const speedEl = document.getElementById('speed')
const text = 'Share the web URL? The url is provided below.'
let idx = 1

//let speed = 300 / speedEl.value
let speed = 150

writeText()

function writeText() {
    textEl.innerText = text.slice(0, idx)

    idx++

    if (idx > text.length) {
        idx = 1
    }

    setTimeout(writeText, speed)

}
//speedElement.addEventListener('input', (e) => speedType = 400 / e.target.value)

function copyText() {
    //get the element containing the url
    var url = document.getElementById("url");
    //select the url 
    url.select();
    //set a range of the text to br copied
    url.setSelectionRange(0, 100);
    //execute the command to copy the url
    document.execCommand("Copy");

    //change the tooltip-content when th button is clicked
    document.getElementById('tooltip-text').innerHTML = "Copied";
}

function mouseOut() {
    document.getElementById('tooltip-text').innerHTML = "Copy URL.";
}
//load the site

function loaderSpin() {
    var y = setTimeout(showWebContent, 3000)
}
//scroll-indicator-container-content
window.onscroll = function() {
    myFunction()
}

function myFunction() {
    var windowScroll = document.documentElement.scrollTop;
    var windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (windowScroll / windowHeight) * 100;
    document.getElementById("scroll-bar").style.width = scrolled + "%";
}

function showWebContent() {
    document.getElementById('loader-site').style.display = "none";
    document.getElementById('main-web-code').style.display = "block";
}
//fullwidth navbar
function openNAv() {

    document.getElementById("home-page-navbars").style.width = "100%";
}

function myCrossBtn() {

    document.getElementById("home-page-navbars").style.width = "0";
}

//homepage content
var dateAndTym = new Date();
document.getElementById('date-time').innerHTML = dateAndTym;

//service form..........................................................................................
function serviceForm() {
    document.getElementById('services-form').style.display = "block";
    document.getElementById('service-form-page').innerHTML = "see below";

}

function showIcon() {
    var serviceBtnform = document.querySelector('.fa-forward');
    if (serviceBtnform.contains("fa-forward")) {
        serviceBtnform.classList.replace("fa-forward", "fa-pause");
    }
}

function showSuccess() {
    var textCard = document.getElementById('show-message-box');
    textCard.className = "display";
    setTimeout(
        function() {
            textCard.className = textCard.className.replace("display", "");
        }, 3000
    );
}
//like-coomment-page
let thumbsup = document.querySelector('#like-comment-thumbs-up');
let thumbsdown = document.querySelector('#like-comment-thumbs-down');
let hearticon = document.querySelector('#like-comment-heart-icon');
let thumbsupinput = document.querySelector('#input-like');
let thumbsdowninput = document.querySelector('#input-dislike');
let heartinput = document.querySelector('#input-heart');

thumbsup.addEventListener('click', () => {
    thumbsupinput.value = parseInt(thumbsupinput.value) + 1;
    thumbsupinput.style.color = "#064BFB";
})
thumbsdown.addEventListener('click', () => {
    thumbsdowninput.value = parseInt(thumbsdowninput.value) + 1;
    thumbsdowninput.style.color = "#064BFB";
})
hearticon.addEventListener('click', () => {
    heartinput.value = parseInt(heartinput.value) + 1;
    heartinput.style.color = "#064BFB";
})

//comment area

//create a cross btn at the end of the comment
var endli = document.getElementsByTagName("li");
var i;
for (i = 0; i < endli.length; i++) {
    var crossspan = document.createElement("SPAN");
    var crossbutton = document.createTextNode("\u00D7");
    crossspan.className = "close";
    crossspan.appendChild(crossbutton);
    endli[i].appendChild(crossspan);
}
//hide the li when u click the cross button
var crossbtn = document.getElementsByClassName("close");
for (i = 0; i < crossbtn.length; i++) {
    crossbtn[i].onclick = function() {
        var currentli = this.parentElement;
        currentli.style.display = "none";
    }
}
//create a new list when the upload button is clicked
function addComment() {
    var newli = document.createElement("li");
    var newcomment = document.getElementById("textarea-comment").value;
    //u need to attach this new comment at the end
    var comment = document.createTextNode(newcomment);
    newli.appendChild(comment);
    //alert the user does not comment and want to upload
    if (newcomment === "") {
        alert("You haven't commentted...");
    } else {
        document.getElementById("comment-url").appendChild(newli);
    }
    //then add the crossbtn on the new comment
    document.getElementById("textarea-comment").value = "";
    var newspan = document.createElement("SPAN");
    var newcrossbtn = document.createTextNode("\u00D7");
    newspan.className = "close";
    newspan.appendChild(newcrossbtn);
    newli.appendChild(newspan);
    for (i = 0; i < crossbtn.length; i++) {
        crossbtn[i].onclick = function() {
            var currentli = this.parentElement;
            currentli.style.display = "none";
        }
    }
}
//////////////comment area..............................................................................

const form = document.getElementById('comment-form')
const input = document.getElementById('input')
const todosUL = document.getElementById('todos')

const todos = JSON.parse(localStorage.getItem('todos'))

if (todos) {
    todos.forEach(todo => addTodo(todo))
}

form.addEventListener('submit', (e) => {
    e.preventDefault()

    addTodo()
})

function addTodo(todo) {
    let todoText = input.value

    if (todo) {
        todoText = todo.text
    }

    if (todoText) {
        const todoEl = document.createElement('li')
        if (todo && todo.completed) {
            todoEl.classList.add('completed')
        }

        todoEl.innerText = todoText

        todoEl.addEventListener('click', () => {
            todoEl.classList.toggle('completed')
            updateLS()
        })

        todoEl.addEventListener('contextmenu', (e) => {
            e.preventDefault()

            todoEl.remove()
            updateLS()
        })

        todosUL.appendChild(todoEl)

        input.value = ''

        updateLS()
    }
}

function updateLS() {
    todosEl = document.querySelectorAll('li')

    const todos = []

    todosEl.forEach(todoEl => {
        todos.push({
            text: todoEl.innerText,
            completed: todoEl.classList.contains('completed')
        })
    })

    localStorage.setItem('todos', JSON.stringify(todos))
}

function clickFun(x) {
    x.disabled = true;
}
//////////////////////////////////////////////services

/*disabled submit button................................contact------page..... and services--------page.....................................
function isEmpty() {
    let input1 = document.getElementsById('inputemail').value;
    let input2 = document.getElementsById('inputserve').value;
    let input3 = document.getElementsById('composed').value;

    if (input1 === "" && input2 === "" && input3 === "") {
        document.querySelector("#contact-form-container-content-btn-button").disabled = true;
    } else {
        document.querySelector("#contact-form-container-content-btn-button").disabled = false;
    }
}*/

//..................................hidden pages...................................................................................

function techUsedPage() {
    document.getElementById('timeline-page').style.display = "block";
}

function quotePage() {
    document.getElementById('qoutes-page').style.display = "block"
}







//......................................................................................image click...........................
const likeMe = document.querySelector('.likeMe')
const times = document.querySelector('#times')

let clickTime = 0
let timesClicked = 0

likeMe.addEventListener('click', (e) => {
    if (clickTime === 0) {
        clickTime = new Date().getTime()
    } else {
        if ((new Date().getTime() - clickTime) < 800) {
            createHeart(e)
            clickTime = 0
        } else {
            clickTime = new Date().getTime()
        }
    }
})

const createHeart = (e) => {
    const heart = document.createElement('i')
    heart.classList.add('fas')
    heart.classList.add('fa-heart')

    const x = e.clientX
    const y = e.clientY

    const leftOffset = e.target.offsetLeft
    const topOffset = e.target.offsetTop

    const xInside = x - leftOffset
    const yInside = y - topOffset

    heart.style.top = `${yInside}px`
    heart.style.left = `${xInside}px`

    likeMe.appendChild(heart)

    times.innerHTML = ++timesClicked

    setTimeout(() => heart.remove(), 1000)
}

//.........................................................qoute-page............

var quoteIndex = 1; //current qoute slide is set to 1
showQuote(quoteIndex); //display current qoute slide

function plusSlides(z) {
    //increment  th slide
    showQuote(quoteIndex += z);
}
//execute the dots function to match with current quote slide
function currentSlideDot(z) {
    showQuote(quoteIndex = z);
    document.getElementById('small-text').style.display = "none";
}
//execute the main function to display the current quote slide
function showQuote(z) {

    var i;
    var qSlides = document.getElementsByClassName('qoute-slide');
    var dots = document.getElementsByClassName('dot');
    //check if the quote slide has reached the end of the arrary or not
    if (z > qSlides.length) {
        quoteIndex = 1;

    }
    if (z < 1) {
        quoteIndex = qSlides.length;
    }
    for (i = 0; i < qSlides.length; i++) {
        qSlides[i].style.display = "none"
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    qSlides[quoteIndex - 1].style.display = "block";
    dots[quoteIndex - 1].className += " active";
}

//contact form