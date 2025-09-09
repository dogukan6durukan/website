import { promises as fs } from 'fs';
import { RULES } from './rules.js';
import { Util } from './util.js';
import { generateHTML } from './export.js';

export class Parser extends Util {

    constructor(src, title, variables) {
      super();
      this.source = src;
      this.title = title;
      this.variables = variables;
    }

    async getSource() {
      let result = RULES.file_extension.test(this.source);
      if(result && typeof this.source === "string") {
      try {
        const data = await fs.readFile(this.source, { encoding: 'utf8' });
        this.source = data;
      } catch (err) {
        console.error(err);
      }
      }
    } 
    parse() {
      let source = this.source;
      const lines = source.split("\n");
      for(let token of lines) {
        if(RULES.inc_directive.test(token)) {
          this.include(token);
        } 
        else if(RULES.variable.test(token)) {
          this.var(token);
        }
        else if(RULES.dump.test(token)) {
          this.dump(token);
        }
        else if(RULES.ternary.test(token)) {
          this.ternary(token);
        }
      }


      // if there is only not main file to parse, wait until all files resolved
      // then generate HTML with the latest result

      setTimeout(() => {
        generateHTML(this.source, this.title);
      }, 100)

    } 
}