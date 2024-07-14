
const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })

    
var emailField = document.getElementById("email-field");
var emailError = document.getElementById("email-error");
var flag=1; // 1-> no error | 0 -> yes error
function checkPassword(){
    let password = document.getElementById("password").value;
    let cnfrmPassword = document.getElementById("cnfrm-Password").value;
    console.log(password,cnfrmPassword);
    let message = document.getElementById("message");
    
    if(password.length !=0) {
        if(password == cnfrmPassword){
            message.textContent = "Password Matched";
            message.style.backgroundColor = "#3ae374";
            flag=1;
        }
        else{
            message.textContent = "Password don't match";
            flag=0;
            message.style.backgroundColor = "";
        }
    }
    else{
        alert("Password can't be empty!");
        message.textContent = ""; 
        flag=0;
    }
}
function validate() {
    if(flag==1){
        return true;
    }
    else{
        return false;
    }
}
function validateEmail(){
    if(!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        return false;
    }
}
