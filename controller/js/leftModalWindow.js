let number1, number2;

function showModal(){
    document.querySelector('div.leftModal').style.width = '100px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = "flex";
    })
    number2 = number1;
    number1 = undefined;
    document.querySelector('div.leftModal').addEventListener('mouseover', styleModal1);
    document.querySelector('div.leftModal').addEventListener('mouseout', styleModal2);  
}

function hideModal(){
    document.querySelector('div.leftModal').style.width = '0px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
    document.querySelector('div.leftModal').removeEventListener('mouseover', styleModal1);
    document.querySelector('div.leftModal').removeEventListener('mouseout', styleModal2);
}

document.querySelectorAll('.candles__candle').forEach((e) => {
    e.addEventListener('click', (event) => {
        number1 = event.target.dataset.candlenumber;
        if(document.querySelector('div.leftModal').style.width != "100px"){
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

function styleModal1(){
    document.querySelector('div.leftModal').style.width='max-content';
}

function styleModal2(){
    document.querySelector('div.leftModal').style.width='100px';
}