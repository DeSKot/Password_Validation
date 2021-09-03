<?php

namespace App\Services;

use App\Exceptions\PasswordValidation\NotEnoughCharactersExeception;
use App\Exceptions\PasswordValidation\NotEnoughBigLettersException;
use App\Exceptions\PasswordValidation\NotEnoughSmallLettersException;
use App\Exceptions\PasswordValidation\NotEnoughLatinLettersException;
use App\Exceptions\PasswordValidation\NotEnoughCyrillicLettersException;
use App\Exceptions\PasswordValidation\NotEnoughNonAlphabeticCharactersLettersException;
use App\Exceptions\PasswordValidation\NotEnoughNumbersException;
use App\Interfaces\PasswordValidationInterface;


class PasswordValidator implements PasswordValidationInterface
{
  public function check(string $password): void
  {
    throw_unless(preg_match(self::COUNT_OF_CHARACTERS, $password), NotEnoughCharactersExeception::class, 'Не достаточно символов, нужно минимум 8');
    throw_unless(preg_match(self::BIG_LETTER, $password), NotEnoughBigLettersException::class, 'Не достаточно больших букв, нужно минимум 1');
    throw_unless(preg_match(self::SMALL_LETTER, $password), NotEnoughSmallLettersException::class, 'Не достаточно маленьких букв, нужно минимум 1');
    throw_unless(preg_match(self::LATIN_LETTER, $password), NotEnoughLatinLettersException::class, 'Не достаточно  букв на Латинице, нужно минимум 1');
    throw_unless(preg_match(self::CYRILLIC_LETTER, $password), NotEnoughCyrillicLettersException::class, 'Не достаточно  букв на Кирилице, нужно минимум 1');
    throw_unless(preg_match(self::NON_ALPHABETIC_CHARACTERS, $password), NotEnoughNonAlphabeticCharactersLettersException::class, 'Не достаточно не буквеных символов, нужно минимум 3 с этого списка !"№;%:?*()_+~:\'');
    throw_unless(preg_match(self::NUMBERS, $password), NotEnoughNumbersException::class, 'Не достаточно чисел, нужно минимум 1');
  }
}
