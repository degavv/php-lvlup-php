<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note list</title>
    <link rel="stylesheet" href="/css/notelist.css" />
</head>

<body>
    <div id="modal" class="hide">
        <form id="note">
            <label for="input-note">Note:</label>
            <input type="text" name="note" id="input-note" autofocus/>
            <input type="submit" value="Add">
        </form>
    </div>
    <div id="modal-edit" class="hide">
        <form id="edit-form">
            <label for="edit-input">Note:</label>
            <input type="text" name="note" id="edit-input" autofocus/>
            <input type="submit" value="Edit">
        </form>
    </div>
    <div id="page">
        <button type="button" id="create">New Note</button>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Note</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <script src="/js/notelist.js"></script>
</body>

</html>