function func(fn, ln) {
    //console.log('Hi, ' + this.ln + ' ' + this.fn + '.');
    console.log('Hi, ' + this[ln] + ' ' + this[fn] + '.');
}

var p = {
    firstName: 'Zhiwen',
    lastName: 'He'
};
func.apply(p, ['firstName', 'lastName']);
