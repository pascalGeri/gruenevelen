'use strict'


class Personen {
    constructor (class_images, cl_cont_person, id_inpElement, class_personDatas) {
        this.class_images = class_images; 
        this.cl_cont_person = cl_cont_person; 
        // this.id_person = id_person; 
        this.class_personDatas = class_personDatas; 
        this.id_inpElement = id_inpElement; 
        this.implement_persons(); 
    }
        implement_persons() {
        for (let i = 0; i<arr_persons.length; i++) {
            let cont_person = document.createElement('article');
            cont_person.setAttribute('class', 'flex '+ this.cl_cont_person); 
            let img = document.createElement('img'); 
            img.setAttribute('class', this.class_images); 
            img.setAttribute('src', arr_persons[i][6]); 
            cont_person.appendChild(img);  
            let sect_personDatas = document.createElement('section');
            cont_person.appendChild(sect_personDatas);
            sect_personDatas.setAttribute('class', this.class_personDatas);
            sect_personDatas.innerHTML = arr_persons[i][0] + '<br>' + arr_persons[i][1] + '<br>' + arr_persons[i][2] + '<br>' + arr_persons[i][3] + 
            '<p class="cont_email" title="Schicken Sie mir eine Email!">' + arr_persons[i][4]+ '</p>Meine Motivation: ' + arr_persons[i][5];
            document.getElementById(this.id_inpElement).appendChild(cont_person); 
        }
        
    }
}


