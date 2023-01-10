function load_question(){
    const nom_theme = document.getElementById('nom_theme');
    const question_name = document.getElementById('question_name');
    const response_1 = document.getElementById('response_1');
    const response_2 = document.getElementById('response_2');
    const response_3 = document.getElementById('response_3');
    const response_4 = document.getElementById('response_4');

    

    readJSON("jsonexample.json").then(data => { 
        nom_theme.innerHTML = data[0].nom
        question_name.innerHTML = data[1][0].question
        response_1.innerHTML = data[1][0].réponse1
        response_2.innerHTML = data[1][0].réponse2
        response_3.innerHTML = data[1][0].réponse3
        response_4.innerHTML = data[1][0].réponse4
        console.log(data);
    }).catch(error => {
        console.log(error);
    });

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