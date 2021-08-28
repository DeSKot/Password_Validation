<?php

namespace App\Http\Controllers;

use App\Services\Base\Password;
use Illuminate\Http\Request;
use App\Exceptions\NotEnoughCharactersExeception;
use App\Exceptions\NotEnoughBigLettersException;
use App\Exceptions\NotEnoughSmallLettersException;
use App\Exceptions\NotEnoughLatinLettersException;
use App\Exceptions\NotEnoughCyrillicLettersException;
use App\Exceptions\NotEnoughNonAlphabeticCharactersLettersException;
use App\Exceptions\NotEnoughNumbersException;

class CheckPasswordController extends Controller
{
  public function check(Request $request)
  {

    try {
      app(Password::class)->check($request);
    } catch (NotEnoughCharactersExeception $th) {
      print('Не достаточно символов, нужно минимум 8');
    } catch (NotEnoughBigLettersException $th) {
      print('Не достаточно больших букв, нужно минимум 1');
    } catch (NotEnoughSmallLettersException $th) {
      print('Не достаточно маленьких букв, нужно минимум 1');
    } catch (NotEnoughLatinLettersException $th) {
      print('Не достаточно  букв на Латинице, нужно минимум 1');
    } catch (NotEnoughCyrillicLettersException $th) {
      print('Не достаточно  букв на Кирилице, нужно минимум 1');
    } catch (NotEnoughNonAlphabeticCharactersLettersException $th) {
      print('Не достаточно не буквеных символов, нужно минимум 3 с этого списка !"№;%:?*()_+~:\'');
    } catch (NotEnoughNumbersException $th) {
      print('Не достаточно чисел, нужно минимум 1');
    }


    //Zzы!"№;555
    return view('check_password');
  }
}
