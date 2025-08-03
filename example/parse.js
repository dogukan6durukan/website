import { Parser } from "../index.js";

let cls = new Parser("index.htl","example", {
    title : "Admin Page",
    user_name : "Dogukan",
    age : 19,
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
