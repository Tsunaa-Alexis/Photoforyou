/*
struct cart:
[
    {
        id: string;
        quantity: number;
    }
]
 */
// From: https://stackoverflow.com/questions/14573223/set-cookie-and-get-cookie-with-javascript
function setCookie(name,value,days) {
    let expires = '';
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + (value || '')  + expires + '; path=/';
}
function getCookie(name) {
    let nameEQ = name + '=';
    let ca = document.cookie.split(';');
    for(let i=0;i < ca.length;i++) {
        let c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function addToCart(e) {
    // get photoId
    const photoId = e.target.attributes.getNamedItem('photoid').nodeValue;


    // get stored cart
    let cart = getCookie('CART')

    // Parse or init the cart
    if (!cart) {
        cart = [];
    } else {
        try {
            cart = JSON.parse(cart)
        } catch (e) {
            cart = []
        }
    }

    // Search photo in cart and increments the value
    let find = false;
    cart.map(elem => {
        if (elem.id == photoId) {
            elem.quantity = elem.quantity + 1;
            find = true;
        }
    });

    // if it already not exist, add photo to cart
    if (!find) {
        cart.push({
            id: +photoId,
            quantity: 1,
        });
    }

    setCookie('CART', JSON.stringify(cart))
}

function getnbCart() {

    let texte = document.getElementById("notif");

    let cart = getCookie('CART')

    // Parse or init the cart
    if (!cart) {
        cart = [];
    } else {
        try {
            cart = JSON.parse(cart)
        } catch (e) {
            cart = []
        }
    }

    texte.innerHTML = cart.length;  
}

function delCart(a) {

    const place = a.target.attributes.getNamedItem('placeid').nodeValue;

    

    let cart = getCookie('CART')

    if (!cart) {
        return
    } else {
        try {
            cart = JSON.parse(cart)
        } catch (e) {
            return
        }
    }

    index = 0;
    find = false;
    for (item of cart) {
        if (item.id == place) {
            find = true;
            break
        }
        index++;
    }

    if (find) {
        cart.splice(index,1)
        setCookie('CART', JSON.stringify(cart))
        document.location.reload();

    }
}


function AddListenAddToCart() {
    // get all add to cart button and attach add to cart event
    let elements = document.getElementsByClassName('buyable');
    for (let element of elements) {
        element.addEventListener('click', addToCart)
        element.addEventListener('click', getnbCart)
    }
}

function AddListenDelToCart() {
    // get all add to cart button and attach add to cart event
    let elements = document.getElementsByClassName('del');
    for (let element of elements) {
        element.addEventListener('click', delCart)
    }
}

AddListenAddToCart()
AddListenDelToCart()
getnbCart()







