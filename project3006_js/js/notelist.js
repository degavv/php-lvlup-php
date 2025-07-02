const modalCreate = document.getElementById('modal');
const createForm = document.querySelector('#modal form');
const modalEdit = document.getElementById('modal-edit');
const editForm = document.querySelector('#modal-edit form');

function saveNotes(notes) {
    let jsonStr = JSON.stringify(notes);
    localStorage.setItem('notes', jsonStr);
}

function getNotes() {
    let jsonStr = localStorage.getItem('notes');
    if (jsonStr) {
        return JSON.parse(jsonStr);
    }
    return [];
}

function addNote(note, id = null) {
    let notesList = getNotes();
    if(id === null){
        notesList.push(note);
    } else{
        id = parseInt(id);
        notesList[id] = note;
    }
    saveNotes(notesList);
}

function getClickedNote (tableRow){
    let id = tableRow.firstElementChild.innerText;
    let content = tableRow.cells[1].innerText;

    return [content, id];
}

function showModalEdit(content) {
    let input = document.getElementById('edit-input');
    input.value = content;
    modalEdit.classList.remove('hide');
    input.focus();
}

function deleteNote(id) {
    let notesList = getNotes();
    notesList.splice(id, 1);
    saveNotes(notesList);
}

function fillTable() {
    let notes = getNotes();
    let tbody = document.querySelector('#page table tbody');
    tbody.innerHTML = '';
    for (let [i, note] of notes.entries()) {
        tbody.innerHTML += `<tr>
        <td>${i}</td>
        <td>${note}</td>
        <td class="edit-button">edit</td>
        <td class="delete-button">del</td>
    </tr>`;
    }
}

function init() {
    let editedTableRow;

    document.getElementById('create').addEventListener('click', function () {
        modalCreate.classList.remove('hide');
    });
    modalCreate.addEventListener('click', function (e) {
        if (e.target == this) {
            modalCreate.classList.add('hide');
        }
    });
    //Add note submit
    createForm.addEventListener('submit', function (e) {
        addNote(this.elements.note.value);
        this.reset();
        modalCreate.classList.add('hide');
        fillTable();
        e.preventDefault();
    });
    //Edit note submit
    editForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let [, id] = getClickedNote(editedTableRow);
        addNote(this.elements.note.value, id);
        modalEdit.classList.add('hide');
        fillTable();
    });
    fillTable();
    //Delete button
    document.querySelector('tbody').addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-button')) {
            let row = e.target.closest('tr');
            let id = row.firstElementChild.innerText;
            deleteNote(id);
            fillTable();
        }
    });
    //Edit button
    document.querySelector('tbody').addEventListener('click', function (e) {
        if (e.target.classList.contains('edit-button')) {
            editedTableRow = e.target.closest('tr');
            let [content] = getClickedNote(editedTableRow);
            showModalEdit(content);
        }
    });

}
init();