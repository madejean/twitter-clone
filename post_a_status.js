window.onload = function () {
    var createAPostLink=document.getElementById("createAPostLink");
    var postForm=document.getElementById("postForm");
    createAPostLink.addEventListener("click", showPost);

    function showPost()
        {
            alert("test");
            postForm.id = "showPostForm";
        }
}