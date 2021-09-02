<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Interfaces\PasswordValidationInterface;

class CheckPasswordController extends Controller
{

  public function __construct(PasswordValidationInterface $passwordInterface)
  {
    $this->password = $passwordInterface;
  }

  public function check(Request $request)
  {
    try {
      $this->password->check($request);
    } catch (\Throwable $th) {
      return redirect()->back()->with('error', $th->getMessage());
    }
    return redirect()->back()->withSuccess('Пароль подходит!)');
  }
}
