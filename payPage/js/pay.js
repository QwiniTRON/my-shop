

const form = document.getElementById("pay__form");
const cardInput = document.getElementById("card_input");
const checkInput = document.getElementById("exampleCheck1");
const errorNotice = document.getElementById("error_notice");


form.noValidate = true;

form.addEventListener("submit", function(e){
    if(checkInput.checked || cardInput.checkValidity()){

    }else{
        e.preventDefault();
        errorNotice.style.height = "18px";
        errorNotice.textContent = "Выбирите способ оплаты";
    }
});

if(cardInput){
    cardInput.addEventListener("input", function(e){
        let value = e.target.value;
        value = value.replace(/\d{4}\B/gi, function(word, position, srting){
            return word + " ";
        });
        e.target.value = value.trim();
    });  
}

if(checkInput){
    checkInput.addEventListener("change", function(e){
        if(e.target.checked){
            cardInput.disabled = true;
        }else{
            cardInput.disabled = false;
        }
    });
}



// notice

let succsessNotice = document.getElementById("succsess");
if(succsessNotice){
    setTimeout(()=>{
        succsessNotice.classList.add("hide");
        succsessNotice.addEventListener("transitionend", (e)=>{
            succsessNotice.remove();
        });
    }, 3000);
}

// end notice



