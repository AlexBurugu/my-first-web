//int his file ajax is running twice ..for user searching and displaying the user..soln to stop overiding if ajx action
var usersList = document.querySelector('.users-list');
//working on the searchbar
var searchBar = document.querySelector('.users .search .search-input input');
searchBar.onkeyup = () => {

    var searchTerm = searchBar.value; //getting wht the user types
    if (searchTerm != "") //adding an active class when user start searcching and only run the setinterval ajax if there is no active class
    {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    //1.start xml object
    let xhr = new XMLHttpRequest();
    var usersList = document.querySelector('.users-list');
    //use GET method to receive dat not to send
    xhr.open("POST", "php/search.php", true); //xhr.open takes many parameters bt we only pass metho,url and async...method "POST" is used to send data
    xhr.onload = () => {
        //do what the file in the url is suppose to do
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                //console.log(data);
                usersList.innerHTML = data;

            }
        }

    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm); //sending wht the user inputs to php
}

setInterval(() => {
        //get users-list
        var usersList = document.querySelector('.users-list');
        //testing console.log('hello');
        //onclicking the form is submited
        //start ajax when the button is clicked
        //1.start xml object
        let xhr = new XMLHttpRequest();
        //use GET method to receive dat not to send
        xhr.open("GET", "php/users.php", true); //xhr.open takes many parameters bt we only pass metho,url and async...method "POST" is used to send data
        xhr.onload = () => {
            //do what the file in the url is suppose to do
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    //testing console.log(data);
                    // usersList.innerHTML = data;
                    if (!searchBar.classList.contains("active")) {
                        usersList.innerHTML = data;
                    }

                }
            }

        }
        xhr.send();
    }, 500) //runs frequently after evry 500ms