<?php
namespace repositories;
 
interface RepositoryInterface {
	
	public function selectAll();
	
	public function find($id);
	
}