<?php
/**
 *
 * PHP version >= 7.0
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

namespace App\Console\Commands;



use App\Services\CustomerService;
use Exception;
use Illuminate\Console\Command;



/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class ImportCustomersCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "import:customers";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Import customers";


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $service = app(CustomerService::class);

        try {
            $result = $service->import();

            echo 'Created: ' . $result['created'] . ' Updated: ' . $result['updated'];
        } catch (\Exception $e) {
            echo 'Service is unavailable ' . $e->getMessage();
        }
    }
}
