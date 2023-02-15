<?php
namespace Classes\Trait;

trait Debug
{
    public function dump(...$values)
    {
        // TODO: Trouver un bon thème de couleur;
        ini_set("highlight.comment", "#008000");
        ini_set("highlight.default", "#000000");
        ini_set("highlight.html", "#808080");
        ini_set("highlight.keyword", "#0000BB; font-weight: bold");
        ini_set("highlight.string", "#FFFFFF");
        
        $style = /* CSS */
        "background-color: black;
        color: #7FFF00;
        width: fit-content;
        padding: 1rem;
        border: 2px solid green;
        margin: 1rem auto;";
        foreach($values as $v)
        {
            echo    "<pre style='$style'>". 
                    highlight_string(
                        "<?php \n". var_export($v, 1)."\n?>",1
                    )
                    ."</pre>";
        }
    }
    public function dd(...$values)
    {
        $this->dump(...$values);
        die;
    }
}
?>