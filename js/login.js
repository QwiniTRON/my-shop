window.addEventListener("load", function(e){
    const form = document.getElementById("login_form");
    form.noValidate = true;

    const inputsArr = Array.from(form.elements).slice(0, -1);

    for(let item of inputsArr){
        item.addEventListener("blur", function(e){

        });
    }

    form.addEventListener("submit", function(e){
        const notAccess = inputsArr.some((item)=>!item.checkValidity());
        if(notAccess){
            e.preventDefault();
        }
    });
});