function Person(name, secondName, year, month, day, city) {
    this.name = name;
    this.secondName = secondName;
    this.birthDate = new Date(year, month, day);
    this.city = city;
    this.toString = function () {
        return `Name : ${this.name}\nSecond Name : ${this.secondName}\nDate : ${this.birthDate.toDateString()}\nCity : ${this.city}`;
    }
}

function PersonFarm() {
    this.persons = [];
    this.add = function (name, secondName, year, month, day, city) {
        let person = new Person(name, secondName, year, month, day, city);
        return this.persons.push(person);
    }

    this.sort = function () {
        let self = this;
        this.persons.sort(function (a, b) {
            let res = self.sortByCity(a, b);
            if (res !== 0) {
                return res;
            }

            res = self.sortByAge(a, b);
            if (res !== 0) {
                return res;
            }

            return self.sortBySecondName(a, b);
        });
    }

    this.sortByCity = function (a, b) {
        if (a.city > b.city) {
            return 1;
        } else if (a.city < b.city) {
            return -1;
        } else if (a.city === b.city) {
            return 0;
        }
    }

    this.sortByAge = function (a, b) {
        if (a.birthDate.getTime() > b.birthDate.getTime()) {
            return -1;
        } else if (a.birthDate.getTime() < b.birthDate.getTime()) {
            return 1;
        } else if (a.birthDate.getTime() === b.birthDate.getTime()) {
            return 0;
        }
    }

    this.sortBySecondName = function (a, b) {
        if (a.secondName > b.secondName) {
            return 1;
        } else if (a.secondName === b.secondName) {
            return 0;
        } else if (a.secondName < b.secondName) {
            return -1;
        }
    }
}

function init() {
    let farm = new PersonFarm();
    farm.add('Nick', 'Prokopenko', 1999, 10, 23, 'Lviv');
    farm.add('Bob', 'Opanasenko', 1986, 4, 13, 'Kyiv');
    farm.add('Tim', 'Shevchenko', 1997, 8, 8, 'Odesa');
    farm.add('Bread', 'Lysenko', 2000, 5, 17, 'Kharkiv');
    farm.add('Rita', 'Nikolenko', 2002, 11, 10, 'Lviv');
    farm.add('Max', 'Zinchenko', 1995, 4, 23, 'Dnipro');
    farm.add('Tom', 'Denysenko', 1974, 6, 3, 'Kherson');
    farm.add('Den', 'Tymoshenko', 1988, 0, 11, 'Lutsk');
    farm.add('Emma', 'Amosova', 1999, 10, 23, 'Lviv');
    farm.add('Steven', 'Pupko', 1969, 11, 20, 'Rivne');
    farm.add('Zack', 'Shmatko', 1990, 2, 14, 'Lviv');
    farm.add('Bill', 'Dmytrenko', 1992, 3, 4, 'Yalta');
    farm.sort();
    console.log(farm.persons);

    for (let i = 0; i < farm.persons.length; i++) {
        alert(farm.persons[i]);
    }
}

init();