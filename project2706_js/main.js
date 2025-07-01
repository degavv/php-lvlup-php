function PythagorasTable() {
    this.inputStart = function () {
        let start = prompt('Введіть початкове значення таблиці');
        return start;
    }

    this.inputEnd = function () {
        let end = prompt('Введіть кінцеве значення таблиці');
        return end;
    }

    this.createTable = function (start, end) {
        const table = document.querySelector('.pythagoras');

        //Заголовки
        let content = '<tr><th></th>';
        for (let i = start; i <= end; i++) {
            content += `<th>${i}</th>`;
        }
        content += `</tr>`;

        for (let i = start; i <= end; i++) {
            content += `<tr><td>${i}</td>`;
            for (let j = start; j <= end; j++){
                content += `<td>${j * i}</td>`;
            }
            content += `</tr>`;
        }
        table.innerHTML = content;
    }
}

function init() {
    const table = new PythagorasTable();
    let start = table.inputStart();
    let end = table.inputEnd();

    table.createTable(start, end);
}

init();