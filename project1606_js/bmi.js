function getHeight() {
    let height = prompt('Введіть свій зріст в сантиметрах');
    return height;
};

function getWeight() {
    let weight = prompt('Введіть свою вагу в кілограмах');
    return weight;
};

function exitProgramPopup() {
    let msg = 'Натисніть OK для виходу з програми або CANCEL для повернення';
    let select = confirm(msg);
    
    return select;
};

function exitProgramProc(selection, backToFunc, arg = null) {
    if (selection) {
        alert('До побачення!');
        return 'exit';
    } else {
        if(arg !== null){
            backToFunc(arg);  
        } else {
            backToFunc();
        }
    }
};

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
        else if (value === 0) {
            error = 'Значення не може бути 0';
        }
        else if (value < 0) {
            error = 'Значення не може бути від\'ємним числом';
        }
    }
    return error;
}

// promptType getHeight|getWeight
function promptProc(promptFunc) {
    let inputValue = promptFunc();

    //Cancel
    if (inputValue === null) {
        let selection = exitProgramPopup();
        let exit = exitProgramProc(selection, promptProc, promptFunc);
        if(exit === 'exit'){
            return 'exit';
        }
    } else {
        let error = validation(inputValue);
        if (error) {
            alert(error);
            promptProc(promptFunc);
        } else {
            return +inputValue;
        }
    }

}

function calcBMI(heightCent, weightKilo) {
    let height = heightCent / 100;
    let weight = weightKilo;
    let BMI = weight / height ** 2;
    return BMI;
}

function getDietAdvice(BMI) {
    let advice = '';
    if (BMI < 17.25) {
        advice = 'Необхідно значно збільшити калорійність раціону';
    } else if (BMI < 18.5) {
        advice = 'Необхідно трохи збільшити калорійність раціону';
    } else if (BMI < 25) {
        advice = 'Продовжуйте харчуватися з тією ж калорійністю';
    } else if (BMI < 32.5) {
        advice = 'Необхідно трохи зменшити калорійність раціону';
    } else {
        advice = 'Необхідно значно зменшити калорійність раціону';
    }

    return advice;
}

function init() {
    let height = promptProc(getHeight);
    if(height === 'exit'){
        return;
    }
    let weight = promptProc(getWeight);
        if(weight === 'exit'){
        return;
    }
    let BMI = calcBMI(height, weight);

    alert(getDietAdvice(BMI));
    init();
};

init();