<?php

namespace App\Library;

class View
{
    /**
     * @var string
     */
    protected $viewFile;

    /**
     * @var array
     */
    protected $viewData;

    /**
     * View constructor.
     * @param string $viewFile
     * @param array $viewData
     */
    public function __construct(string $viewFile, array $viewData)
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