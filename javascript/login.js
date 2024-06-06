const form = document.querySelector(".login form");
const continueBtn = document.querySelector(".button input");
const errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.addEventListener('click', () => {
 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {    
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data =xhr.response; 
            // console.log(data);
            if (data === 'success') {
                location.href = 'users.php';
            } else {
                errorText.style.display = "block";
                errorText.textContent  = data;
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
});