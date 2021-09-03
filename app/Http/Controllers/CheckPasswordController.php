<?php

namespace App\Http\Controllers;


use App\Interfaces\PasswordValidationInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckPasswordController extends Controller
{

  private PasswordValidationInterface $password;


  public function __construct(PasswordValidationInterface $passwordInterface)
  {
    $this->password = $passwordInterface;
  }

  public function check(Request $request): RedirectResponse
  {
    try {
      $this->password->check($request->input('password', ''));
    } catch (\Throwable $th) {
      return redirect()->back()->with('error', $th->getMessage());
    }
    return redirect()->back()->withSuccess('Пароль подходит!)');
  }
}
