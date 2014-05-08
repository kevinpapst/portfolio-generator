<?php

namespace Keleo\CVGenerator;

use Keleo\CVGenerator\Renderer\Php;
use Keleo\CVGenerator\Renderer\TBS;
use Keleo\CVGenerator\Renderer\TBSHttp;

class Renderer extends BaseVcObject
{
    const PHP = 'php';
    const HTML = 'html';
    const PDF = 'pdf';
    const WORD = 'word';
    const ODT = 'odt';
    const ODT_HTTP = 'odt-http';

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
     * Additional options to pass to template.
     * @var array
     */
    protected $options = array();

    public function render(CurriculumVitae $cv)
    {
        if ($this->translation === null) {
            $this->setLanguage(Translation::ENGLISH);
        }

        $options = array(
            'language'  => $this->translation->getLanguage(),
            'source'    => $this->source,
            'output'    => $this->output,
            'assets'    => $this->assets,
            'options'   => $this->options
        );

        $renderer = null;
        switch ($this->type) {
            case self::PHP:
                $renderer = new Php($options);
                break;
            case self::ODT:
                $renderer = new TBS($options);
                break;
            case self::ODT_HTTP:
                $renderer = new TBSHttp($options);
                break;
            case self::HTML:
            case self::PDF:
            case self::WORD:
            default:
                throw new \Exception('Renderer "' . $this->type . '" is not supported yet');
                break;
        }

        $renderer->render($cv);
    }

    public function setLanguage($language)
    {
        $this->translation = new Translation($language);
    }
}