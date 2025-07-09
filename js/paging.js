let contents = document.querySelectorAll(".content-wrapper");
let arr = Array.from(contents);

class Slider
{
    // arr - the elements
    // count - how many pieces to show
    constructor(arr, count){
        this.count = count;
        this.arr = arr;
        this.list = [];
        this.state = 0;
        this.next();
        this.prev();
    }

    // Grouping
    group() {
        if(this.count === "") {
            this.count = this.arr.length;
        }

        let a = this.arr.slice();
        let length = this.count || 1;
        while (a.length > 0) {
          this.list.push(a.splice(0, length));
        }
        return this.listEl();

    }

    listEl() {
        let el = document.querySelector("#content");
        el.innerHTML = "";
        let items = this.list; 
        let sPosition = items[this.state];

        for(let i = 0; i<sPosition.length; i++) {            
            el.appendChild(sPosition[i]);
        }
    }
    
    next(){
        /*
            When clicked just show the next element in this.list
        */
       document.querySelector("button#next").addEventListener("click", () => {
            this.state++;
            if(this.state < this.list.length) {
                return this.listEl();
            } else {
                this.state = 0;
                return this.listEl();
            }           
       });
    }

    prev(){
        /*
            When clicked just show the previous element in this.list
        */
        document.querySelector("button#prev").addEventListener("click", () => {
            this.state--;
            
            if(this.state >= 0) {
                return this.listEl();
            } else {
                this.state = this.list.length - 1;
                return this.listEl();
            }
        });
    }

}


const count = document.querySelector("#count");
count.addEventListener("change", (e) => {
    const slider = new Slider(arr, e.target.value);
    slider.group();
})
