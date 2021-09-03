<?php

namespace App\Interfaces;
interface PasswordValidationInterface
{

  public const COUNT_OF_CHARACTERS = '/.{8,}/';
  public const BIG_LETTER = '/[А-ЯЁA-Z]/u';
  public const SMALL_LETTER = '/[а-яёa-z]/u';
  public const LATIN_LETTER = '/[A-Z]/i';
  public const CYRILLIC_LETTER = '/[А-ЯЁ]/ui';
  public const NON_ALPHABETIC_CHARACTERS = '/([!|"|№|;|%|:|?|*|(|)|_|+|~|\']){3,}/u';// 
  public const NUMBERS = '/\\d/u';

  public function check(string $password): void;
}
