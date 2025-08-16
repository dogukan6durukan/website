let question = document.getElementById("question");
let question_inp = document.getElementById("question_inp");
let button = document.getElementById("check");
const operations = ["+", "-", "*"];
let randnum1 = Math.floor(Math.random() * 10) + 1;
let randxval = Math.floor(Math.random() * 10) + 1
let randOp = randomVal(operations)
let my_question = `What is the result of the function if x is ${randxval}
f(x) = x ${randOp} ${randnum1}`;

question.innerText = my_question;


function randomVal(arr) {
    if(Array.isArray(arr) && arr.length > 0) {
      return (arr[Math.floor(Math.random()* arr.length)]);
    } else {
        console.error(arr + " isn't Array!");
    }
}

function parse(num1, op, num2) {
    if(typeof num1 === "number" && typeof num2 === "number") {
        switch(op) {
            case "+" : {
                return num1 + num2;
            }
            case "-" : {
                return num1 - num2;
            }
            case "*" : {
                return num1 * num2;
            }
        }       
    }
}

let result = parse(randxval, randOp, randnum1);

button.addEventListener("click", (e) => {
    // e.preventDefault();
    if(question_inp.value == result) {
        document.body.style.backgroundColor = "#DCD7C9";
        question.innerText = "Congrats!";
        
    } else {
        document.body.style.backgroundColor = "red";
        question.innerText=my_question;
    }
})

