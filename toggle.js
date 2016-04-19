document.addEventListener("DOMContentLoaded", function() {
                                            
    HTMLElement.prototype.toggle = function() {
        if (this.style.display == "block") {
            this.style.display = "none";
        }
        else {
            this.style.display = "block";
        }
    }
})