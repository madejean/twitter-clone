document.addEventListener("DOMContentLoaded", function() {
                                            
    var replies = document.querySelectorAll(".replyLink");
    var replyForms = document.querySelectorAll(".replyForm")
    
  
    for (var i = 0; i < replies.length; i++) {
        console.log(i);
        var num = i;
        replies[i].addEventListener("click", showReplyForm);
    }
    
    function showReplyForm() {
        console.log(this);
        var postnumber = this.getAttribute("data-postlink");
        document.getElementById(postnumber).style.display = "initial";
    }
})