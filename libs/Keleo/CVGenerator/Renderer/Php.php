<?php

namespace Keleo\CVGenerator\Renderer;

use Keleo\CVGenerator\CurriculumVitae;

class Php extends Base
{

    public function render(CurriculumVitae $cv)
    {
        // make sure the output directory exists
        $this->createOutputDirectory($this->output);

        // copy the template files over there
        $this->copyFiles($this->source, $this->output);

        // check if the portfolio has assets to copy
        if ($this->assets !== null && !empty($this->assets)) {
            $this->copyFiles($this->assets, $this->output);
        }

        foreach(glob($this->source . "*.{html,php}", GLOB_BRACE) as $filename)
        {
            $filename = basename($filename);
            $target   = $this->output . DIRECTORY_SEPARATOR . $filename;

            ob_start();

            // "vita" will be available in the template
            $vita = $cv;

            // "translation" will be available in the template
            $translation = ($this->translation === null) ? new \Keleo\CVGenerator\Translation() : $this->translation;

            // load (and render) template, which will them be avilable in the output buffer
            include $this->source . DIRECTORY_SEPARATOR . $filename;

            $content = ob_get_contents();
            ob_end_clean();

            // save the generated cv
            file_put_contents($target, $content);
        }
    }

}