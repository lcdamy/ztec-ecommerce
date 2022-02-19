<?php 
namespace App\Transformers;

use App\Helpers\StatusCodes;

class ResponseBuilder
{
  use StatusCodes; // pull in the status codes

  private $errors = [];
  private $data = [];
  private $transformer_used = false;
  private $meta = [];
  private $response_status = "success"; // it can also be "failure";
  private $response_status_code = "success";
 
  function __construct( 
      $input_status = "success", 
      $input_status_code = "success", 
      $input_data = [],
      $input_transformer = false,
      $input_errors = [],
      $input_meta = []
      ) 
  {
    $this->data = $input_data;
    $this->transformer_used = $input_transformer;
    $this->meta = $input_meta;
    $this->errors = $input_errors;
    $this->response_status = $input_status;
    $this->response_status_code = $input_status_code;
  }

  private function generate_response()
  {
     $data = [];
     if ($this->transformer_used && array_key_exists('data', $this->data)) {
        $data = $this->data['data'];
     } else {
         $data = $this->data;
     }
     $response = [
        'status'=>  $this->response_status,
        'status_code_identifier' => $this->response_status_code,
        'status_code' => $this->get_status_code(),
        'data' => $data,
        'errors'=>  $this->errors,
        'meta'  =>  $this->meta
     ];

     return $response;
  }


  private function get_status_code()
  {
      return $this->{$this->response_status_code};
  }

  public function to_json() {
      return response()->json($this->generate_response(), $this->get_status_code());
  }

}