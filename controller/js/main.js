let check = 0;
document.querySelector('div.login-window').addEventListener('click', showAndHide);

function showAndHide(){
    if(!check){
        document.querySelector('div.modal-window').style.top = "55px";
        check = 1;
    }
    else {
        document.querySelector('div.modal-window').style.top = "-150px";
        check = 0;
    }
}

document.querySelector('#select-candle-color').addEventListener('input', (e) => {
    document.querySelector('label.color-var.user').style.background = e.target.value;
})