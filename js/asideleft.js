window.onload = (e)=>{
    const minRange = document.body.querySelector(".filter__price-min");
    const maxRange = document.body.querySelector(".filter__price-max");
    const filter = document.querySelector(".filter__price");
    const RANGE = 20e-2;
    const spanMax = document.querySelector("#filter_price_max");
    const spanMin = document.querySelector("#filter_price_min");


    filter.addEventListener("change", function func(e){
        if(e.target == maxRange){
            let result = Math.max(maxRange.value, minRange.value * (1 + RANGE));
            maxRange.value = result;
            spanMax.textContent = result;
        }
        if(e.target == minRange){
            let result = Math.min(minRange.value, maxRange.value * (1 - RANGE));
            minRange.value = result;
            spanMin.textContent = result;
        }
    });
}



