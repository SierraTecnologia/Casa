<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace Casa\Logic\Events;

use Casa\Models\Entytys\Digital\Code\Commit;
use Casa\Models\Entytys\Digital\Infra\Pipeline;

class NewCommit
{
    public function __construct(Commit $commit)
    {

        // $pipeline = Pipeline::create([

        // ]);

        // Analisa o Commit

        $analyser = $commit;
    }
}
