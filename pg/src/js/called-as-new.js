function func() {
    this.firstName = 'Zhiwen';
    this.lastName = 'He';
}

var p = new func();
console.log('Hi, ' + p.lastName + ' ' + p.firstName + '.');
