/**
 * 
 *  Cette fonction commence par regarder dans le cache de la session si une liste de question est trouvée
 *  Si oui, elle ne fait rien d'autre
 *  Si non, elle lis le fichier "questions/histoire-geo.json" et sélectionne 3 questions au hasard et les stocke dans le cache
 *  
 * */
async function load_question(){

    let questions = JSON.parse(sessionStorage.getItem('questions')); // On vérifie si les questions sont dans le cache
    
    if(questions == null){
        await readJSON("questions/histoire-geo.json").then(data => {

            // Ici on choisis aléatoirement 3 questions parmis la liste lue dans le JSON
            questions = Array();
            for(let i = 0; i < 3; i++){
                questions.push(data[1].splice(Math.floor(Math.random() * data[1].length), 1));
            }
            sessionStorage.setItem('questions', JSON.stringify(questions));
            
        }).catch(error => {
            console.log(error); // Si jamais il y a une erreur dans le fichier JSON, on atterit ici
        });
    }
}

async function  display_question(){
    questions = await sessionStorage.getItem('questions');  
    console.log(questions); 

    const question = document.getElementById('question');
    const reponse1 = document.getElementById('reponse1');
    const reponse2 = document.getElementById('reponse2');
    const reponse3 = document.getElementById('reponse3');
    const reponse4 = document.getElementById('reponse4'); 


    question.innerHTML = questions[0][0].question
    reponse1.innerHTML = questions[0].reponse1
    reponse2.innerHTML = questions[0].reponse2
    reponse3.innerHTML = questions[0].reponse3
    reponse4.innerHTML = questions[0].reponse4
}

async function  clear_cache(){
    sessionStorage.setItem('questions', null);
}

function readJSON(file) {
    return new Promise((resolve, reject) => {
        let rawFile = new XMLHttpRequest();
        rawFile.overrideMimeType("application/json");
        rawFile.open("GET", file, true);
        rawFile.onreadystatechange = function() {
            if (rawFile.readyState === 4 && rawFile.status == "200") {
                resolve(JSON.parse(rawFile.responseText));
            }
        }
        rawFile.send(null);
    });
}