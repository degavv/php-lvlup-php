<?php
/**
 * Responsible for writing and reading notes from the file
 */
class Notes
{
    /**
     * List of notes
     * @var array
     */
    private array $notes = [];
    private bool $isChanged = false;
    public string $absoluteStoragePath;
    public string $absoluteNotesPath;

    public function __construct()
    {
        $this->absoluteStoragePath = getcwd() . DIRECTORY_SEPARATOR . DATA_DIR;
        $this->absoluteNotesPath = $this->absoluteStoragePath . DIRECTORY_SEPARATOR . NOTES_FILE;
        $this->checkDir($this->absoluteStoragePath);
        if (file_exists($this->absoluteNotesPath)) {
            $this->notes = $this->getNotesFromFile();
        }
    }

    public function __destruct()
    {
        if ($this->isChanged) {
            $notesDecoded = json_encode($this->notes);
            file_put_contents($this->absoluteNotesPath, $notesDecoded);
        }
    }

    public function getNotes(): array
    {
        return $this->notes;
    }

    /**
     * Reads notes from a file and returns them as a list
     * @return array
     */
    private function getNotesFromFile(): array
    {
        $notes = [];
        if (file_exists($this->absoluteNotesPath)) {
            $jsonNotes = file_get_contents($this->absoluteNotesPath);
            $notesDecoded = json_decode($jsonNotes, true);
            if ($notesDecoded !== null) {
                $notes = $notesDecoded;
            }
        }
        return $notes;
    }

    public function addNote(string $note): void
    {
        $this->notes[] = $note;
        $this->isChanged = true;
    }

    public function deleteNote(int $id):void
    {
        array_splice($this->notes, $id,1);
        $this->isChanged = true;
    }

    public function editNote(int $id, string $note): void
    {
        if ($this->notes[$id] !== $note){
            $this->notes[$id] = $note;
            $this->isChanged = true;
        }
    }
    /**
     * check and create dir
     * @param string $dir
     * @return void
     */
    private function checkDir(string $dir): void
    {
        if (!file_exists($dir)) {
            mkdir($dir);
        }
    }
}