function validate() {
    var username = document.forms['frmname']['username'].value;
    var password = document.forms['frmname']['password'].value;
    if (username != "@admin") {
        c = window.alert('Invalid Username!');
        return false;
    }
    if (password != "Adminlog") {
        c = window.alert('Invalid Password!');
        return false;
    }
}

// function allpatient() {
//     var x = document.getElementById("all_patient");
//     var y = document.getElementById("hideall");
//     if (x.style.display === "block") {
//         x.style.display = "none";
//         y.innerHTML = "Show Details";
//     } else {
//         x.style.display = "block";
//         y.innerHTML = "Hide Details";
//     }
// }