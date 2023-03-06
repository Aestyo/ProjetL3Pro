async function ChargementQuestionReponses(){
    let questions = Array();
    await fetch("questions/culture-g.json").then(response => response.json())
        .then(data => {
            let random = Math.floor(Math.random() * data[1].length);
            questions.push(data[1].splice(random, 1));
        }).catch(error => {
            console.log(error);
        });
    return questions;
}

async function displayQCM(){
    const question = document.getElementById('question');
    const reponse1 = document.getElementById('reponse1');
    const reponse2 = document.getElementById('reponse2');
    const reponse3 = document.getElementById('reponse3');
    const reponse4 = document.getElementById('reponse4');
    let questions = await ChargementQuestionReponses();
    question.innerHTML = questions[0][0].question;
    reponse1.innerHTML = questions[0][0].reponse1;
    reponse2.innerHTML = questions[0][0].reponse2;
    reponse3.innerHTML = questions[0][0].reponse3;
    reponse4.innerHTML = questions[0][0].reponse4;
}

displayQCM();

// function readJSON(file) {
//     return new Promise((resolve, reject) => {
//         let rawFile = new XMLHttpRequest();
//         rawFile.overrideMimeType("application/json");
//         rawFile.open("GET", file, true);
//         rawFile.onreadystatechange = function() {
//             if (rawFile.readyState === 4 && rawFile.status == "200") {
//                 resolve(JSON.parse(rawFile.responseText));
//             }
//         }
//         rawFile.send(null);
//     });
// }