const inputQuantity = document.getElementById('quantity');
const canvas1Elem = document.getElementById('constructor-canvas-1');
const labelUserColorDisplayElem = document.querySelector('label.color-var.user');

// - canvas controller
const canvas1 = canvas1Elem.getContext('2d');

canvas1.quadraticCurveTo(120, 139, 194, 127);
canvas1.quadraticCurveTo(187, 200, 160, 203);
canvas1.quadraticCurveTo(120, 213, 90, 203);
canvas1.quadraticCurveTo(84, 200, 80, 195);
canvas1.quadraticCurveTo(75, 195, 56, 128);

canvas1.strokeStyle = '#000';
canvas1.stroke();

document.querySelector('#select-candle-color').addEventListener('input', function changeColorOnInput(e) {
    labelUserColorDisplayElem.style.background = e.target.value;
    canvas1.clearRect(0, 0, canvas1Elem.width, canvas1Elem.height);
    canvas1.fillStyle = e.target.value;
    canvas1.fill();
})

document.querySelectorAll('.color__vars-select').forEach( (elem)=> {
    elem.addEventListener('click', function changeColorOnReadyColor (event) {
        canvas1.clearRect(0, 0, canvas1Elem.width, canvas1Elem.height);
        canvas1.fillStyle = event.target.dataset.colorhex;
        canvas1.fill();
    })
})

inputQuantity.addEventListener('input', ()=> {
    if(inputQuantity.value < 1){
        inputQuantity.value = 1;
    }
})

let costType = 0, costShape = 0, quantity = 1;

document.querySelectorAll('div.type__vars label').forEach((e) => {
    e.addEventListener('click', (elem) => {
        switch(elem.target.getAttribute('for').replace('type-vars__', '')){
            case '1':
                costType = 1000;
                break;
            case '2':
                costType = 2000;
                break;
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

// const allSelectInputsElems = document.querySelectorAll('.select-form');

// console.log(allSelectInputsElems);

// allSelectInputsElems.forEach( (elem) => {
//     elem.addEventListener('change', (event) => {
//         console.log(event.target.checked);
//         switch(event.target.value)
//         {
//             case '1':
//                 console.log("value=", event.target.value);
//                 break;

//             case '2':
//                 console.log("value=", event.target.value);
//                 break;

//             case '3':
//                 console.log("value=", event.target.value);
//                 break;

//             default:
//                 break;
//         }
//     })
// })