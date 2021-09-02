<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PasswordValidationInterface{

  public function check(Request $request);

}