export const RULES = {
    inc_directive : /#include *([A-Z|a-z|0-9\/].+)\.htl/g,
    file_extension : /(?!include\b)\b\w+([A-Z|a-z|0-9\/].+)\.htl/g,
    variable : /({{)([A-Z|a-z].+?)(}})/,
    dump : /@dump *([A-Z|a-z].+)\{(.*)}/,
    ternary : /^([A-Z|a-z|0-9\/].+) \? (.+) \: (.+)/,
    ternaryCondition : /([A-Z|a-z|0-9\/].+) (<|>|==|!=) ([A-Z|a-z|0-9\/].+)/,
    ternaryCondition2 : /([A-Z|a-z|0-9\/].+)/
}


/*

========
TERNARY

(condition) ? work : work
    =>
if(condition) {
    work    
} else {
    work
}

*/