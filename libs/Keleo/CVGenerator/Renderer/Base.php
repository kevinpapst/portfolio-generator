<?php

namespace Keleo\CVGenerator\Renderer;

use Keleo\CVGenerator\BaseVcObject;
use Keleo\CVGenerator\CurriculumVitae;
use Keleo\CVGenerator\Translation;

abstract class Base extends BaseVcObject
{

    /**
     * @var Translation
     */
    protected $translation = null;
    /**
     * @var string
     */
    protected $assets = null;
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
     * Additional options to pass to template.
     * @var array
     */
    protected $options = array();

    public abstract function render(CurriculumVitae $cv);

    public function copyFiles($source, $destination)
    {
        if (!is_dir($source)) {
            return;
        }

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

    public function setLanguage($language)
    {
        $this->translation = new Translation($language);
    }
}