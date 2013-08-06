<?php

namespace Keleo\CVGenerator;

class Renderer extends BaseVcObject
{
    const PHP = 'php';
    const HTML = 'html';
    const PDF = 'pdf';
    const WORD = 'word';
    const ODT = 'odt';

    /**
     * @var Translation
     */
    private $translation = null;
    /**
     * @var string
     */
    protected $assets = null;
    /**
     * @var string
     */
    protected $type = null;
    /**
     * The base dir of the renderer.
     * @var string
     */
    protected $source = null;
    /**
     * Output directory.
     * @var string
     */
    protected $output = null;
    /**
     * Alternative filename for generated template.
     * @var string
     */
    protected $save_as = null;

    public function render(CurriculumVitae $cv)
    {
        $tplFile = null;
        switch ($this->type) {
            case self::PHP:
                $tplFile = 'index.php';
                break;
            case self::HTML:
                $tplFile = 'index.html';
                break;
            case self::PDF:
            case self::WORD:
            case self::ODT:
            default:
                throw new \Exception('Renderer "' . $this->type . '" is not supported yet');
                break;
        }

        // make sure the output directory exists
        $this->createOutputDirectory($this->output);
        // copy the template files over there
        $this->copyFiles($this->source, $this->output);
        // check if the portfolio has assets to copy
        if ($this->assets !== null) {
            $this->copyFiles($this->assets, $this->output);
        }
        // render the template and save the output
        $this->saveTemplate($cv, $tplFile, $this->source, $this->output);
        // if user wants a different filename, rename it
        if ($this->save_as !== null) {
            rename($this->output . DIRECTORY_SEPARATOR . $tplFile, $this->output . DIRECTORY_SEPARATOR . $this->save_as);
        }
    }

    protected function createOutputDirectory($dirname)
    {
        if (file_exists($dirname)) {
            if (!is_dir($dirname)) {
                throw new \Exception('File exists but is not a directory: ' . $dirname);
            }
            return;
        }
        if (!@mkdir($dirname, 0777, true)) {
            throw new \Exception('Could not create directory: ' . $dirname);
        }
    }

    protected function saveTemplate(CurriculumVitae $cv, $filename, $source, $destination)
    {
        if (!file_exists($source . DIRECTORY_SEPARATOR . $filename)) {
            throw new \Exception('Render template can not be found: ' . $source . '/' . $filename);
        }

        ob_start();

        // "vita" will be available in the template
        $vita = $cv;
        // "translation" will be available in the template
        $translation = ($this->translation === null) ? new Translation() : $this->translation;

        // load (and render) template, which will them be avilable in the output buffer
        include $source . DIRECTORY_SEPARATOR . $filename;

        $content = ob_get_contents();
        ob_end_clean();
        file_put_contents($destination . DIRECTORY_SEPARATOR . $filename, $content);
    }

    public function copyFiles($source, $destination)
    {
        foreach (
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST) as $item
        ) {
            if ($item->isDir()) {
                $this->createOutputDirectory($destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } else {
                copy($item, $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            }
        }
    }

    public function setLanguage($language)
    {
        $this->translation = new Translation($language);
    }
}