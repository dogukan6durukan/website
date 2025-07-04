const date = document.querySelector("#date");
const currentDate = new Date();

let year = currentDate.getFullYear();
let month = currentDate.getMonth() + 1;
let day = currentDate.getDate();

date.value = `${year}-0${month}-0${day}`;