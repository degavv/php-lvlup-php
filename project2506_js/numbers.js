function Numbers() {
    this.names = {
        '0': 'нуль',
        '1': 'один',
        '2': 'два',
        '3': 'три',
        '4': 'чотири',
        '5': 'п\'ят',
        '6': 'шіст',
        '7': 'сім',
        '8': 'вісім',
        '9': 'дев\'ят',
        '10': 'десять',
        '14': 'чотирнадцять',
        '40': 'сорок',
        '90': 'дев\'яносто',
        '100': 'сто',
        '200': 'двісті',
    }

    this.getInput = function () {
        let number = prompt('Введіть число');
        return number;
    }

    this.getName = function (number) {
        const methods = {
            1: 'first',
            2: 'second',
            3: 'third',
        }
        return this[methods[number.length] + 'Radix'](number);
    }

    this.firstRadix = function (number) {
        let name = this.names[number];
        let char = name[name.length - 1];
        if (char === 'т') {
            return name + 'ь';
        }
        return name;
    }

    this.secondRadix = function (number) {
        let name = '';
        if (number === '10' || number === '14') {
            name = this.names[number];
        } else {
            if (number[0] === '1') {
                name = this.names[number[1]] + 'надцять';
            } else {
                if (number[0] === '2' || number[0] === '3') {
                    name = this.names[number[0]] + 'дцять';
                } else if (number[0] === '4') {
                    name = this.names['40'];
                } else if (number[0] === '9') {
                    name = this.names['90'];
                } else {
                    name = this.names[number[0]] + 'десят';
                }

                if (number % 10 !== 0) {
                    name += ' ' + this.firstRadix(number[1]);
                }
            }
        }
        return name;
    }

    this.thirdRadix = function (number) {
        let name = '';
        if (number[0] === '1' || number[0] === '2') {
            name = this.names[number[0] + '00'];
        } else if (number[0] === '3' || number[0] === '4') {
            name = this.names[number[0]] + 'ста';
        } else {
            name = this.names[number[0]] + 'сот';
        }

        if (number % 100 !== 0) {
            name += ' ' + this.secondRadix(number[1] + number[2]);
        }
        return name;
    }
}

let dictionary = new Numbers();
while(1){
    alert(dictionary.getName(dictionary.getInput()));
}