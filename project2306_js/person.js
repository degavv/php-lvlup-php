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
    this.names = ['Nick', 'Bob', 'Tim', 'Bread', 'Rita', 'Max', 'Tom', 'Den', 'Emma', 'Steven', 'Zack', 'Bill',];
    this.secondNames = ['Prokopenko', 'Opanasenko', 'Shevchenko', 'Lysenko', 'Nikolenko', 'Zinchenko', 'Denysenko', 'Tymoshenko', 'Amosenko', 'Pupko', 'Shmatko', 'Dmytrenko',];
    this.cities = ['Lviv', 'Kyiv', 'Odesa', 'Kharkiv', 'Dnipro', 'Kherson', 'Lutsk', 'Yalta', 'Rivne',];

    this.create = function (count) {
        for (i = 0; i <= count; i++) {
            this.add(
                this.getRandomItem(this.names),
                this.getRandomItem(this.secondNames),
                this.getRandomInt(1990, 2000),
                this.getRandomInt(0, 11),
                this.getRandomInt(1, 31),
                this.getRandomItem(this.cities),
            )
        }
    }

    this.getRandomInt = function (min, max) {
        let rand = Math.floor(Math.random() * (max - min + 1) + min);
        return rand;
    }

    this.getRandomItem = function (array) {
        let randIndex = this.getRandomInt(0, array.length - 1);
        return array[randIndex];
    }

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
    farm.create(11);
    farm.sort();
    console.log(farm.persons);
    for (let i = 0; i < farm.persons.length; i++) {
        alert(farm.persons[i]);
    }
}

init();