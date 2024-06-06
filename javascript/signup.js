const form = document.querySelector(".signup form");
const continueBtn = document.querySelector(".button input");
const errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.addEventListener('click', () => {
 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.response); // Parse the JSON response
            if (data.status === 'success') {
                location.href = 'users.php';
            } else {
                errorText.style.display = "block";
                errorText.textContent  = data.message;
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
});