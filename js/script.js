const rep1 = document.getElementById('rep1');
const rep2 = document.getElementById('rep2');
const rep3 = document.getElementById('rep3');
const rep4 = document.getElementById('rep4');
const input = document.getElementById('input_hidden');

rep1.onclick = function() {
    input.value = rep1.textContent;
    rep1.style.backgroundColor = '#f77027'; 
    rep1.style.color = 'white';
    rep2.style.backgroundColor = 'white';
    rep2.style.color = '#f77027';
    rep3.style.backgroundColor = 'white';
    rep3.style.color = '#f77027';
    rep4.style.backgroundColor = 'white';
    rep4.style.color = '#f77027';
}

rep2.onclick = function() {
    input.value = rep2.textContent;
    rep2.style.backgroundColor = '#f77027';
    rep2.style.color = 'white';
    rep1.style.backgroundColor = 'white';
    rep1.style.color = '#f77027';
    rep3.style.backgroundColor = 'white';
    rep3.style.color = '#f77027';
    rep4.style.backgroundColor = 'white';
    rep4.style.color = '#f77027';
}

rep3.onclick = function() {
    input.value = rep3.textContent;
    rep3.style.backgroundColor = '#f77027';
    rep3.style.color = 'white';
    rep1.style.backgroundColor = 'white';
    rep1.style.color = '#f77027';
    rep2.style.backgroundColor = 'white';
    rep2.style.color = '#f77027';
    rep4.style.backgroundColor = 'white';
    rep4.style.color = '#f77027';
}

rep4.onclick = function() {
    input.value = rep4.textContent;
    rep4.style.backgroundColor = '#f77027';
    rep4.style.color = 'white';
    rep1.style.backgroundColor = 'white';
    rep1.style.color = '#f77027';
    rep2.style.backgroundColor = 'white';
    rep2.style.color = '#f77027';
    rep3.style.backgroundColor = 'white';
    rep3.style.color = '#f77027';
}
