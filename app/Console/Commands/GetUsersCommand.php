<?php

namespace App\Console\Commands;

use App\Contracts\ExternalApiInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GetUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload Users From External Api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private ExternalApiInterface $externalApi)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->externalApi->getDataByEndPoint();
            Log::error('Customers Uploaded Successfully');
            $this->info('Customers Uploaded Successfully');
            return Command::SUCCESS;
        } catch (\Exception $exception) {
            Log::error('Customers Upload Error', [$exception->getMessage()]);
            $this->error($exception->getMessage());
            return Command::FAILURE;
        }

    }
}
