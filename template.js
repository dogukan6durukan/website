import { Parser } from "./template-engine/index.js";
import { VARIABLES } from "./variables.js";


const CONTENTS = {
    ...VARIABLES.template_doc
} 


let cls = new Parser("templatedoc.htl", "template", {
    page_title : CONTENTS.page_title
});

await cls.getSource();
cls.parse();
