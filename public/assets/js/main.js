function enablebutton(b){
    // var submit = document.getElementById("submit1");
    // submit.disabled = check.checked ? false:true;
    // if(!submit.disabled){
    //     submit.focus();
    // }
    var submit = [b];
    var che=[];
    // submit[2] = document.getElementById("submit"+2);
    for(let i = 1; i<=b; i++){
        submit[i] = document.getElementById("submit"+i);
        che[i]=document.getElementById(i);
        console.log(che[i]);
        submit[i].disabled = che[i].checked ? false:true;
        if(!submit[i].disabled){
            submit[i].focus();
        }
    }
    
}