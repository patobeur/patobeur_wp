console.log('ok');
let cookiepopup = document.getElementById('cookie_popup')
let cookieclose = document.getElementById('cookie_close')
if (cookiepopup) {
    cookiepopup.classList.add('fade');
    setTimeout(() => { 
        cookiepopup.remove() 
    },5000)
}