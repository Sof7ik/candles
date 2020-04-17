let number1, number2;

function hideModalOnClckClose () {
    document.querySelector('div.leftModal').style.width = '0px';
    document.querySelectorAll('div.leftModal *').forEach((tmp) => {
        tmp.style.display = 'none';
    })
}

document.querySelectorAll('.candles__candle').forEach((e) => {
    e.addEventListener('click', (event) => {
        // number1 = event.target.dataset.candlenumber;
        // console.log('number1: ', number1);
        // number2 = event.target.dataset.candlenumber;
        // console.log('number2: ', number2);

        if(number1 == number2)
        {
            console.log("совпадают");
        }

        if(document.querySelector('div.leftModal').style.width != "100px")
        {
            document.querySelector('div.leftModal').style.width = '100px';
            document.querySelectorAll('div.leftModal *').forEach((elem) => {
                elem.style.display = "block";
            })
            document.querySelector('div.leftModal .modal-title *').style.display = "block";
        }
        else
        {
            document.querySelector('div.leftModal').style.width = '0px';
            document.querySelectorAll('div.leftModal *').forEach((tmp) => {
                tmp.style.display = 'none';
            })
        }
        console.log(event.target);
        
        
        document.querySelector('div.leftModal .modal-title p').addEventListener('click', hideModalOnClckClose)
    })
})