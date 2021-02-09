<?php

namespace App\Library;

class View
{

    protected $viewFile;
    protected $viewData;

    /**
     * View constructor.
     * @param $viewFile
     * @param $viewData
     */
    public function __construct($viewFile, $viewData)
    {
        $this->viewFile = $viewFile;
        $this->viewData = $viewData;
    }

    public function render()
    {
        if (file_exists(VIEW . $this->viewFile . '.twig')) {
            include VIEW . $this->viewFile . '.twig';
        }
    }

}