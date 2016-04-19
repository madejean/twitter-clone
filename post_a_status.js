document.addEventListener("DOMContentLoaded", function() {

    var postLink = document.getElementById("createAPostLink");
    var postForm = document.getElementById("postForm");
    postLink.addEventListener("click", toggleForm);
    
    function toggleForm() {
        postForm.toggle();
    }
    
})