function enablebutton(check){
    var submit = document.getElementById("submit");
    submit.disabled = check.checked ? false:true;
    if(!submit.disabled){
        submit.focus();
    }
}