// document.querySelectorAll('form input').forEach(elem => elem.setAttribute('autocomplete', "off"))

const 
nameElem = document.getElementById('nameU'), 
surnameElem = document.getElementById('surnameU'), 
passwordElem = document.getElementById('passwordU'), 
emailElem = document.getElementById('emailU'), 
phoneElem = document.getElementById('telU'),
buttonElem = document.getElementById('button');

const data = new FormData();

// let DD01E6A99300E8223E6C2BDFB741DC4176048F4;

// DD01E6A99300E8223E6C2BDFB741DC4176048F4 = Math.round(Math.random() * 12312312313213);

// DD01E6A99300E8223E6C2BDFB741DC4176048F4 = DD01E6A99300E8223E6C2BDFB741DC4176048F4.toString();

function generateNumber() {
    return rand = Math.round(Math.random() * (9999 - 1000) + 1000);
}

//функция проверки существаования пользователя по email-адресу
function checkUser (method, url, data)
{
    const userEmail = new FormData();
    userEmail.append('email', data);

    // console.log("email из инпута", data);
    // console.log("formData", userEmail);

    fetch(url, {
        method: method,
        body: userEmail
    }).then((res) =>
    {
       return res.text();
    })
    .then((res) =>
    {
        // console.log(res);
        if (res == "1"){
            alert("Пользователь с таким  адресом электронной почты уже существует. Пожалуйста, укажите другой E-mail.");
        }
        else if (res == "0")
        {
            if (document.querySelectorAll("div.user-code").length == 0)
            {
                buttonElem.insertAdjacentHTML('afterend', 
                `
                <div class="user-code">
                    <span>Введите код, отправленный Вам на указанную email-почту</span>
                    <input type="text" name="name" id="user-code-input" autofocus>
                    
                    <button id="create-user">Зарегаться</button>
                </div>
                `);
                document.getElementById('create-user').insertAdjacentHTML('beforebegin', 
                    `
                    <p>Ваш код</p>
                    <p id="random-code">${generateNumber()}</p>
                    `
                );
                checkCodes();
            }
            else 
            {
                document.querySelector('div.form-wrapper > span').textContent = "И зачем тыкать по 100000000 раз в одну кнопку? А? Лучше все равно за такой срок работать не будет!";
            }
        }
    });
}

// let E798E7470650C5BCCC6C4C2B2EAE0312BAD3E = DD01E6A99300E8223E6C2BDFB741DC4176048F4;

//функция проверки совпадения кодовых чисел
function checkCodes () {
    document.getElementById('create-user').addEventListener('click', (event)=> {
        event.preventDefault();
        if (rand == document.getElementById('user-code-input').value)
        {
            insertNewUser("POST", "../controller/php/reg.php", setFormData());
        }
        else
        {
            console.log("чето не то");
            // console.log("DD01E6A99300E8223E6C2BDFB741DC4176048F4: ", DD01E6A99300E8223E6C2BDFB741DC4176048F4);
            console.log("value: ", document.getElementById('user-code-input').value);
        }
    })
}

// for(let i = 0; i < DD01E6A99300E8223E6C2BDFB741DC4176048F4.length - 1; i++)
// {
//     if (DD01E6A99300E8223E6C2BDFB741DC4176048F4[i] == 3)
//     {
//         if(DD01E6A99300E8223E6C2BDFB741DC4176048F4[i+2])
//         {
//             DD01E6A99300E8223E6C2BDFB741DC4176048F4 += E798E7470650C5BCCC6C4C2B2EAE0312BAD3E[i+2];
//             continue;
//         }
//         else
//         {
//             DD01E6A99300E8223E6C2BDFB741DC4176048F4 = DD01E6A99300E8223E6C2BDFB741DC4176048F4 [i-4];
//             continue;
//         }
//     }
// }

//функция формирования данных для отправки в БД
function setFormData () {
    

    data.append('name', nameElem.value);
    data.append('surname', surnameElem.value);
    data.append('password', passwordElem.value);
    data.append('repeatPassword', document.getElementById('repeatPasswordU').value);
    data.append('email', emailElem.value);
    data.append('phone', phoneElem.value);

    console.log('введенные коды совпадают, можно продолжать');
    return data;
}

//функция добавления данных пользвателя в БД
function insertNewUser (method, url, data)
{
    fetch(url, {
        method: method,
        body:data
    }).then((res) =>
    {
       return res.text();
    })
    .then((res) =>
    {
        // console.log(res);
        if (res == "Пароли не свопадают"){
            alert("Пароли не совпадают", data['password'], data['repeatPassword']);
        }
        else
        {
            alert("Добавлено");
            window.location.href = '../../index.php';
        }
    });
}

buttonElem.addEventListener('click', (event)=> {
    event.preventDefault();
    // buttonElem.setAttribute('disabled', 'true');
    if (
        nameElem.value.trim() != '' &&
        surnameElem.value.trim() != '' &&
        passwordElem.value.trim() != '' &&
        emailElem.value.trim() != '' &&
        phoneElem.value.trim() != ''
    )
    {
        if (passwordElem.value.trim() === document.getElementById('repeatPasswordU').value)
        {
            checkUser('POST', '../controller/php/checkUser.php', emailElem.value);
        }
        else
        {
            alert('Пароли не свопадают');
        }
    }
    else
    {
        alert('не все поля были заполнены');
    }
    
})

