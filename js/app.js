function load_question(){
    const nom_theme = document.getElementById('nom_theme');
    const question_name = document.getElementById('question_name');
    const reponse_1 = document.getElementById('reponse_1');
    const reponse_2 = document.getElementById('reponse_2');
    const reponse_3 = document.getElementById('reponse_3');
    const reponse_4 = document.getElementById('reponse_4'); 

    readJSON("jsonexample.json").then(data => { 
        nom_theme.innerHTML = data[0].nom
        question_name.innerHTML = data[1][0].question
        reponse_1.innerHTML = data[1][0].reponse1
        reponse_2.innerHTML = data[1][0].reponse2
        reponse_3.innerHTML = data[1][0].reponse3
        reponse_4.innerHTML = data[1][0].reponse4
        console.log(data);
    }).catch(error => {
        console.log(error);
    });
}

function load_theme(){
    const input = document.querySelector('input[type="file"]');

    input.addEventListener('change', (event) => {
        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            console.log(files[i].name);
        }
    });


    const button = document.createElement('button');
    button.textContent = 'Cliquez ici';
    button.addEventListener('click', function() {
        console.log('Le bouton a été cliqué');
    });
    const div = document.getElementById('test');
    div.appendChild(button);
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