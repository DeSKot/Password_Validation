<?php

namespace App\Services;

use App\Exceptions\NotEnoughCharactersExeception;
use App\Exceptions\NotEnoughBigLettersException;
use App\Exceptions\NotEnoughSmallLettersException;
use App\Exceptions\NotEnoughLatinLettersException;
use App\Exceptions\NotEnoughCyrillicLettersException;
use App\Exceptions\NotEnoughNonAlphabeticCharactersLettersException;
use App\Exceptions\NotEnoughNumbersException;
use Illuminate\Http\Request;
use App\Interfaces\PasswordValidationInterface;

class PasswordValidation implements PasswordValidationInterface
{

  public function check(Request $request)
  {

    $password = $request->password;
    $countOfCharacters = '/.{8,}/';
    $bigLetter = '/[А-ЯЁA-Z]/u';
    $smallLetter = '/[а-яёa-z]/u';
    $latinLetter = '/[A-Z]/i';
    $cyrillicLetter = '/[А-ЯЁ]/ui';
    $nonAlphabeticCharacters = '/([!|"|№|;|%|:|?|*|(|)|_|+|~|\']){3,}/u';
    $numbers = '/\\d/u';

    throw_unless(preg_match($countOfCharacters, $password), NotEnoughCharactersExeception::class, 'Не достаточно символов, нужно минимум 8');
    throw_unless(preg_match($bigLetter, $password), NotEnoughBigLettersException::class, 'Не достаточно больших букв, нужно минимум 1');
    throw_unless(preg_match($smallLetter, $password), NotEnoughSmallLettersException::class, 'Не достаточно маленьких букв, нужно минимум 1');
    throw_unless(preg_match($latinLetter, $password), NotEnoughLatinLettersException::class, 'Не достаточно  букв на Латинице, нужно минимум 1');
    throw_unless(preg_match($cyrillicLetter, $password), NotEnoughCyrillicLettersException::class, 'Не достаточно  букв на Кирилице, нужно минимум 1');
    throw_unless(preg_match($nonAlphabeticCharacters, $password), NotEnoughNonAlphabeticCharactersLettersException::class, 'Не достаточно не буквеных символов, нужно минимум 3 с этого списка !"№;%:?*()_+~:\'');
    throw_unless(preg_match($numbers, $password), NotEnoughNumbersException::class, 'Не достаточно чисел, нужно минимум 1');
  }
}
