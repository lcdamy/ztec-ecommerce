<?php
namespace App\Helpers;

trait StatusCodes
{
    
	public $success              = 200; // Request Received AKA OK

	public $failure              = 400; // BAD REQUEST OR VALIDATION ERROR

	public $saved                = 201; // CREATED SOMETHING

	public $creation_failure     = 405; // CREATION FAILURE

	public $server_error         = 500; // INTERNAL SERVER FAILURE

	public $forbidden            = 401; // CURRENT USER FORBIDDEN

	public $data_deleted         = 410; // DATA ALREADY DELETED

}
