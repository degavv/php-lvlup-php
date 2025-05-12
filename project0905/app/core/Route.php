<?php

namespace app\core;

/**
 * Responsible for routing incoming requests based on get parameters
 */
class Route
{
    /**
     * default constroller
     * @var string
     */
    public const DEFAULT_CONTROLLER = 'index';
    /**
     * default action
     * @var string
     */
    public const DEFAULT_ACTION = 'index';
    /**
     * method of processing input parameters
     * @return void
     */
    public static function init(): void
    {
        $controllerName = self::DEFAULT_CONTROLLER;
        $actionName = self::DEFAULT_ACTION;
        if (isset($_GET['controller'])) {
            $controllerName = strtolower($_GET['controller']);
        }
        if (isset($_GET['action'])) {
            $actionName = strtolower($_GET['action']);
        }
        $controllerClass = 'app\controllers\\' . ucfirst($controllerName);
        if (!class_exists($controllerClass)) {
            self::notFound();
        }
        $controller = new $controllerClass();
        if (!method_exists($controller, $actionName)) {
            self::notFound();
        }
        $controller->$actionName();
    }
    /**
     * returns url
     * @param string $controller
     * @param string $action
     * @return string
     */
    public static function url(string $controller = self::DEFAULT_CONTROLLER, string $action = self::DEFAULT_ACTION, array $params = []) : string
    {
        $getParams = '';
        foreach ($params as $param => $value){
            $getParams .= $param . '=' . $value . '&';
        }
        return '/?controller=' . strtolower($controller) . '&action=' . strtolower($action) . '&' . $getParams;
    }
    /**
     * returns a 404 page
     * @return never
     */
    public static function notFound(): never
    {
        http_response_code(404);
        exit();
    }
    /**
     * Makes a redirect to the url
     * @param string $url
     * @return never
     */
    public static function redirect(?string $url = null): never
    {
        header('Location: ' . $url ?? '/');
        exit();
    }
}