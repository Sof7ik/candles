const inputQuantity = document.getElementById('quantity');

document.querySelector('#select-candle-color').addEventListener('input', (e) => {
    document.querySelector('label.color-var.user').style.background = e.target.value;
})

inputQuantity.addEventListener('input', ()=> {
    if(inputQuantity.value < 1){
        // alert(`Ебанат нахуй, отъебись со своим ТО, да?
        // А, и еще
        // Как ты можешь меньше 1 свечки заказать?`);
        inputQuantity.value = 1;
    }
    
})
