var p = {
    firstName: 'Zhiwen',
    lastName: 'He'
}

function sayHiInChinese() {
    console.log('Hi,' + this.lastName + ' ' + this.firstName + '.');
}

p.sayHi = sayHiInChinese;

p.sayHi();
