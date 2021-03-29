<?php


namespace App\Resources;


class TemplateEngine
{
    private string $templatesPath = "src/Templates";
    private string $cachePath = "src/Resources/cache";

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader($this->templatesPath);
        return  new \Twig\Environment($loader, [
            'cache' => $this->cachePath,
            'debug' => true
        ]);
    }

}