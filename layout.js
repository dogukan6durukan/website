import { Parser } from "./template-engine/index.js";

const CONTENTS = {
    home : {
        about_title : "Hello, I'm Dogukan.",
        books : [
            {
                title : "Before Adam",
                author : "Jack London"
            },
            {
                title : "Jonathan Livingston Seagull",
                author : "Richard Bach"
            },
            {
                title : "White Nights",
                author : "Fyodor Dostoevsky"
            }
        ]
    },
}

let cls = new Parser("index.htl","", {
    about_title : CONTENTS.home.about_title,
    books : CONTENTS.home.books
});

await cls.getSource();
cls.parse();
