<?php

namespace Core;

abstract class Controller
{
    protected $routeParameters = [];

    public function __construct($routeParameters)
    {
        $this->routeParameters = $routeParameters;
    }

    public function __call($name, $arguments)
    {
        $methodName = preg_replace('/@Action/', '', $name);

        if (\method_exists($this, $methodName)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $methodName], $arguments);
                $this->after();
            }
        } else {
            echo 'There`s no such method ' . $methodName . ' in controller ' . get_class($this);
        }
    }

    protected function before()
    {

    }

    protected function after()
    {

    }
}