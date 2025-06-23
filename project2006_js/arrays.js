function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function createRndArray(range) {
    if (range <= 0) {
        return [];
    }

    let array = createRndArray(range - 1);
    array.push(getRndInteger(10, 99));

    return array;
}

function filterEven(array) {
    let arrayEven = array.filter(value => value % 2 === 0);
    return arrayEven;
}

function filterUnique(array) {
    let uniqueArray = array.filter((value, index, array) => {
        return array.indexOf(value) === index;
    })
    
    return uniqueArray;
}

function sortArray(array){
    return array.sort(function(a, b) { return b - a; });
}

function toStr(array){
    return array.join(' : ');
}

let rand = createRndArray(10);
console.log(rand);
let evens = filterEven(rand);
console.log(evens);
let uniques = filterUnique(evens);
console.log(uniques);
let sorted = sortArray(uniques);
console.log(sorted);
let arrToStr = toStr(sorted);
console.log(arrToStr);
