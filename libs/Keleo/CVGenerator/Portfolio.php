<?php

namespace Keleo\CVGenerator;

class Portfolio
{
    /**
     * @var CurriculumVitae
     */
    private $cv = null;
    /**
     * @var array()
     */
    private $renderer = array();

    public function __construct($project)
    {
        if (!isset($project['cv']) || !isset($project['renderer'])) {
            throw new \Exception('Portfolio invalid, missing "cv" or "renderer" key');
        }

        $this->cv = new CurriculumVitae($project['cv']);

        foreach($project['renderer'] as $key => $renderer) {
            $this->renderer[$key] = new Renderer($renderer);
        }
    }

    public function render($key = null)
    {
        if (!isset($this->renderer[$key])) {
            throw new \Exception('Renderer '.$key.' is not existing');
        }

        /* @var Renderer $renderer */
        $renderer = $this->renderer[$key];
        $renderer->render($this->cv);
    }

    public function renderAll()
    {
        foreach(array_keys($this->renderer) as $key) {
            $this->render($key);
        }
    }
}