<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" 
    content="Die Internetpräsenz des Ortsverbandes der Grünen in Velen. 
    Hier erfahren Sie alles Wissenswerte über uns und können mit
    uns in Kontakt treten. "
    >
    <meta name="keywords" content="Grüne Velen Ramsdorf Ortsverband Kontakt Politik Stadtrat gruene-velen">
    <meta name="robots" content="index, follow">
    <title>Die Grünen in Velen</title>
   <link rel="stylesheet" href="unterseiten.css">
   <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
    
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
</head>
<body>
    <?php
    $fehlerfelder = []; 
    $regMail = "/^([a-zA-Z\d!§$%&*=?\^_'`(\{|\})~\"]+\.?[a-zA-Z\d!§$%&*=?\^_'`(\{|\})~\"]){}+@$/"; 
    $bool = false;  
    if (isset($_POST['textarea'])) { //da der Button nur ein span ist, wird submit1 nicht angelegt. Darum muss an dieser Stelle überprüft werden, ob die textarea vorhanden ist anstelle von isset submit1
       $bool =  true; 
 
        if(!isset($_POST['email'])||!is_string('email')||trim($_POST['email'])===''||preg_match($regMail, $_POST['email'] === 0)){
            $bool = false;
            $fehlerfelder[] = 'Email'; 
        }
         
        if(!isset($_POST['name'])||!is_string($_POST['name'])||trim($_POST['name'] ==='')) {
            $bool = false;
            $fehlerfelder[] = 'Name';
        }
        if(!isset($_POST['betreff'])||!is_string($_POST['betreff'])||trim($_POST['betreff'] ==='')) {
            $bool = false;
            $fehlerfelder[] = 'Betreff';
        }
        if(!isset($_POST['textarea'])||!is_string($_POST['textarea'])||trim($_POST['textarea'] ==='')) {
            $bool = false;
            $fehlerfelder[] = 'textarea';
        }
        if (!$bool) {
            print_r($fehlerfelder); 
            echo '<h2>Folgende Felder sind fehlerhaft ausgefüllt:</h2>'; 
            echo '<ul> <li>'; 
            echo  implode('</li><li>', $fehlerfelder); 
            echo '</li></ul>'; 
        }
        else {
            $target_email = (isset($_POST['target_email']) && is_string($_POST['target_email']))? htmlspecialchars($_POST['target_email']) : ''; 
            $email_client = (isset($_POST['email']) && is_string($_POST['email']))? htmlspecialchars($_POST['email']): ''; 
            $name = (isset($_POST['name']) && is_string($_POST['name']))? htmlspecialchars($_POST['name']): ''; 
            $betreff = (isset($_POST['betreff']) && is_string($_POST['betreff']))? htmlspecialchars($_POST['betreff']): ''; 
            $message = (isset($_POST['textarea']) && is_string($_POST['textarea']))? htmlspecialchars($_POST['textarea']): ''; 
            
            echo "Sie haben erfolgreich folgende Email an $target_email versendet: ";
            echo 'Ihr Name: ' . $name .'<br>'; 
            echo 'Ihr Betreff: ' . $betreff . '<br>'; 
            echo 'Ihre Nachricht: ' . $message . '<br>'; 
            
            
            mail($target_email, "Eine Nachricht von: $name", $message, "From:" .  $email_client . "\r\n Cc:" . $betreff. "\r\n"."Reply-To:" .  $email_client);
            ?>
            <div id="div_hist_back">
                <button id="but_history_back" class="but_afterMail">zurück zur Homepage</button>
                <button id="" href="google.de"class="but_afterMail">ecosia(öko-Suchmaschine)</button>
            </div>
    
    <script>
        document.getElementById('but_history_back').addEventListener('click', function (){
            window.history.back(); 
        }); 
    </script>
    <?php
    
            
        }
        
    }
    
    else {
?>
    <div id="hauptbereich">
    <div id="header">
    <header>
        <figure><img id="logo" src="images/logoGruene.png"/>
            <figcaption>
                <span style="color:#89D7F5 ; font-size: 75%; line-height: 1em;">Bundnis90/</span><span style="color: #49962B ;font-size: 85%;line-height: 1em;">Die Grünen </span>
            </figcaption>
        </figure>
        <h1><span style="color: rgb(150, 43, 145);">Ortsverband</span> Velen/Ramsdorf</h1>
    </header>
    
    <nav>
        <ul>
            <li class="naviButton"><a href="index.html"><div class="button">Startseite</div></a> </li>
            <li class="naviButton"><a href="jungegruene.html"><div class="button">Junge Grüne</div></a> </li>
            <li class="naviButton"><a href="aktuelles.html"><div class="button">Aktuelles</div></a> </li>
            <li class="naviButton"><a href="unserprogramm.html"><div class="button">Unser Programm</div></a> </li>
        </ul>
    </nav>
    </div>

    <main id="members">
        <h2 id="aboutUs">Die aktiven Mitglieder des Ortsverbandes</h2> 

    </main>
    <script src="person_array.js"></script>
    <script src="personen.js"></script>
    <script>
            new Personen ('bilder', 'containerPerson', 
            'members', 'personenDaten');
            let boolForm = false; let boolsubmit = [0, 0, 0, 0]; 
            let regEmail = /^([a-z\.-\d]+)@[a-z\d-]+\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
            let regText = /^[a-zäöüßA_ZÄÖÜ\s]$/;
            let regTextarea = /^[\wÄÖÜäöüß&%$§!-?=,:;\.\(\s\r\n"\~\+\*]+$/; 
            let p_emails = document.getElementsByClassName('cont_email'); 
            for (let i = 0; i<p_emails.length; i++) {
                p_emails[i].addEventListener('click', function(event) {
                    new FormMail('bg_form', 'POST', '', 'form_mail');
                    let email = event.target.innerText; 
                    let input_target_email = document.querySelector('#target_email'); 
                    input_target_email.setAttribute('value', email);
                    boolForm = true; 
                    if (boolForm) {
                        //checking the inputs Text
                        let inputsText = document.querySelectorAll('[type=text]'); 
                            for (let i = 0;i<inputsText.length; i++) {
                                if (i>0) {
                                    inputsText[i].addEventListener('input', function(event){
                                        if (!regText.test(event.target.value)){
                                            event.target.parentNode.nextSibling.innerText = "Bitte keine Sonderzeichen oder Zahlen eingeben!"; 
                                            boolsubmit[i-1] = 0; 
                                        }
                                        if (!regText.test(event.target.value)){
                                            event.target.parentNode.nextSibling.innerText = ""; 
                                            boolsubmit[i-1] = 1;
                                        }
                                    });
                                }
                            } 
                            for (let i = 0;i<inputsText.length; i++) {
                                if (i>0) {
                                    inputsText[i].addEventListener('blur', function(event){
                                    if (!regText.test(event.target.value)){
                                        boolsubmit[i-1] = 1;
                                        }
                                });
                                }
                                 
                            }
                            //Checking the email
                            let inp_email = document.getElementById('email'); 
                                inp_email.addEventListener('blur', function (event){
                                    if (!regEmail.test(event.target.value)){
                                        
                                        let errorEmail = document.getElementById('errorEmail'); 
                                        errorEmail.innerText = "Bitte geben Sie eine verifizierbare Email-Adresse ein!"; 
                                        boolsubmit[2] = 0; 
                                        }
                                    if (regEmail.test(event.target.value)){
                                        document.getElementById('errorEmail').innerText = '';  
                                        boolsubmit[2] = 1;    
                                    }
                                });
                            //Checking the textarea
                            let textarea = document.getElementById('textarea'); 
                                textarea.addEventListener('input', function (event){
                                    if (!regTextarea.test(event.target.value)){
                                        document.getElementById('errorTextarea').innerText = "Bitte geben Sie keine Sonderzeichen ein!"; 
                                        boolsubmit[3] = 0; 
                                        }
                                    if (regTextarea.test(event.target.value)){
                                        document.getElementById('errorTextarea').innerText = '';  
                                        boolsubmit[3] = 1;    
                                    }
                                });
                        boolForm = false;  
                       } 
                });
            }
                
        </script> 
    
        <script src="script_form.js"></script>
        
    <footer id="footer">
        <a href="./impressum.html">Impressum</a><span class="footerText"></span>
    </footer>
    <script src="textTreffen.js"></script>
</div>
    <?php
    }
    ?>
</body>
</html>
