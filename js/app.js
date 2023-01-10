async function load_question(){
    let questions;
    await readJSON("questions/histoire-geo.json").then(data => { 
        questions = data;
        console.log(data);        
    }).catch(error => {
        console.log(error);
    });

    console.log(questions);

    const question = document.getElementById('question');
    const reponse1 = document.getElementById('reponse1');
    const reponse2 = document.getElementById('reponse2');
    const reponse3 = document.getElementById('reponse3');
    const reponse4 = document.getElementById('reponse4'); 


    question.innerHTML = questions[1][0].question
    reponse1.innerHTML = questions[1][0].reponse1
    reponse2.innerHTML = questions[1][0].reponse2
    reponse3.innerHTML = questions[1][0].reponse3
    reponse4.innerHTML = questions[1][0].reponse4
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