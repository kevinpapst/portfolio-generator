<?php

namespace Keleo\CVGenerator\Renderer;

use Keleo\CVGenerator\CurriculumVitae;

class TBS extends Base
{

    public function render(CurriculumVitae $cv)
    {
        $filename = $this->source;

        require_once CV_BASE . '/libs/tinybutstrong/tbs_class.php';
        require_once CV_BASE . '/libs/tinybutstrong/plugins/tbs_plugin_opentbs.php';

        $tbs = new \clsTinyButStrong;
        $tbs->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
        $tbs->MethodsAllowed = true;

        // "translation" will be available in the template
        $translation = ($this->translation === null) ? new \Keleo\CVGenerator\Translation() : $this->translation;
        $tbs->ObjectRef['translation'] = $translation;

        $values = array(
            'assets'     => $this->assets,   // directory holding assets needs to be accessible
            'photo'      => $this->assets . $cv->getContact()->getPhoto(),
            'emptybreak' => 0
        );
        $tbs->VarRef = $values;

        // all fields in "vita" must be assigned to the template
        $tbs->ObjectRef['vita']         = $cv;
        $tbs->ObjectRef['contact']      = $cv->getContact();

        $tbs->LoadTemplate($filename);

        foreach($this->options as $k => $v) {
            $tbs->SetOption($k, $v);
        }

        $tbs->MergeBlock('educations', $cv->getEducations());
        $tbs->MergeBlock('experiences', $cv->getExperiences());
        $tbs->MergeBlock('knowledges', $cv->getKnowledges());
        $tbs->MergeBlock('projects', $cv->getProjects());
        $tbs->MergeBlock('skills', $cv->getSkills());

   //     $tbs->PlugIn(OPENTBS_DEBUG_XML_CURRENT);

        // save the generated cv
        $this->saveTemplate($tbs);
    }

    protected function saveTemplate(\clsTinyButStrong $tbs)
    {
        $tbs->Show(OPENTBS_FILE, $this->output);
        //$tbs->Show(OPENTBS_DOWNLOAD, $this->output);
    }

}