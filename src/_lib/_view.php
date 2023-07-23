<?php


class View
{
    private $data = [];

    public function assign($key, $value)
    {
        // Permet d'ajouter une variable à transmettre à la vue
        $this->data[$key] = $value;
    }

    public function render($dir, $view)
    {
        if (file_exists("./src/Views/" . $dir . "/" . $view . ".php")) {
            ob_start();
            extract($this->data);
            include("./src/Views/" . $dir . "/" . $view . ".php");
            $contents = ob_get_contents();
           // echo($contents);
           return $contents;
            //ob_end_clean();
        }
    }
}
