import { Dom } from "./jpurify/main.js";

let dom = new Dom();

let theme = "light";

let mybtn = dom.select(".theme-btn");
let content = dom.select(".container");
let body = dom.select("body");

mybtn.text("Light Mode");

mybtn.on("click", (el) => {

    if(theme === "light") {
        body.addClass("darkest");
        content.addClass("dark");
        content.removeClass("light")
        mybtn.text("Light Mode");
        theme = "dark";
    } else {
        body.removeClass("darkest");
        content.removeClass("dark");
        content.addClass("light")
        mybtn.text("Dark Mode");
        theme = "light";
    }
});