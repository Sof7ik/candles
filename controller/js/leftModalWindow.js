let number1, number2;

document.querySelector('div.leftModal').addEventListener('mouseover', styleModal1);
document.querySelector('div.leftModal').addEventListener('mouseout', styleModal2);

function hideModalOnClickClose () {
    document.querySelector('div.leftModal').style.width = '0px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
}

function showModal(){
    document.querySelector('div.leftModal').style.width = '100px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = "flex";
    })
    number2 = number1;
    number1 = undefined;
}

function hideModal(){
    document.querySelector('div.leftModal').style.width = '0px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
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

        document.querySelector('div.leftModal .modal-title .closeLeftModal').addEventListener('click', hideModalOnClickClose);
    })
})

function styleModal1(){
    document.querySelector('div.leftModal').style.width='max-content';
}

function styleModal2(){
    document.querySelector('div.leftModal').style.width='100px';
}