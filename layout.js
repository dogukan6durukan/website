import { Parser } from "./template-engine/index.js";
import { VARIABLES } from "./variables.js";

const CONTENTS = {
    // home : {
    //     ...VARIABLES
    // },

    ...VARIABLES.home

}

let cls = new Parser("index.htl","", {
    about_title : CONTENTS.about_title,
    books : CONTENTS.books,
    tech_stack : CONTENTS.tech_stack,
    langs : CONTENTS.langs 
});


await cls.getSource();
cls.parse();
