async function load_question(){
    let questions = Array();
    if(true){
        await readJSON("questions/histoire-geo.json").then(data => {
            let random = Math.floor(Math.random() * data[1].length);
            questions.push(data[1].splice(random, 1));
            sessionStorage.setItem('question', data);
            question.innerHTML = questions[0][0].question;
            reponse1.innerHTML = questions[0][0].reponse1
            reponse2.innerHTML = questions[0][0].reponse2
            reponse3.innerHTML = questions[0][0].reponse3
            reponse4.innerHTML = questions[0][0].reponse4
        }).catch(error => {
            console.log(error);
        });
    }
}



// // Charger les données JSON dans un objet JavaScript
// var data = {};
// fetch('question/histoire-geo.json')
//   .then(response => response.json())
//   .then(json => {
//     data = json;
//   });

// // Récupérer le bouton "bienvenue"
// var button = document.getElementById("bienvenue");

// // Fonction pour afficher les données JSON de manière aléatoire
// function displayRandomData() {
//   // Récupérer un nombre aléatoire entre 0 et la longueur de l'objet JSON
//   var randomIndex = Math.floor(Math.random() * data.length);
  
//   // Récupérer les données à l'index aléatoire
//   var randomData = data[randomIndex];
  
//   // Afficher les données dans la console
//   console.log(randomData);
// }

// // Ajouter un écouteur d'événement pour l'événement "click" sur le bouton "bienvenue"
// button.addEventListener("click", displayRandomData);





/**
 * 
 *  Cette fonction récupère les questions depuis le cache,
 *  Ensuite elle modifie les éléments de la page QCM pour correspondre aux éléments de la question
 *  liée à l'itération actuelle
 *  
 * */
async function  displayQCM(){
    let questions = await load_question();
    const question = document.getElementById('question');
    const reponse1 = document.getElementById('reponse1');
    const reponse2 = document.getElementById('reponse2');
    const reponse3 = document.getElementById('reponse3');
    const reponse4 = document.getElementById('reponse4'); 

    question.innerHTML = questions[0][0].question
    reponse1.innerHTML = questions[0][0].reponse1
    reponse2.innerHTML = questions[0][0].reponse2
    reponse3.innerHTML = questions[0][0].reponse3
    reponse4.innerHTML = questions[0][0].reponse4
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