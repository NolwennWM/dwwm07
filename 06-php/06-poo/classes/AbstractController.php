<?php 
namespace Classes;

abstract class AbstractController
{
    /**
     * Affiche les flash messages
     *
     * @return void
     */
    protected function getFlash(): void
    {
        if(isset($_SESSION["flash"]))
        {
            echo "<div class='flash'>". $_SESSION["flash"] ."</div>";
            unset($_SESSION["flash"]);
        }
    }
    /**
     * Paramètre les flash messages
     *
     * @param string $flash
     * @return void
     */
    protected function setFlash(string $flash): void
    {
        $_SESSION["flash"] = $flash;
    }
    /**
     * Affiche la vue demandée. 
     * 
     * En option le title et le h1 du header peuvent être paramètré. 
     * Ainsi que le transfère de toute donnée à la vue.
     *
     * @param string $view
     * @param array $options
     * @return void
     */
    protected function render(string $view, array $options = []):void
    {
        foreach($options as $op=>$val)
        {
            switch($op)
            {
                case "title":
                    $title = $val;
                    break;
                default:
                    $$op = $val;
            }
        }
        require __DIR__ . "/../../ressources/template/_header.php";
        require __DIR__ . "/../view/".$view;
        require __DIR__ . "/../../ressources/template/_footer.php";
    }
}
?>