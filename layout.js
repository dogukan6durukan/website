import { Parser } from "./template-engine/index.js";
import { VARIABLES } from "./variables.js";

const CONTENTS = {
    home : {
        ...VARIABLES
    },
}

let cls = new Parser("index.htl","", {
    about_title : CONTENTS.home.about_title,
    books : CONTENTS.home.books,
    tech_stack : CONTENTS.home.tech_stack,
    langs : CONTENTS.home.langs 
});

await cls.getSource();
cls.parse();
