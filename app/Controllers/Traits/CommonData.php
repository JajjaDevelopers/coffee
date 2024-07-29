<?php
namespace App\Controllers\Traits;

Trait CommonData
{
  protected function commonData()
  {
    $data['user']=session()->get("loggedUser");
    return $data;
  }
}