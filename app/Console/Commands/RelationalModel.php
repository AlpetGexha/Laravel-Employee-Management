<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RelationalModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rmodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $tables = DB::select('SHOW TABLES');
        $databaseName = config('database.connections.mysql.database');
        $tableKey = 'Tables_in_' . $databaseName;

        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
            echo $tableName . '(' . implode(', ', $columns) . ')' . PHP_EOL;
        }
    }
}
