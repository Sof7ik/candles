document.querySelector('div.login-window').addEventListener('click', () => {
    document.querySelector('div.modal-window').style.top = "55px";
})

document.querySelector('#select-candle-color').addEventListener('input', (e) => {
    document.querySelector('label.color-var.user').style.background = e.target.value;
})