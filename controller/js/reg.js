const 
firstPass = document.getElementById('passwordU'),
secondPass = document.getElementById('repeatPasswordU'),
firstPassWrapper = document.getElementById('passwordWrapper-1'),
secondPassWrapper = document.getElementById('passwordWrapper-2'),
passwordInputs = document.querySelectorAll('input.reg-input-password'),
showIcons = document.querySelectorAll('div.passwordWrapper a')
;

passwordInputs.forEach( (elem) => {
    elem.addEventListener('input', ()=> {
        if (firstPass.value !== '' && secondPass.value !== ''){
            if (firstPass.value !== secondPass.value)
            {
                firstPassWrapper.style.border = "2px solid red";
                secondPassWrapper.style.border = "2px solid red";
            }
            else
            {
                firstPassWrapper.style.border = "2px solid greenyellow";
                secondPassWrapper.style.border = "2px solid greenyellow";
            }
        }
        else 
        {
            firstPassWrapper.style.border = "2px solid black";
            secondPassWrapper.style.border = "2px solid black";
        }
    });
});

showIcons.forEach( (elem) => {
    elem.addEventListener('click', (event) => {
        event.preventDefault();
        firstPass.getAttribute('type') == 'password' ? firstPass.setAttribute('type', 'text') :  firstPass.setAttribute('type', 'password');

        secondPass.getAttribute('type') == 'password' ? secondPass.setAttribute('type', 'text') :  secondPass.setAttribute('type', 'password');
    })
})