# Template Engine
This template engine does some HTML file concatenation and allows dynamic values, as in `example/`:

index.htl:
```
#include layouts/header.htl
<h1>{{title}}</h1>
Hello, {{user_name}} you are {{age}} years old!
#include layouts/footer.htl
```
Before parsing it, let's check if we have both `layouts/header.htl` and `layouts/footer.htl` files. In the `example/` directory, they already exist:

layouts/header.htl:
```
<header>This is headerrr!</header>
<ul>
    <li>Foo</li>
    <li>Bar</li>
    <li>Baz</li>
</ul>
```
layouts/footer.htl
```
<footer>Hello from footer!</footer>
```

And parse it with Node, and can use the boilerplate down there, importing the main file `index.js` and parse:<br>
parse.js
```js 
// Importing parser
import { Parser } from "../index.js";

// We set our Parser
let cls = new Parser("index.htl","example", {
    title : "Admin Page",
    user_name : "Dogukan",
    age : 19
});

/*
First argument : The .htl file the get read
Second argument : The HTML file name you generate and don't need to specify .html extension
Third argument : The variable values you specified in your .htl file.
*/

// Boilerplate : Just reading .htl file and parses.
await cls.getSource();
cls.parse();
```
And in `example.html` file we have our html file converted from `index.htl` at the beginning!
```html
<header>This is headerrr!</header>
<ul>
    <li>Foo</li>
    <li>Bar</li>
    <li>Baz</li>
</ul>
<h1>Admin Page</h1>
Hello, Dogukan you are 19 years old!
<footer>Hello from footer!</footer>
````

**Note:** For now, you can't do the same things under the child `.htl` files. E.g., you can't add dynamic values or include files under the child ones. It only works in base `.htl` like `index.htl` file that you compile. 

That's all. I also already have some plans to add a `for` loop to generate elements and `if` conditions. If you find any bugs and have some advice, I'm open to it.