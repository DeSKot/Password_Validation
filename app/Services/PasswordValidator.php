<?php

namespace App\Services;

use App\Exceptions\PasswordValidation\NotEnoughCharactersExeception;
use App\Exceptions\PasswordValidation\NotEnoughBigLettersException;
use App\Exceptions\PasswordValidation\NotEnoughSmallLettersException;
use App\Exceptions\PasswordValidation\NotEnoughLatinLettersException;
use App\Exceptions\PasswordValidation\NotEnoughCyrillicLettersException;
use App\Exceptions\PasswordValidation\NotEnoughNonAlphabeticCharactersLettersException;
use App\Exceptions\PasswordValidation\NotEnoughNumbersException;
use Illuminate\Http\Request;
use App\Interfaces\PasswordValidationInterface;

class PasswordValidator implements PasswordValidationInterface
{



  public function check(): void
  {

    $password = htmlspecialchars($_POST['password']);


    throw_unless(preg_match(self::countOfCharacters, $password), NotEnoughCharactersExeception::class, 'Не достаточно символов, нужно минимум 8');
    throw_unless(preg_match(self::bigLetter, $password), NotEnoughBigLettersException::class, 'Не достаточно больших букв, нужно минимум 1');
    throw_unless(preg_match(self::smallLetter, $password), NotEnoughSmallLettersException::class, 'Не достаточно маленьких букв, нужно минимум 1');
    throw_unless(preg_match(self::latinLetter, $password), NotEnoughLatinLettersException::class, 'Не достаточно  букв на Латинице, нужно минимум 1');
    throw_unless(preg_match(self::cyrillicLetter, $password), NotEnoughCyrillicLettersException::class, 'Не достаточно  букв на Кирилице, нужно минимум 1');
    throw_unless(preg_match(self::nonAlphabeticCharacters, $password), NotEnoughNonAlphabeticCharactersLettersException::class, 'Не достаточно не буквеных символов, нужно минимум 3 с этого списка !"№;%:?*()_+~:\'');
    throw_unless(preg_match(self::numbers, $password), NotEnoughNumbersException::class, 'Не достаточно чисел, нужно минимум 1');
  }
}
