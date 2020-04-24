const inputQuantity = document.getElementById('quantity');
const divImageElem = document.querySelectorAll('div.image');
const canvas1Elem = document.getElementById('constructor-canvas-1');
const canvas2Elem = document.getElementById('constructor-canvas-2');
const canvas3Elem = document.getElementById('constructor-canvas-3');
const labelUserColorDisplayElem = document.querySelector('label.color-var.user');

let currentCanvas = 'constructor-canvas-'+1;

// - canvas controller

// с круглым дном
const canvas1 = canvas1Elem.getContext('2d');

canvas1.moveTo(56, 128);

canvas1.quadraticCurveTo(120, 148, 194, 127);
canvas1.quadraticCurveTo(187, 200, 160, 203);
canvas1.quadraticCurveTo(120, 213, 90, 203);
canvas1.quadraticCurveTo(84, 200, 80, 195);
canvas1.quadraticCurveTo(75, 195, 56, 128);

// canvas1.fillStyle = 'red'; 
// canvas1.fill();


//длинная
const canvas2 = canvas2Elem.getContext('2d');

canvas2.moveTo(73, 77);

canvas2.quadraticCurveTo(110, 110, 172, 75);
canvas2.quadraticCurveTo(165, 123, 167, 130);
canvas2.quadraticCurveTo(165, 150, 171, 195);

// canvas2.quadraticCurveTo(123, 245, 74, 195);
canvas2.quadraticCurveTo(123, 245, 75, 195);

canvas2.quadraticCurveTo(85, 125, 73, 77);


//квадратная
const canvas3 = canvas3Elem.getContext('2d');

canvas3.moveTo(50, 61);

//верх
canvas3.quadraticCurveTo(135, 99, 200, 60);

//право
canvas3.lineTo(200, 180);

//низ
canvas3.quadraticCurveTo(195, 190, 180, 196);
canvas3.quadraticCurveTo(175, 198, 160, 203);
canvas3.quadraticCurveTo(155, 204, 140, 207);

canvas3.quadraticCurveTo(135, 210, 100, 205);
canvas3.quadraticCurveTo(65, 194, 52, 182);

//лево
canvas3.lineTo(50, 61);


document.querySelectorAll('div.shape__vars input[type="radio"]').forEach( (elem) => {
    elem.addEventListener('click', function changeImageOnClick (event) {
        switch (event.target.value) {
            case '1':

                //длинная свеча
                divImageElem[1].style.backgroundImage = 'url("../../view/resources/img/pics/4.png")';

                
                document.getElementById('constructor-canvas-1').style.display = 'none';
                document.getElementById('constructor-canvas-2').style.display = 'block';
                document.getElementById('constructor-canvas-3').style.display = 'none';

                currentCanvas = 'constructor-canvas-'+2;

                
                break;
            case '2':
                divImageElem[1].style.backgroundImage = 'url("../../view/resources/img/pics/1.png")';
                document.getElementById('constructor-canvas-1').style.display = 'block';
                document.getElementById('constructor-canvas-2').style.display = 'none';
                document.getElementById('constructor-canvas-3').style.display = 'none';

                currentCanvas = 'constructor-canvas-'+1;

                break;
            case '3':
                divImageElem[1].style.backgroundImage = 'url("../../view/resources/img/pics/5.png")';
                document.getElementById('constructor-canvas-1').style.display = 'none';
                document.getElementById('constructor-canvas-2').style.display = 'none';
                document.getElementById('constructor-canvas-3').style.display = 'block';

                currentCanvas = 'constructor-canvas-'+3;

                break;
            default:
                break;
        }
        
    })
})


document.querySelector('#select-candle-color').addEventListener('input', function changeColorOnInput(e) {
    labelUserColorDisplayElem.style.background = e.target.value;

    document.getElementById(currentCanvas).getContext('2d').clearRect(0, 0, canvas1Elem.width, canvas1Elem.height);
    document.getElementById(currentCanvas).getContext('2d').fillStyle = e.target.value;
    document.getElementById(currentCanvas).getContext('2d').fill();
})

document.querySelectorAll('.color__vars-select').forEach( (elem)=> {
    elem.addEventListener('click', function changeColorOnReadyColor (event) {
        document.getElementById(currentCanvas).getContext('2d').clearRect(0, 0, canvas1Elem.width, canvas1Elem.height);
        document.getElementById(currentCanvas).getContext('2d').fillStyle = event.target.dataset.colorhex;
        document.getElementById(currentCanvas).getContext('2d').fill();
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