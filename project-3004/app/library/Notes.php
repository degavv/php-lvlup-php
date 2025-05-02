<?php
/**
 * Responsible for writing and reading notes from the file
 */
class Notes
{   
    /**
     * Reads the note value from a POST array and return it
     * @return string
     */
    public function getNoteFromPost(): string
    {
        $note = filter_input(INPUT_POST, 'note');
        return $note;
    }
    /**
     * Reads notes from a file and returns them as a list
     * @return array
     */
    public function getNotesFromFile(): array
    {
        $notes = [];
        if(file_exists(NOTES_FILE)){
            $jsonNotes = file_get_contents(NOTES_FILE);
            $notesDecoded = json_decode($jsonNotes, true);
            if ($notesDecoded !== null){
                $notes = $notesDecoded;
            }
        }
        return $notes;
    }
    /**
     * Add new note to file
     * @param string $note
     * @return bool
     */
    public function addNoteToFile(string $note):bool
    {
        $notes = $this->getNotesFromFile();
        $notes[] = $note;
        $isSaved = file_put_contents(NOTES_FILE, json_encode($notes));
        if($isSaved){
            return true;
        }
        return false;
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