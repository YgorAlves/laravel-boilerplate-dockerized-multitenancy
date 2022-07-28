<?php

namespace Tests\Unit;

use App\Models\Tenant;
use Tests\TestCase;

class TenantTest extends TestCase
{

    public function test_if_current_database_is_null()
    {
        $currentDb = config('database.connections.tenant.database');
        $this->assertNull($currentDb);
    }

    public function test_if_tenant_changes_database_connection()
    {
        $tenant = new Tenant([
            'database' => 'test'
        ]);

        $tenant->configure();

        $currentDb = config('database.connections.tenant.database');

        $this->assertSame('test', $currentDb);

    }


}

