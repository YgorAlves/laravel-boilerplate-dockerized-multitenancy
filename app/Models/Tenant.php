<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Tenant extends Model
{
    use HasFactory;

    protected $connection = 'landlord';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'domain',
        'database'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'auth_key',
        'access_token',
    ];

    /**
     *
     */
    public function configure()
    {
        config([
            'database.connections.tenant.database' => $this->database,
        ]);

        DB::purge('tenant');

        DB::reconnect('tenant');

        Schema::connection('tenant')->getConnection()->reconnect();

        return $this;
    }

    /**
     *
     */
    public function use()
    {
        app()->forgetInstance('tenant');

        app()->instance('tenant', $this);

        return $this;
    }
}
