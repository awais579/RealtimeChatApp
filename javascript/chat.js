const form = document.querySelector(".typing-area");
const inputField = document.querySelector(".input-field");
const sendBtn = document.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/inser-chat.php", true);
  xhr.onload = () => {
    if (xhr.status === 200) {
      inputField.value = "";
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      console.log(data);
      chatBox.innerHTML = data;
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 1000);
