window.addEventListener("load", function(e){

const form = document.getElementById("reg_form");
form.noValidate = true; 

// checkValidity() - проверяет валидно ли поле, если нет то вернёт false, если в поле нет ни одного вида ошибок вернёт true
// setCustomValidity() - Указывает что нужнобудет отбразить в ошибке показываемой пользователю при submite. Но нужно  form.noValidate = false(оно к стати по-умолчанию); 
// willValidate - вернёт true если на этом input-е утановлено свойство required, тоесть это свойство говорит что это поле будет проверено при submit или нет
// validity - объект со свойствами видов ошибок для поля, true будет у того поля(вида) каково вида ошибку имеет input
//    .valid – значение true принимается, если в поле нет ошибок, в ином случае принимается значение false.
//    .valueMissing – значение true принимается, если заполнение поля обязательно, а значение не введено.
//    .typeMismatch – значение true принимается, если значение имеет неправильный синтаксис, например, это плохо отформатированный e-mail.
//    .patternMismatch – значение true принимается, если значение не соответствует регулярному выражению атрибута pattern.
//    .tooLong – значение true принимается, если значение имеет большую длину, чем максимальная установленная длина (maxlength).
//    .tooShort – значение true принимается, если значение имеет меньшую длину, чем установленная минимальная длина (minlength).
//    .rangeUnderFlow – значение true принимается, если значение ниже, чем установленный минимум.
//    .rangeOverflow – значение true принимается, если значение выше, чем установленный максимум.
//    .badInput – значение true принимается, если введенные данные нельзя преобразовать в формат значения.
//    .customError – значение true принимается, если у поля есть собственный набор ошибок. // если мы на нём вызовем setCustomValidity(), если снова вызовут но передадут в метод  false то и сдесб будет false
// reportValidity() - проверяет на достоверность как checkValidity() возвращает значени и выводит пользователю сообщение с видом ошибки, пока поле не станет валидным из него нельзя выйти






for(let item of Array.from(form.elements).slice(0, -1)){
    item.addEventListener("blur", function(e){
        let validity = e.target.checkValidity();  // сдесь можно писать свою логику с разными проверками
        if(e.target.id == "rpas"){
            e.target.setCustomValidity("");
        }          
    });
}


form.addEventListener("submit", function(e){
    let elements = Array.from(e.target.elements);
    elements = elements.slice(0, -1);
    let password1 = e.target.login.value;
    let password2 = e.target.rlogin.value;
    let acces = elements.every((item, index, arr)=>item.checkValidity());   // сдесь проверка, если всё валидно отправляем, если нет то e.preventDefault()
    if(!acces || password1 != password2){
        if(password1 != password2){
            let noticeSpan = e.target.querySelector("#rpas_notice");
            noticeSpan.textContent = "Пароли не совпадают";
            document.getElementById("rpas").setCustomValidity("не совпали пароли");
        }
        e.preventDefault();
    }
});

});



