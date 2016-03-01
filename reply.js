document.addEventListener("DOMContentLoaded", function() {
                                            
    var replies = document.querySelectorAll(".replyLink");
    var replyForms = document.querySelectorAll(".replyForm")
        
    for (var i = 0; i < replies.length; i++) {
        console.log(i);
        var num = i;
        replies[i].addEventListener("click", showReplyForm, num);
    }
    
    function showReplyForm(i) {
        console.log(num);
        var postnumber = replies[num].getAttribute("data-postlink");
        document.getElementById(postnumber).style.display = "initial";
    }
})