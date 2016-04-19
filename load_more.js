document.addEventListener("DOMContentLoaded", function() {
    
    var MoreStatusesLink = document.getElementById("MoreStatuses");
    
    MoreStatusesLink.addEventListener('click', function() {            
        setTimeout(function () { 
            ajaxGet('/statuses-1.html', onSuccess);   
        }, 2000); 
        document.body.style.cursor = "wait";
        MoreStatusesLink.disabled = true; 
        MoreStatusesLink.style.backgroundColor = "lightgray"
        });
    
    
    function onSuccess(response) {
        document.getElementById("extra_statuses").innerHTML = response;
        MoreStatusesLink.disabled = false;
        MoreStatusesLink.style.backgroundColor = "#a4d79a";
        document.body.style.cursor = "default";
        
        var additional_replies = document.querySelectorAll(".additional_replyLink");
        var additional_replyForms = document.querySelectorAll(".additional_replyForm")

        function showAdditionalReplyForm() {
            var additional_postnumber = this.getAttribute("data-additionalpostlink");
            additional_replyform = document.getElementById(additional_postnumber);
            additional_replyform.toggle();
        }

        for (var i = 0; i < additional_replies.length; i++) {
                additional_replies[i].addEventListener("click", showAdditionalReplyForm);
        }
    }

})