let number1, number2;   

function showModal(){
    document.querySelector('div.leftModal').classList.remove('hide');
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = "flex";
    })
    getInfoCandle("GET", `../controller/php/getInfoCandle.php?id=${number1}`);
    number2 = number1;
    number1 = undefined;
}

function hideModal(){
    document.querySelector('div.leftModal').classList.add('hide');
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
    deleteInfoCandle();
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
            deleteInfoCandle();
            getInfoCandle("GET", `../php/getInfoCandle.php?id=${number2}`);
        }
        
        document.querySelector('div.leftModal .modal-title .closeLeftModal').addEventListener('click', hideModal);
    })
})

function getInfoCandle(method, url)
{
    fetch(url, {
        method: method
    }).then((res) =>
    {
        return res.json();
    })
    .then((res) => {
        console.log(res);
        document.querySelector('ul.infoAboutCandle').insertAdjacentHTML('afterbegin', `
            <li>Type: <span>${res.typeName}</span></li>
            <li>Form: <span>${res.formName}</span></li>
            <li>Color: <span>${res.colorHex}</span></li>
            <li>Price: <span>${res.price} руб.</span></li>
        `)
        document.querySelectorAll('ul.infoAboutCandle *').forEach((e) => {
            e.style.display = 'flex';
        })
    })
    
}

function deleteInfoCandle(){
    document.querySelectorAll('ul.infoAboutCandle *').forEach((e) => {
        e.remove();
    })
}