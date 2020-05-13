/*
struct cart:
[
    {
        id: string;
        quantity: number;
    }
]
 */

// function pour crée un coockie avec une durée 
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

//function pour récupérer un coockie
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
    // on récupère le text pour l'élément avec l'id 'notif'
    let texte = document.getElementById("notif");

    // récupère les infos du coockie
    let cart = getCookie('CART')

    // on vérifie si le coockie éxiste, sinon on le crée
    if (!cart) {
        cart = [];
    } else {
        try {
            cart = JSON.parse(cart)
        } catch (e) {
            cart = []
        }
    }

    // on remplace le texte par la nombre d'éléments dans le panier
    texte.innerHTML = cart.length;  
}

// supprimé un éléments précis dans le panier
function delCart(a) {
    //récupère l'id 
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
    // on parcourt tous les id du panier jusqu'à ce que l'id récupéré plus au 
    // est égal à un id du panier, une fois égale on initialise find  à true et on sort des boucles
    for (item of cart) {
        if (item.id == place) {
            find = true;
            break
        }
        index++;
    }

    //si find = true on enlève l'éléments voulu puis on modifie le coockie
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







