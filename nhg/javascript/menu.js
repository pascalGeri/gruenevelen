'use strict'
let arrayLinks = [
    ['Startseite','./index.php'],
    ['Aktuelles','./aktuelles.php'], 
    ['Kontakt','./mitglieder.php'], 
    ['LOGIN','./LOGIN.php'], 
    ['Termine','./termine.php'], 
    ['Grüne KUH','./gruenekuh.php'], 
];
function getElement(id) {
    return document.getElementById(id);
}

function createMenu () {
    let container = document.createElement('div'); 
    container.setAttribute('class', 'menu');
    container.setAttribute('id', 'menu');
    for (let i = 0; i<arrayLinks.length; i++) {
        let a = document.createElement('a'); 
        let p = document.createElement('p'); 
        let body = document.getElementsByTagName('body')[0];
        a.setAttribute('href', arrayLinks[i][1]); 
        a.setAttribute('class', 'aMenu'); 
        p.setAttribute('class', 'linkMenu'); 
        p.innerHTML = arrayLinks[i][0];
        a.appendChild(p);
        let deleteBut = document.createElement('div'); 
        deleteBut.setAttribute('id', 'deleteBut');
        deleteBut.innerHTML = "X"; 
        deleteBut.addEventListener('click', function(){
            body.removeChild(getElement('menu')); 
        });
        container.appendChild(deleteBut); 
        container.appendChild(a);  
        body.appendChild(container); 
            }
      
    }


getElement('svgHeader').addEventListener('click', function(){
    createMenu(); 
}); 




    

