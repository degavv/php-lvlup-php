<?php
/**
 * Responsible for connecting a specific template and displaying a page.
 */
class View
{
    /**
     * Include the html page
     * @param string $page
     * @param array $params accepts keys: 'notes' => array,
     * @param string $template
     * @return void
     */
    public function includePage(string $page, array $params = [], string $template = 'default'): void
    {
        extract($params);
        $title = $this->getTitle($page);
        include_once 'app/templates/' . $template . ".php";
    }
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