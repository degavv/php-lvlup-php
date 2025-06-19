function getStart() {
    return prompt('Введіть початкове число');
}

function getEnd() {
    return prompt('Введіть кінцеве число');
}

function validation(value) {
    let error = '';
    if (value === '') {
        error = 'Значення не може бути пустим';
    }
    else {
        value = +value;
        if (value + Infinity !== Infinity) {
            error = 'Значення має бути числом';
        }
    }
    return error;
}

function createArray(start, end) {
    if (start > end) {
        let swaped = swap(start, end);
        start = swaped[0];
        end = swaped[1];
    }
    let array = [];
    for (let j = 0, item = start; item <= end; item++, j++) {
        array[j] = item;
    }

    return array;
}

function arrayFilter(array, filterFunc) {
    let filtered = [];
    for (let i = 0, j = 0; i < array.length; i++) {
        if (filterFunc(array[i])) {
            filtered[j] = array[i];
            j++;
        };
    }

    return filtered;
}

function filterPrime(value) {
    if (value < 2) {
        return false;
    } else if (value === 2) {
        return true;
    } else if (value % 2 === 0) {
        return false;
    } else {
        for (let i = 3; i < value; i += 2) {
            if (value % i === 0) {
                return false;
            }
        }
    }

    return true;
}

function exitProgramPopup() {
    let msg = 'Натисніть OK для виходу з програми або CANCEL для повернення';
    let select = confirm(msg);

    return select;
}

function exitProgramProc(selection, backToFunc, arg = null) {
    if (selection) {
        alert('До побачення!');
        return 'exit';
    } else {
        if (arg === null) {
            return backToFunc();
        } else {
            return backToFunc(arg);
        }
    }
}

function promptProc(promptFunc) {
    let inputValue = promptFunc();

    if (inputValue === null) {
        let exit = exitProgramPopup();
        return exitProgramProc(exit, promptProc, promptFunc);
    } else {
        let error = validation(inputValue);

        if (error) {
            alert(error);
            return promptProc(promptFunc);
        }
    }

    return +inputValue;
}

function swap(num1, num2) {
    let tmp = num1;
    num1 = num2;
    num2 = tmp;

    return [num1, num2];
}

function init() {
    let start = promptProc(getStart);
    if (start === 'exit') {
        return;
    }

    let end = promptProc(getEnd);
    if (end === 'exit') {
        return;
    }

    let array = createArray(start, end);
    let filtered = arrayFilter(array, filterPrime);
    alert(filtered);

    return exitProgramProc(exitProgramPopup(), init);
}

init();