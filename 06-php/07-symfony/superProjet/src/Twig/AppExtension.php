<?php 
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
     // Cette fonction va retourner les filtres nouvellement créé.
    public function getFilters()
    {
        return [
            /* 
                new TwigFilter prend en premier paramètre le nom du filtre
                en second un tableau contenant la classe où trouver le filtre, et
                le nom de la fonction contenant le filtre. 
                En troisième un tableau d'option.
            */
            new TwigFilter('price', [$this, 'formatPrice'], [
                'is_safe' => [
                    'html'
                ]
            ]),
        ];
    }
    /* 
        le premier paramètre de la fonction est celui qui se trouvera avant
        | et les suivants seront optionnels et se trouveront entre parenthèse.
    */
    public function formatPrice(
        float $number,  
        string $sign = "€", 
        bool $before = true, 
        string $decPoint = ',', 
        string $thousandsSep = ' ',
        int $decimals = 0,
        ): string
    {
        // Formate un nombre.
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);

        if($before) $price = "<sup>$sign</sup>".$price;
        else $price .= "<sup>$sign</sup>";

        return $price;
    }
    public function getFunctions()
    {
        return [
            // fonctionne de même que pour les filtres.
            new TwigFunction('area', [$this, 'calculateArea']),
        ];
    }

    public function calculateArea(int $width, int $length): int
    {
        return $width * $length;
    }
}