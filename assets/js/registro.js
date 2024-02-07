const check_password = document.getElementById("check_password");
const password_input = document.getElementById("user_password");

check_password.addEventListener("click",function(){
    showHide_password(password_input);
});

function showHide_password(p_input){
    if(p_input.type === "password"){
        p_input.type = "text";
    }else{
        p_input.type = "password";
    }
}