<?php

namespace Keleo\CVGenerator\Renderer;

class TBSHttp extends TBS
{

    protected function saveTemplate(\clsTinyButStrong $tbs)
    {
        $tbs->Show(OPENTBS_DOWNLOAD, basename($this->output));
    }

}