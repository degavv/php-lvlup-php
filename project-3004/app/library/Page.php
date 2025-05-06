<?php
/**
 * Responsible for reading input data, executing the main logic and displaying the result
 */
class Page
{
    private string $page;
    private string $requestMethod;
    private object $view;
    private object $note;
    public function __construct(string $page)
    {
        $this->page = $page;
        $this->view = new View();
        $this->note = new Notes();
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->handleRequest();
    }

    /**
     * Requests handler
     * @return void
     */
    public function handleRequest(): void
    {
        if ($this->requestMethod === 'GET') {
            $this->handleGet();
        } elseif ($this->requestMethod === 'POST') {
            $this->handlePost();
        } else {
            $this->view->render(page: 'error');
        }
    }

    /**
     * Includes index page
     * @param mixed $params
     * @return void
     */
    private function index($params = []): void
    {
        $notes = $this->note->getNotes();
        $params['notes'] = $notes;
        $this->view->render($this->page, $params);
    }

    /**
     * GET request handler
     * @return void
     */
    private function handleGet(): void
    {
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $this->handleAction($_GET['action'], (int) $_GET['id']);
        } else {
            $this->index();
        }
    }

    /**
     * Delete & Update handler
     * @param string $action
     * @param int $id
     * @return void
     */
    private function handleAction(string $action, int $id): void
    {
        switch ($action) {
            case 'delete':
                $this->note->deleteNote($id);
                $this->redirect();
                break;
            case 'edit':
                $this->index(['edit_id' => $id]);
                break;
            default:
                $this->index();
                break;
        }
    }

    /**
     * POST request handler
     * @return void
     */
    private function handlePost(): void
    {
        if (isset($_POST['note'])) {
            $this->processNote('note');
        } elseif (isset($_POST['edit_note']) && isset($_POST['id'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if (is_int($id)) {
                $this->processNote('edit_note', $id);
            }
        } else {
            $this->view->render(page: 'error');
        }
    }

    /**
     * Handler for working with notes
     * @param string $fieldName
     * @param mixed $id
     * @return void
     */
    private function processNote(string $fieldName, ?int $id = null): void
    {
        $noteRaw = filter_input(INPUT_POST, $fieldName);
        $errors = $this->validateNote($noteRaw);
        if (count($errors) === 0) {
            $note = htmlspecialchars($noteRaw);
            if ($id === null) {
                $this->addNewNote($note);
            } else {
                $this->editNote($id, $note);
            }
        } else {
            //Якщо edit_id = null це форма введення, якщо число - це форма редагування
            $this->index(['valid_errors' => $errors, 'unvalid_note' => $noteRaw, 'edit_id' => $id]);
        }
    }

    /**
     * validation of input values
     * @param mixed $note
     * @return string[]
     */
    private function validateNote($note): array
    {
        $errors = [];
        if (mb_strlen($note) < 6) {
            $errors[] = 'Довжина має бути довше 5 символів';
        }
        return $errors;
    }

    /**
     * Adds a new note
     * @param string $note
     * @return never
     */
    private function addNewNote(string $note): never
    {
        $this->note->addNote($note);
        $this->redirect();
    }
    
    /**
     * edits a note
     * @param int $id
     * @param string $note
     * @return never
     */
    private function editNote(int $id, string $note): never
    {
        $this->note->editNote($id, $note);
        $this->redirect();
    }

    /**
     * Makes a redirect to the url
     * @param string $url
     * @return never
     */
    private function redirect(string $url = '/'): never
    {
        header('Location: ' . $url);
        exit();
    }
}