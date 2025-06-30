function PythagorasTable() {
    this.inputStart = function () {
        let start = prompt('Введіть початкове значення таблиці');
        return start;
    }

    this.inputEnd = function () {
        let end = prompt('Введіть кінцеве значення таблиці');
        return end;
    }

    this.createTable = function (array) {
        const table = document.querySelector('.pythagoras');
        console.log(table);
        let content = '';
        for (let i = 0; i < array.length; i++) {
            content += `<tr>`;

            for (let j = 0; j < array.length; j++) {
                content += `<td>${array[i][j]}</td>`;
            }
            content += `</tr>`
        }
        table.innerHTML = content;
    }

    this.multiplication = function (start, end) {
        let res = [];
        for (let i = start; i <= end; i++) {
            let row = [];
            for (let j = start; j <= end; j++) {
                row.push(i * j);
            }
            res.push(row);
        }
        return res;
    }
}

function init(){
    const table = new PythagorasTable();
    let start = table.inputStart();
    let end = table.inputEnd();
    let matrix = table.multiplication(start, end);
    console.dir(matrix);
    
    table.createTable(matrix);
}

init();