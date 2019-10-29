<?php 

  namespace BrianAlzateDeveloper\ApiSmsRest;

  use Illuminate\Support\ServiceProvider;

  class ApiSmsRestProvider extends ServiceProvider
  {
  	 /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
  	protected $defer = false;

 	 /**
     * Register the service provider.
     *
     * @return void
     */
  	public function register()
    {
        $this->app->bind(
            'BrianAlzateDeveloper\ApiSmsRest\ApiSmsRest',
            'BrianAlzateDeveloper\ApiSmsRest\Services\ApiSmsRestServices'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        
    }

  }



?>