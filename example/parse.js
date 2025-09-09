import { Parser } from "../index.js";

let cls = new Parser("index.htl","example", {
    title : "Admin Page",
    user_name : "Dogukan",
    age : 19,
    tane : "tane",
    num1 : 1,
    num2 : 2,
    nane : "name",
    num : "kaka",
    isNum : true,
    books : [
        {
            title : "foo1",
            author: "bar1"
        },
        {
            title : "foo2",
            author: "bar2"
        },
        {
            title : "foo3",
            author: "bar3"
        },
    ]
});

await cls.getSource();
cls.parse();
