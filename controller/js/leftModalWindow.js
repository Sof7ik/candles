let number1, number2;

function showModal(){
    document.querySelector('div.leftModal').classList.remove('hide');
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = "flex";
    })
    number2 = number1;
    number1 = undefined;
}

function hideModal(){
    document.querySelector('div.leftModal').classList.add('hide');
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
}

document.querySelectorAll('.candles__candle').forEach((e) => {
    e.addEventListener('click', (event) => {
        number1 = event.target.dataset.candlenumber;
        if(document.querySelector('div.leftModal').classList.contains('hide')){
            showModal();
        }
        if(number1 == number2){
            hideModal();
        }
        if(number1 != number2 && number1 != undefined){
            number2 = number1;
            document.querySelector('div.leftModal .modal-title .closeLeftModal').textContent = 'изменено' + number2;
        }

        document.querySelector('div.leftModal .modal-title .closeLeftModal').addEventListener('click', hideModal);
    })
})