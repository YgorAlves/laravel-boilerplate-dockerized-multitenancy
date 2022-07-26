<?php

namespace App\Providers;

use App\Models\Tenant;
use Illuminate\Support\ServiceProvider;

class TenancyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->configureRequests()) {
            $this->configureQueue();
        }
    }

    /**
     *
     */
    public function configureRequests()
    {
        if (!$this->app->runningInConsole()) {
            $host = $this->app['request']->getHost();
            try {
                Tenant::whereDomain($host)->firstOrFail()->configure()->use();
                return true;
            } catch (\Exception $error) {

                // TO-DO -> redirect to a "client not found" page
                var_dump('Cliente atual não existente.');
                Tenant::whereDomain($host)->firstOrFail()->configure()->use(); // Rodando novamente para cair na pagina de 404 not found
            }
        }
    }

    /**
     *
     */
    public function configureQueue()
    {
        $this->app['queue']->createPayloadUsing(function () {
            return $this->app['tenant'] ? ['tenant_id' => $this->app['tenant']->id] : [];
        });

        $this->app['events']->listen(JobProcessing::class, function ($event) {
            if (isset($event->job->payload()['tenant_id'])) {
                Tenant::find($event->job->payload()['tenant_id'])->configure()->use();
            }
        });
    }
}
