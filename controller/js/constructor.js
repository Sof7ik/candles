const inputQuantity = document.getElementById('quantity');

document.querySelector('#select-candle-color').addEventListener('input', (e) => {
    document.querySelector('label.color-var.user').style.background = e.target.value;
})

inputQuantity.addEventListener('input', ()=> {
    if(inputQuantity.value < 1){
        inputQuantity.value = 1;
    }
})

let costType = 0, costShape = 0, quantity = 1;

document.querySelectorAll('div.type__vars label').forEach((e) => {
    e.addEventListener('click', (elem) => {
        if(elem.target.hasAttribute('for')){
            switch(elem.target.getAttribute('for').replace('type-vars__', '')){
                case '1':
                    costType = 1000;
                    break;
                case '2':
                    costType = 2000;
                    break;
            }
        }
        else{
            switch(elem.target.textContent){
                case 'Открытая':
                    costType = 1000;
                    break;
                case 'В стакане':
                    costType = 2000;
                    break;
            }
        }
        counting(costType, costShape, quantity)
    })
})

document.querySelectorAll('div.shape__vars label').forEach((e) => {
    e.addEventListener('click', (elem) => {
        switch(elem.target.className.replace('shape-var', '').trim()){
            case 'tall':
                costShape = 1000;
                break;
            case 'circle':
                costShape = 1500;
                break;
            case 'rectangle':
                costShape = 2000;
                break;
        }
        counting(costType, costShape, quantity);
    })
})

document.querySelector('div.quantity').addEventListener('input', (e) => {
    quantity = e.target.value;
    counting(costType, costShape, quantity);
})

function counting(costType, costShape, quantity){
    document.querySelector('#candle-price').value = (costType + costShape) * quantity;
}
