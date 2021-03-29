<?php


namespace App\Resources;


class TemplateEngine
{
    private string $templatesPath = "src/Templates";
    private string $cachePath = "src/Resources/cache";
    public $twig;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader($this->templatesPath);
        $this->twig =  new \Twig\Environment($loader, [
            'cache' => $this->cachePath,
            'debug' => true
        ]);
    }

}