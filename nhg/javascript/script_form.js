'use strict' 

class Formelement {
    constructor (type, attr_form_elem = [], attr_form_elem_value = [], 
    attr_label = [], attr_label_value = [], label_text, class_cont, formId) {
    this.attr_form_elem= attr_form_elem;
    this.attr_label = attr_label; 
    this.label_text = label_text; 
    this.attr_form_elem_value = attr_form_elem_value; 
    this.attr_label_value = attr_label_value; 
    this.class_cont = class_cont; 
    this.type = type; 
    this.formId = formId; 
    this.create_form_elem(); 
    }
    create_form_elem () {
        let container_elem = document.createElement('div'); 
        container_elem.setAttribute('class', this.class_cont); 
        let label = document.createElement('label'); 
        let form_element = document.createElement(this.type);
 
        for (let i = 0; i <this.attr_form_elem.length; i++) {
            form_element.setAttribute(this.attr_form_elem[i], this.attr_form_elem_value[i]); 
        } 
        for (let i = 0; i <this.attr_label.length; i++) {
            label.setAttribute(this.attr_label[i], this.attr_label_value[i]); 
        }
        label.innerText = this.label_text; 
        container_elem.appendChild(label);  
        container_elem.appendChild(form_element);
        document.getElementById(this.formId).appendChild(container_elem); 

    }
}
class Button {
    constructor (attributes = [], values = [], id_implement) {
        this.values = values; 
        this.attributes = attributes;
        this.id_implement = id_implement; 
        this.createBut(); 
    }
    createBut() {
        let button = document.createElement('input'); 
        for (let i = 0; i <this.attributes.length; i++) {
            button.setAttribute(this.attributes[i], this.values[i]); 
        }
        document.getElementById(this.id_implement).appendChild(button);  

        
    }
}

class FormMail {
constructor (bg_id, method, action, form_id, email) {
    this.bg_id = bg_id;  
    this.action = action; 
    this.method = method;
    this.form_id = form_id;  
    this.email = email; 
    this.create_mail_form(); 
     }
     create_delete_but(form) {
        let but = document.createElement('div'); 
        but.setAttribute('class', 'delete_but');
        but.innerHTML = 'X'; 
        let id_bg = this.bg_id;
        but.addEventListener('click', function (){
            let body = document.querySelector('body'); 
            let background = document.getElementById(id_bg);
            body.removeChild(background);   
        });
        form.appendChild(but);  
         
    }
     create_mail_form () {
         let bg = document.createElement('div'); 
         let form = document.createElement('form');
         form.setAttribute('method', this.method);
         form.setAttribute('action', this.action);
         form.setAttribute('id', this.form_id);
         this.create_delete_but(form); 
         let delete_but = document.createElement('div'); 
         delete_but.setAttribute('class', 'delete_but');  
         bg.setAttribute('id', this.bg_id);
         bg.appendChild(form);  
         document.querySelector('body').appendChild(bg); 
         new Formelement('input', ['name', 'id', 'value', 'class', 'type'], 
         ['email', 'email', this.email, 'message', 'text'], ['for', 'class'], 
         ['email', 'input_element'], 'Nachricht an: ', 'class_cont', this.form_id); 
         new Formelement('input', ['name', 'id', 'placeholder', 'class', 'type' ], 
         ['name', 'name', 'Vor- und Nachname', 'text_input', 'text'], ['for', 'class'], 
         ['vorname', 'input_element'], 'Ihr Name:', 'class_cont', this.form_id); 
         new Formelement('input',['name', 'id', 'placeholder', 'class', 'type' ], 
         ['betreff', 'betreff', 'Betreff der Nachricht', 'text_input', 'text'], ['for', 'class'], 
         ['betreff', 'input_element'], 'Der Grund Ihres Anliegens', 'class_cont', this.form_id); 
         new Formelement('input',['name', 'id', 'placeholder', 'class', 'type' ], 
         ['replyTo', 'replyTo', 'für eine Rückantwort', 'text_input', 'email'], ['for', 'class'], 
         ['email', 'input_element'], 'Ihre Email-Adresse', 'class_cont', this.form_id); 
         new Formelement('textarea',['name', 'id', 'placeholder', 'class' ], 
         ['textarea', 'textarea', 'Ihre Nachricht', 'textarea'], ['for', 'class'], 
         ['textarea', 'textarea_element'], '', 'class_cont', this.form_id); 
         let cont_but = document.createElement('div');
         cont_but.setAttribute('id', 'cont_but'); 
         form.appendChild(cont_but);  
         new Button(['type', 'id', 'value', 'class', 'title', 'name'], ['submit', 'submit1', 'absenden', 'form_but', 'Email verschicken', 'submit1'], 'cont_but'); 
         new Button(['type', 'id', 'value', 'class'], ['reset', 'reset1', 'zurücksetzen', 'form_but'], 'cont_but'); 
         
                  
     }
     
 }

