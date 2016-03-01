document.addEventListener("DOMContentLoaded", function() {
    var createAPostLink = document.getElementById("createAPostLink");
    var postForm = document.getElementById("postForm");
    createAPostLink.addEventListener("click", showPost);

    function showPost()
        {
            postForm.id = "showPostForm";
        }

})