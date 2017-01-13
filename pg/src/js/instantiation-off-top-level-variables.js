console.log('a=' + a);
//console.log('b=' + b);
console.log('f=' + f);
console.log('g=' + g);

f();
var a = 5;
//a = 5;
function f() {
    console.log('b=' + b);
    var b = 1;
};
var g = function() {};

console.log('a=' + a);
console.log('g=' + g);
