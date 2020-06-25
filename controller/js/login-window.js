let check = 0;
document.querySelector('div.login-window button').addEventListener('click', showAndHide);

function showAndHide(){
    if(!check){
        document.querySelector('div.modal-window').style.top = "55px";
        check = 1;
    }
    else {
        document.querySelector('div.modal-window').style.top = "-400px";
        check = 0;
    }
}