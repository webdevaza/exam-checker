// add forms

let countForm = document.getElementById('countDiv')

let examForm = document.getElementById('examDiv')

let qCount = document.getElementById('qCount')

document.getElementById('count-add').addEventListener('click', function(){
    countForm.style.display = 'none'
    examForm.style.display = 'inline'
})