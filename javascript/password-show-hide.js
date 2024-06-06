let pswrdField = document.querySelector(".form input[type='password']"); 
let toggleBtn =  document.querySelector(".form i");

toggleBtn.addEventListener('click', ()=>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add('fa-eye-slash')
        toggleBtn.classList.remove('fa-eye')
    }
    else{
        pswrdField.type = "password";
        toggleBtn.classList.remove('fa-eye-slash');
        toggleBtn.classList.add('fa-eye')
    }
})