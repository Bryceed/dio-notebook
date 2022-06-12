/*---------------------------------[v1]-+
|  Magic.js - Where the magic happens.  |
|---------------------------------------|
|  Simple JavaScript library to create  |
|  a simple, easy to use, and powerful  |
|  usage of functions in web version.   |
|---------------------------------------|
|       Wellington N.  (@Bryceed)       |
+--------------------------------------*/

// Getting page content from http request
function getPage(url, callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(this);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

// Treated content of the page, returning a list of elements by tag
function getElementsByTag(tag, content) {
    var elements = content.getElementsByTagName(tag);
    return elements;
}

// Get a list of GitHub files from a repository
function getGitHubFiles(repo, callback) {