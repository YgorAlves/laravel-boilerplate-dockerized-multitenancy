<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TenantsMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {tenantId?} {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to migrate specific Tenant by providing tenantId or all of them, if Tenant does not exist yet, creates the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->argument('tenantId')) {
            $tenant = Tenant::find($this->argument('tenantId'));
            if (!$tenant) {
                $this->line("Tenant #{$this->argument('tenantId')} not found in database");
                return;
            }
            $this->migrate($tenant);
        } else {
            Tenant::all()->each(function ($tenant) {
                $this->migrate($tenant);
            });
        }
    }

    /**
     * @param \App\Models\Tenant $tenant
     * @return int
     */
    public function migrate($tenant)
    {
        $charset = config('database.connections.tenant.charset');
        $collation = config('database.connections.tenant.collation');
        $query = "CREATE DATABASE IF NOT EXISTS $tenant->database CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        $tenant->configure()->use();

        $this->line('');
        $this->line("--------------------------------------");
        $this->info("Migrating Tenant #{$tenant->id} ({$tenant->name})");
        $this->line("--------------------------------------");

        $options = ['--force' => true];

        if ($this->option('seed')) {
            $options['--seed'] = true;
        }

        $this->call(
            $this->option('fresh') ? 'migrate:fresh': 'migrate',
            $options
        );
    }
}
