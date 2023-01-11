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
    return questions;
}

/**
 * 
 *  Cette fonction récupère les questions depuis le cache,
 *  Ensuite elle modifie les éléments de la page QCM pour correspondre aux éléments de la question
 *  liée à l'itération actuelle
 *  
 * */
async function  displayQCM(){
    let questions = await load_question();

    const txt = document.getElementById('question');
    const button = document.getElementById("jeReponds")
    const case1 = document.getElementById('reponse1');
    const case2 = document.getElementById('reponse2');
    const case3 = document.getElementById('reponse3');
    const case4 = document.getElementById('reponse4'); 

    async function waitForButtonClick() {
        return new Promise((resolve) => {
            button.addEventListener("click", resolve);
        });
    }

    for(let i = 0; i < 3; i++) {
        txt.innerHTML = questions[i][0].question
        case1.innerHTML = questions[i][0].reponse1
        case2.innerHTML = questions[i][0].reponse2
        case3.innerHTML = questions[i][0].reponse3
        case4.innerHTML = questions[i][0].reponse4
        await waitForButtonClick();
    }
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