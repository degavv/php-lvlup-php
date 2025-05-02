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
        $this->processRequest();
    }

    /**
     * When a get request - include html page . When a POST request - processes a form
     * @return void
     */
    private function processRequest(): void
    {
        if ($this->requestMethod === 'GET'){
            $notes = $this->note->getNotesFromFile();
            $this->view->includePage($this->page, ['notes' => $notes,]);
        } else {
            $note = $this->note->getNoteFromPost();
            $this->note->addNoteToFile($note);
            $this->redirect();
        }
    }
    /**
     * Makes a redirect to the url
     * @param string $url
     * @return never
     */
    private function redirect(string $url = '/'):never
    {
        header('Location: ' . $url);
        exit();
    }
}