'use strict'
let arrayLinks = [
    ['Startseite','../../index.php'],
    ['Aktuelles','./aktuelles.php'], 
    ['Kontakt','./mitglieder.php'], 
    ['LOGIN','./LOGIN.php'], 
    ['Termine','./termine.php']
];
let arrWahlprogramm = [
    'Wahlprogramm:',
    ['Artenvielfalt','artenvielfalt.php' ], 
    ['Wirtschaft','./wirtschaft.php'], 
    ['Soziales','./soziales.php'], 
    ['Klimaschutz','./klimaschutz.php'], 
    ['Kultur','./kultur.php']
    ]
function getElement(id) {
    return document.getElementById(id);
}

function createMenu () {
    let container = document.createElement('div'); 
    container.setAttribute('class', 'menu');
    container.setAttribute('id', 'menu');
    let body = document.getElementsByTagName('body')[0];
    for (let i = 0; i<arrayLinks.length; i++) {
        let a = document.createElement('a'); 
        console.log (a); 
        let p = document.createElement('p');
        a.setAttribute('href', arrayLinks[i][1]); 
        a.setAttribute('class', 'aMenu'); 
        p.setAttribute('class', 'linkMenu'); 
        p.innerHTML = arrayLinks[i][0];
        a.appendChild(p);
        container.appendChild(a); 
        }
    let head_wahlprogramm = document.createElement('p');   
        head_wahlprogramm.className = 'linkMenu aMenuWp'; 
        console.log(head_wahlprogramm); 
        head_wahlprogramm.innerHTML = arrWahlprogramm[0]; 
        for (let i = 1; i<arrWahlprogramm.length; i++){
            let a = document.createElement('a');
            a.className = 'a_wp'; 
            a.innerHTML = arrWahlprogramm[i][0];
            a.href = arrWahlprogramm[i][1]
            head_wahlprogramm.appendChild(a); 
        }
        container.appendChild(head_wahlprogramm);
        let deleteBut = document.createElement('div'); 
        deleteBut.setAttribute('id', 'deleteBut');
        deleteBut.innerHTML = "X"; 
        deleteBut.addEventListener('click', function(){
            body.removeChild(getElement('menu')); 
        });
        container.appendChild(deleteBut); 
        body.appendChild(container); 
      
    }


getElement('svgHeader').addEventListener('click', function(){
    createMenu(); 
}); 




    

