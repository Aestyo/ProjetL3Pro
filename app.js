function load_question(){
    const question_name = document.getElementById('question_name');
    const response_1 = document.getElementById('response_1');
    const response_2 = document.getElementById('response_2');
    const response_3 = document.getElementById('response_3');
    const response_4 = document.getElementById('response_4');

    question_name.innerHTML = "Test"

    readJSON("jsonexample.json").then(data => { 
        // Utilisez ici les données JSON qui ont été lues
        console.log(data);
    }).catch(error => {
        // Traitez ici les erreurs potentielles
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