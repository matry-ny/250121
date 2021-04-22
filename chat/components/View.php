<?php

namespace components;

use RuntimeException;

class View
{
    private string $dir;
    private string $ext;
    private string $layoutsDir;
    private string $defaultLayout;

    private string $content = '';

    public function __construct(
        string $dir,
        string $ext,
        string $layoutsDir,
        string $defaultLayout
    ) {
        $this->dir = rtrim($dir, '/\\');
        $this->ext = $ext;
        $this->layoutsDir = $layoutsDir;
        $this->defaultLayout = $defaultLayout;
    }

    public function render(string $template, array $variables = [], ?string $layoutTemplate = null): string
    {
        $template = "{$this->dir}/{$template}{$this->ext}";
        $this->content = $this->renderFile($template, $variables);

        $layoutTemplate = $layoutTemplate ?: $this->defaultLayout;
        $layout = "{$this->layoutsDir}/{$layoutTemplate}{$this->ext}";
        return $this->renderFile($layout, $variables);
    }

    public function getContent(): string
    {
        return $this->content;
    }

    private function renderFile(string $file, array $variables): string
    {
        $var = $this->getUniqueVariable($variables);
        ${$var} = $file;

        if (!file_exists(${$var})) {
            throw new RuntimeException("View {${$var}} can not be found");
        }

        extract($variables, EXTR_OVERWRITE);

        ob_start();
        require ${$var};
        return ob_get_clean();
    }

    private function getUniqueVariable(array $variables): string
    {
        do {
            $variable = 'var_' . mt_rand();
        } while (array_key_exists($variable, $variables));

        return $variable;
    }
}
