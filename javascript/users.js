let userList = document.querySelector(".user .users-list");
let searchBar = document.querySelector(".user input");

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchBar != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      userList.innerHTML = data;
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + encodeURIComponent(searchTerm));
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      if (!searchBar.classList.contains("active")) {
        userList.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 1000);
