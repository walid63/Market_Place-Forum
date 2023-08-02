<?php


class View
{
    private $data = [];

    public function assign($key, $value)
    {
        // variable a transmettre a la vue
        $this->data[$key] = $value;
    }

    public function loadIncludes($filename)
    {
        if (file_exists("./src/Views/includes/" . $filename . ".php")) {

            ob_start();
            extract($this->data);
            include("./src/Views/includes/" . $filename . ".php");
            
            $contents = ob_get_contents();

            return $contents;
            
        }else {
            
        }

    }

    public function render($dir, $view)
    {
        if (file_exists("./src/Views/" . $dir . "/" . $view . ".php")) {

            ob_start();
            extract($this->data);
            include("./src/Views/" . $dir . "/" . $view . ".php");
            
            $contents = ob_get_contents();

            return $contents;
            
        }
    }
}
