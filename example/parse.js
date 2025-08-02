import { Parser } from "../index.js";

let cls = new Parser("index.htl","example", {
    title : "Admin Page",
    user_name : "Dogukan",
    age : 19
});

await cls.getSource();
cls.parse();
