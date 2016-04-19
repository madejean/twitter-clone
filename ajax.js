// onSucess is a callback that should expect one argument, the string containing the contents of the file retrieved with the ajax call
function ajaxGet(url, onSuccess) {
    var xhttp = new XMLHttpRequest();
    
    if(!xhttp) {
        alert("Canot create XMLHTTP instance");
    }
    
    xhttp.onreadystatechange = someFunction; 
    xhttp.open('GET', url, true);
    xhttp.send();
    
    function someFunction() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            onSuccess(xhttp.responseText);   
        }
    }
}