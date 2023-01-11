async function ChargementQuestionReponses(){
    let questions = Array();
    if(true){
        await readJSON("questions/maths.json").then(data => {
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

async function  displayQCM(){
    let questions = await ChargementQuestionReponses();
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


// Ajouté par Espoir

//Faire une fonction qui ne prend rien en paramètres et qui retourne un tableau de  4 questions opérations élémentaire avec leur réponse

function return_math_questions()
{
    let questions=Array();
    let operations=['+','-','*','/'];

    for(var i=0;i<4;i++){

            let nombre1=Math.floor(Math.random() * 10) +1;
            let nombre2=Math.floor(Math.random() * 10) +1;
        
            //on choisit aléatoirement une opération

            let operation=operations[Math.floor(Math.random()*operations.length)];

            let question;
            let reponse;

            switch(operation)
            {
                case '+':
                    question=nombre1 +'+' +nombre2;
                    reponse=nombre1+nombre2;
                    break;
                case '-':
                    question=nombre1 +'-' +nombre2;
                    reponse=nombre1-nombre2;
                    break;
                case '*':
                    question=nombre1 +'*' +nombre2;
                    reponse=nombre1*nombre2;
                    break;
                case '/':
                    question=nombre1 +'/' +nombre2;
                    reponse= Math.floor(nombre1/nombre2);
                    break;    
            }

    // questions.push({'question':question,'reponse':reponse});
    questions.push({nombre1:nombre1,operation:operation,nombre2:nombre2,reponse:reponse})
   
    // questions.push([question,reponse]);

    // questions.push([nombre1,operation,nombre2,reponse]);

    }
   return questions;

}


var arrayOfQuestionObjects =return_math_questions();


function display_math_question(arrayOfQuestionObjects){

    const nombre1 = document.getElementById('nombre1');
    const nombre2 = document.getElementById('nombre2');
    const operation = document.getElementById('operation');

    for (var i = 0; i < arrayOfQuestionObjects.length; i++)
     {

      nombre1.innerHTML= arrayOfQuestionObjects[i].nombre1;
      nombre2.innerHTML= arrayOfQuestionObjects[i].nombre2;
      operation.innerHTML= arrayOfQuestionObjects[i].operation;

     }

     //ou 

     /* 
     nombre1.innerHTML= arrayOfQuestionObjects[0].nombre1;
     nombre2.innerHTML= arrayOfQuestionObjects[0].nombre2;
     operation.innerHTML= arrayOfQuestionObjects[0].operation;
     */

   
}