    document.addEventListener('DOMContentLoaded', ()=> {
    let oldInfoArray = [],
    newInfoArray = [],
    flag = false;

    let elems = document.querySelectorAll('ul.infoAboutUser li p');

    elems.forEach((element) => {
        oldInfoArray.push(element.textContent.trim());
    })

    document.querySelector('button.edit-prof').addEventListener('click', () => {
        if (flag == false)
        {
            flag = true;

            document.querySelector('button.edit-prof').textContent = "Сохранить";

            elems.forEach((element) => {
                element.remove();
            })

            let i = 0;
            document.querySelectorAll('ul.infoAboutUser li').forEach ((elem) => 
            {
                elem.insertAdjacentHTML('beforeend',
                `
                    <input type='text' value='${oldInfoArray[i]}' class="edit-input input-${i}">
                `);
                i++;
            });

            document.querySelector('input.edit-input.input-3').addEventListener('input', () => {

                if (event.target.value != '0' || 
                    event.target.value != '1' || 
                    event.target.value != '2' || 
                    event.target.value != '3' || 
                    event.target.value != '4' || 
                    event.target.value != '5' || 
                    event.target.value != '6' || 
                    event.target.value != '7' || 
                    event.target.value != '8' || 
                    event.target.value != '9' || 
                    event.target.value != '+') 
                {
                    console.log("не цифра");
                }

                if(event.target.value.length > 12)
                {
                    event.target.value = '';
                    console.log("value > 12");
                }

                console.log('event.target.value: ', event.target.value);
                console.log('event.target.value.length: ', event.target.value.length);
            })
        }
        else
        {
            flag = false;
            document.querySelectorAll('ul.infoAboutUser li input').forEach ((elem) => {
                newInfoArray.push(elem.value);
            })

            const getCookie = (name) => {
                let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));   
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            let newCookie = JSON.parse(getCookie('userInfo'));
            let change = JSON.parse(getCookie('userInfo'));
            
            console.log('change', change);
            console.log('newCookie: ', newCookie);

            console.log('change["id"]: ', change['id']);
            console.log('change["password"]: ', change['password']);

            let counter = 0;
            for(let key in newCookie)
            {
                if(newCookie.hasOwnProperty(key))
                {
                    console.log(key);
                    console.log(newCookie[key]);
                    if (key = 'id')
                    {
                        newCookie[key] = change['id'];
                    }
                    if (key = 'password')
                    {
                        newCookie[key] = change['password'];
                    }
                    newCookie[key] = newInfoArray[counter];
                    counter++;
                }
            }

            console.log("newCookie после замены", newCookie);

            document.cookie = `userInfo=${JSON.stringify(newCookie)}; max-age=86400e3; path='/'`;
        }
        
    })
})
