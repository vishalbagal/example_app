document.getElementById("profilePic").addEventListener("click", function() {
    var dropdown = document.getElementById("dropdownContent");
    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
    } else {
        dropdown.style.display = "none";
    }
});

window.onclick = function(event) {
    if (!event.target.matches('.profile-pic')) {
        var dropdown = document.getElementById("dropdownContent");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
};
