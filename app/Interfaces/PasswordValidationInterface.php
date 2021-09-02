<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PasswordValidationInterface
{

  public const countOfCharacters = '/.{8,}/';
  public const bigLetter = '/[А-ЯЁA-Z]/u';
  public const smallLetter = '/[а-яёa-z]/u';
  public const latinLetter = '/[A-Z]/i';
  public const cyrillicLetter = '/[А-ЯЁ]/ui';
  public const nonAlphabeticCharacters = '/([!|"|№|;|%|:|?|*|(|)|_|+|~|\']){3,}/u';
  public const numbers = '/\\d/u';

  public function check();
}
