<?php

namespace App\Services;

use Exeception;
use App\Exceptions\NotEnoughCharactersExeception;
use App\Exceptions\NotEnoughBigLettersException;
use App\Exceptions\NotEnoughSmallLettersException;
use App\Exceptions\NotEnoughLatinLettersException;
use App\Exceptions\NotEnoughCyrillicLettersException;
use App\Exceptions\NotEnoughNonAlphabeticCharactersLettersException;
use App\Exceptions\NotEnoughNumbersException;
use Illuminate\Http\Request;

class PasswordValidation {

  public function check(Request $request){

    $password = $request->password;
    $countOfCharacters = '/.{8,}/';
    $bigLetter = '/[А-ЯЁA-Z]/u';
    $smallLetter = '/[а-яёa-z]/u';
    $latinLetter = '/[A-Z]/i';
    $сyrillicLetter = '/[А-ЯЁ]/ui';
    $nonAlphabeticCharacters = '/([!|"|№|;|%|:|?|*|(|)|_|+|~|\']){3,}/u';
    $numbers = '/\\d/u';

    throw_unless(preg_match($countOfCharacters, $password), new NotEnoughCharactersExeception);
    throw_unless(preg_match($bigLetter, $password), new NotEnoughBigLettersException);
    throw_unless(preg_match($smallLetter, $password), new NotEnoughSmallLettersException);
    throw_unless(preg_match($latinLetter, $password), new NotEnoughLatinLettersException);
    throw_unless(preg_match($сyrillicLetter, $password), new NotEnoughCyrillicLettersException);
    throw_unless(preg_match($nonAlphabeticCharacters, $password), new NotEnoughNonAlphabeticCharactersLettersException);
    throw_unless(preg_match($numbers, $password), new NotEnoughNumbersException);
  }
}