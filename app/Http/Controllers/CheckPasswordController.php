<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Interfaces\PasswordValidationInterface;

class CheckPasswordController extends Controller
{

  private PasswordValidationInterface $password;


  public function __construct(PasswordValidationInterface $passwordInterface)
  {
    $this->password = $passwordInterface;
  }

  public function check(): mixed
  {
    try {
      $this->password->check();
    } catch (\Throwable $th) {
      return redirect()->back()->with('error', $th->getMessage());
    }
    return redirect()->back()->withSuccess('Пароль подходит!)');
  }
}
