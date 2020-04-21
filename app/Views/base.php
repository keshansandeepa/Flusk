<?php

namespace App\Views;

use Psr\Http\Message\ServerRequestInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class base extends AbstractExtension
{

    /**
     * @var string
     */


    /**
     * @return string
     */
    public function getName()
    {
        return 'assets';
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('assets', [$this,'assets']),
        ];
    }

    public function assets($path)
    {

        $env= getenv('APP_URL');
        $url = $env.'/'.$path;
       return $url;


//        $scheme = $uri->getScheme();
//        $authority = $uri->getAuthority();
//        $basePath = $this->basePath;
//
//        if ($authority !== '' && strpos($basePath, '/') !== 0) {
//            $basePath .= '/' . $basePath;
//        }
//
//        return ($scheme !== '' ? $scheme . ':' : '')
//            . ($authority ? '//' . $authority : '')
//            . rtrim($basePath, '/');


    }
}
