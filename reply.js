document.addEventListener("DOMContentLoaded", function() {
                                            
    var replies = document.querySelectorAll(".replyLink");
    var replyForms = document.querySelectorAll(".replyForm")
    
    function showReplyForm() {
        var postnumber = this.getAttribute("data-postlink");
        replyform = document.getElementById(postnumber);
        replyform.toggle();
    }
    
    for (var i = 0; i < replies.length; i++) {
            replies[i].addEventListener("click", showReplyForm);
        }
    
})