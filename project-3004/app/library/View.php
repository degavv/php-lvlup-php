<?php
/**
 * Responsible for connecting a specific template and displaying a page.
 */
class View
{
    /**
     * Include the html page
     * @param string $page
     * @param array $params accepts keys: 'notes' => array, 'edit_id' => int, 'valid_errors' => list, 'unvalid_note' => str,
     * @param string $template
     * @return void
     */
    public function render(string $page, array $params = [], string $template = 'default'): void
    {
        extract($params);
        $title = $this->getTitle($page);
        // var_dump($params);
        include_once 'app/views/templates/' . $template . ".php";
    }

    /**
     * returns the title based on the page
     * @param string $page
     * @return string
     */
    private function getTitle(string $page):string
    {
        $title = TITLE[$page];
        if($title){
            $title .= ' | ' . SITE_NAME;
        } else{
            $title = SITE_NAME;
        }
        return $title;
    }
}