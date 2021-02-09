<?php

namespace App\Library;

class Controller
{
    /**
     * @var View
     */
    protected $view;

    /**
     * Use $viewPathComponents as array instead of string to prevent the differences between OS.
     *
     * @param array $viewPathComponents
     * @param array $data
     * @return View
     */
    public function view($viewPathComponents, $data = [])
    {
        $this->view = new View(implode(DIRECTORY_SEPARATOR,$viewPathComponents), $data);
        return $this->view;
    }

}