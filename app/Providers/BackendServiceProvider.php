<?php
namespace repositories;
 
use IlluminateSupportServiceProvider;
 
class BackendServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$this->app->bind('repositoriesRepositoryInterface', 'repositoriesDbRepository');
	}
}