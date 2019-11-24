<?php

namespace Casa\Console\Routine\Social;

use Illuminate\Console\Command;
use Casa\Models\MediaSend;
use Casa\Models\MediaEmail;
use Casa\Models\MediaPush;
use Casa\Models\Company;
use App\Models\User;
use SendGrid;
use Casa\Http\Controllers\Api\Controller;

class RoutineImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routine:importAll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar a porra toda !';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // (new \Casa\Routines\Globals\BackupAll)->run();
        (new \Casa\Routines\Globals\ImportTokens)->run();
    }
}
