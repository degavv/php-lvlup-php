<?php

namespace app\core;
/**
 * Responsible for connecting a specific template and displaying a page.
 */
class View
{   
    /**
     * default template 
     * @var string
     */
    protected $template = 'default';

    public function __construct(?string $template = null)
    {
        if(!is_null($template)){
            $this->template = $template;
        }
    }
    /**
     * Include the html page
     * @param string $viewName
     * @param array $params title => string, tasks => array, id => int, task => string,
     * @return void
     */
    public function render(string $viewName, array $params = []) : void
    {
        $viewPath = $this->getViewPath($viewName);
        extract($params);
        include_once $this->getTemplatePath();
    }
    /**
     * returns the path to the views directory
     * @return string
     */
    protected function getViewsDir() : string
    {
        return 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
    }
    /**
     * returns the path to the templates directory
     * @return string
     */
    protected function getTemplatePath() : string
    {
        return $this->getViewsDir() . 'templates' . DIRECTORY_SEPARATOR . $this->template . '.php';
    }
    /**
     * returns the path to the view files
     * @param string $view
     * @return string
     */
    protected function getViewPath(string $view) : string
    {
        return $this->getViewsDir() . 'pages' . DIRECTORY_SEPARATOR . $view . '_view.php';
    }
}