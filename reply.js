document.addEventListener("DOMContentLoaded", function() {
                                            
    var replies = document.querySelectorAll(".replyLink");
    var replyForms = document.querySelectorAll(".replyForm")
    
  
    for (var i = 0; i < replies.length; i++) {
        console.log(i);
        replies[i].addEventListener("click", showReplyForm);
    }
    
    function showReplyForm() {
        var postnumber = this.getAttribute("data-postlink");
        replyform = document.getElementById(postnumber);
        replyform.toggle();
    }
    
    
})