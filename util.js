import { promises as fs } from 'fs';
import { RULES } from './rules.js';

class Ternary {

  // ! Ternary just works in case of raw text, the features of 
  // ! template engine not work like dumping or variables
  ternary(token) {
    let match = token.match(RULES.ternary);
  
    const operators = {
      equal : "==",
      notequal : "!=",
      bigger : ">",
      smaller : "<"
    }
    
    let condition = match[1];
    // If true
    let conditionMet = match[2];
    // Not true
    let conditionNotMet = match[3];

    let conditionParsing = condition.match(RULES.ternaryCondition);
    let conditionParsing2 = condition.match(RULES.ternaryCondition2);

    let conditionResult;
    let output;

    if(conditionParsing) {
      
      let operand1 = conditionParsing[1];
      let operand2 = conditionParsing[3];

      // Check if operands values are defined in variables
      if(this.variables[operand1] && this.variables[operand2]) {
        // Check the operator
        switch(conditionParsing[2]) {
          case operators.equal:
            conditionResult = operand1 == operand2;
          break;

          case operators.notequal:
            conditionResult = operand1 != operand2;
          break;

          case operators.bigger:
            conditionResult = operand1 > operand2;
          break;

          case operators.smaller:
            conditionResult = operand1 < operand2;
          break;
        }

      } else {
        // Write out the undefined variable!
        console.error("Undefined variable");
        process.exit(1);
      }

      if(conditionResult) {
        output = conditionMet;
      } else {
        output = conditionNotMet;
      }

      this.source = this.source.replace(match[0], output);
    
    } else if(conditionParsing2) {
      // If operand value is defined
      if(this.variables[conditionParsing2[0]]) {
        output = conditionMet;
      } else {
        output = conditionNotMet;
      }

      this.source = this.source.replace(match[0], output);
    
    } 
  } 
}

const Dump = (Sup) => class extends Sup {
  dump(token) {
    let txt = "";
    let match = token.match(RULES.dump);
    let arr = this.variables[match[1].trim()];

    if(arr && Array.isArray(arr)) {
      if(match[2] && match[2] !== "") {
        let els = match[2].split(" ");
        for(let el of arr) {
          for(let data of els) {
            if(el[data]) {
               txt += "<li>"+el[data]+"</li>";
            }
            else {
              console.error("Undefined identifier:", data);
              return;
            }
          }
        }
        let result = "<ul>"+txt+"</ul>";
        this.source = this.source.replace(match[0], result);
        
      } else {
        for(let el of arr) {
          txt += "<li>"+el+"</li>";
        }
        let result = "<ul>"+txt+"</ul>";
        this.source = this.source.replace(match[0], result);
      } 
    }
  }
}

const Variable = (Sup) => class extends Sup {
var(token) {
        let array;
        const regex = new RegExp(RULES.variable, "g");

        while ((array = regex.exec(token)) !== null) {
          if(this.variables[array[2]]) {
            this.source = this.source.replace(array[0], this.variables[array[2]]);
          } else {
            console.error("Undefined variable:", array[2]);
          }
        }
    }
}

const Include = (Sup) => class extends Sup {
    async read(fileName) {
          try {
            const data = await fs.readFile(fileName, { encoding: 'utf8' });
            return {
              data : data,
              file : fileName,
              include : `#include ${fileName}`
            }
          } catch (err) {
            console.error(err);
          }
        }

        include(src) {
          const inc = RULES.inc_directive;
          const path = RULES.file_extension;
    
          if(typeof src === "string") {
            let result = src.match(inc);
            if(result) {
              const file_paths = [];
              for (let file of result) {
                file_paths.push((file.match(path)[0]));
              }
    
            if(file_paths.length > 0) {
    
              Promise.all(file_paths.map(filepath => this.read(filepath)))
                .then(values => {
                  this.replace(values[0])
                })
                .catch(error => {
                  console.error("Error reading files:", error);
                });
            }
          } 
        } 
      }

      replace(data) {
        // if(RULES.file_extension.test(data.data)) {}
        this.source = this.source.replace(data.include, data.data);
      }
};

export class Util extends Include(Variable(Dump(Ternary))) {}
