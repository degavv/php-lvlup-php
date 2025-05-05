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

    public function handleRequest()
    {
        if ($this->requestMethod === 'GET') {
            $this->handleGet();
        } elseif ($this->requestMethod === 'POST') {
            $this->handlePost();
        } else {
            $this->view->includePage(page: 'error');
        }
    }

    private function index($params = []): void
    {
        $notes = $this->note->getNotes();
        $params['notes'] = $notes;
        $this->view->render($this->page, $params);
    }

    private function handleGet(): void
    {
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $this->handleAction($_GET['action'], (int) $_GET['id']);
        } else {
            $this->index();
        }
    }

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

    //TODO Додати валідацію або фільтрацію
    private function handlePost(): void
    {
        if (isset($_POST['note'])) {
            $this->processNote('note');
        } elseif (isset($_POST['edit_note']) && isset($_POST['id'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            if ($id) {
                $this->processNote('edit_note', $id);
            }
        } else {
            $this->view->render(page: 'error');
        }
    }

    private function validateNote($note): array
    {
        $errors = [];
        if (mb_strlen($note) < 4) {
            $errors[] = 'Довжина має бути довше 3 символів';
        }
        return $errors;
    }

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
            $this->index(['valid_errors' => $errors, 'unvalid_note' => $noteRaw]);
        }
    }

    private function addNewNote(string $note): never
    {
        $this->note->addNote($note);
        $this->redirect();
    }
    
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