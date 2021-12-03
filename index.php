<?php 

function taskN($task) {
   echo "<hr/><h3>Задача $task </h3><hr/>";
}

taskN(1);

/* 1. Сделайте функцию, которая возвращает куб числа. Число передается параметром. */

function getCube($num) {
   return $num ** 3;
}

echo getCube(3);

taskN(2);

/* 2. Сделайте функцию, которая возвращает сумму двух чисел. Числа передаются параметрами функции. */

function getSum($a, $b) {
   return $a + $b;
}

echo getSum(4, 8);

taskN(3);

/* 3. Сделайте функцию, которая принимает параметром число от 1 до 7, а возвращает день недели на русском языке. */

function getDay($day) {
   $week = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
   return $week[$day - 1];
}

echo getDay(4);

taskN(4);

/* 4. Сделайте функцию, которая параметром принимает число и проверяет -отрицательное оно или нет. Если отрицательное - пусть функция вернет true, а если нет - false.*/

function checkNeg($num) {
   return ($num < 0) ? true : false;
}

var_dump(checkNeg(45));

taskN(5);

/* 5. Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.*/

function getDigitsSum($num) {
   settype($num, "string");
   $sum = 0;
   for($i = 0; $i < strlen($num); $i++) {
      $sum += $num[$i];
   }
   return $sum;
}

echo getDigitsSum(4556);

taskN(6);

/* 6. Найдите все года от 1 до 2020, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.*/

function getYearsDigits($num) {
   for ($i = 1; $i <= 2020; $i++){
      $arr[] = $i;
   }

   foreach($arr as $y) {
      if(getDigitsSum($y) == $num) {
         $years[] = $y;
      }
   }
   return $years;
}

print_r(getYearsDigits(13));

taskN(7);

/* 7. Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.*/

function isEven($num) {
   return (!($num % 2)) ? true : false;
}

var_dump(isEven(7));

taskN(8);

/* 8. Сделайте функцию, которая принимает строку на русском языке, а возвращает ее транслит.*/

function translit($str) {
   $russian = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];

   $trans = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];

   return str_replace($russian, $trans, $str);
}

echo translit('Я у мамы инженер');

taskN(9);

/* 9. Сделайте функцию, которая возвращает множественное или единственное число существительного. Пример: 1 яблоко, 2 (3, 4) яблока, 5 яблок. Функция первым параметром принимает число, а следующие 3 параметра — форма для единственного числа, для чисел два, три, четыре и для чисел, больших четырех, например, func(3, 'яблоко', 'яблока', 'яблок').*/

function getCount($amount, $singular, $plural234, $otherPlural) {
   $amount = $amount . '';
   $lastTwo = $amount[strlen($amount) - 2] . $amount[strlen($amount) - 1];
   switch(true) {
      case $amount[strlen($amount) - 1] == 1: 
         if ($amount == 11 || (strlen($amount) > 2 && $lastTwo == 11)) {
            return $amount . ' ' . $otherPlural;
            break;
         } else {
            return $amount . ' ' . $singular;
            break;
         }
      case ($amount[strlen($amount) - 1] >= 2) && ($amount[strlen($amount) - 1] <= 4): 
         if (($amount == 12) || ($amount == 13) || ($amount == 14) || (strlen($amount) > 2 && $lastTwo == 12) || (strlen($amount) > 2 && $lastTwo == 13) || (strlen($amount) > 2 && $lastTwo == 14)) {
            return $amount . ' ' . $otherPlural;
            break;
         } else {
            return $amount . ' ' . $plural234;
            break;
         }
      case $amount[strlen($amount) - 1] >= 5: 
         return $amount . ' ' . $otherPlural;
         break;
      default: return 'Error';
   }
}

echo getCount(224, 'груша', 'груши', 'груш');

taskN(10);

/* 10. Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл */

$arrNum10 = [45, -5, 8, 20, 65, -8.56, 0, 6321];

function printArr($arr, $i = 0) {
   if ($i < count($arr)) {
      echo $arr[$i] . '<br/>';
      printArr($arr, $i + 1);
   }
}

printArr($arrNum10);

taskN(11);

/* 11. Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее). */

$num = 1289032587934843908;
echo $num . '<br/>';

function getOneNum($num) {
   if ($num > 9) {
      $num = $num . '';
      $sum = 0;
      for ($i = 0; $i < strlen($num); $i++) {
         $sum += $num[$i];
      }
      getOneNum($sum);
   } else echo $num;
} 

getOneNum($num);

taskN(12);

/* 12. Рассчитать скорость движения машины и выведите её в удобочитаемом виде. Осуществить возможность вывода в км/ч, м/c. Представить решение задачи с помощью одной функции. */

function getCarSpeed($time, $distance, $unit = 'km') {
   echo "Время в пути: $time ч.<br/>";
   echo "Расстояние: $distance км.<br/>";
   if($unit == 'km') {
      $speed = $distance / $time;
      echo "Скорость: $speed км/ч";
   } else {
      $speed = ($distance * 1000) / ($time * 3600);  
      echo "Скорость: $speed м/c";    
   }
}

getCarSpeed(5, 200, 'km');

taskN(13);

/* 13. Даны 2 слова, определить можно ли из 1ого слова составить 2ое, при условии что каждую букву из строки 1 можно использовать только один раз. */

$w1 = 'world';
$w2 = 'word word';

function checkWords($word1, $word2) {
   for($i = 0; $i < mb_strlen($word2); $i++) {
      $w = mb_substr($word2, $i, 1);
      $pos = mb_stripos($word1, $w);
      if($pos === false) {
         return false;
      } else {
         $word1[$pos] = ' '; 
      }
   }
   return true;
}
var_dump(checkWords($w1, $w2));

taskN(14);

/* 14. Палиндромом называют последовательность символов, которая читается как слева направо, так и справа налево. Напишите функцию по определению палиндрома по переданному параметру. */

function checkPol($str) {
   $str = strtolower($str);
   return ($str == strrev($str)) ? true : false;
}

var_dump(checkPol('omo'));

taskN(15);

/* 15. Создать функцию создания таблицы умножения в HTML-документе в виде таблицы с использованием соотв. тегов. */

function multToNum($num) {
   echo "<table>";
   echo "<tr>";
   for($i = 1; $i <= $num; $i++) {
      echo "<th><pre>Умножение на $i       </pre></th>";
   }
   echo "</tr>";

   for ($j = 1; $j <= 10; $j++) {
      echo "<tr>";
      for ($i = 1; $i <= $num; $i++) {
         echo "<td> $j * $i = " . $i * $j . "</td>";
      }
      echo "</tr>";
   }

   echo "</table>";
}

multToNum(10);

taskN(16);

/* 16. Дана строка с текстом. Напишите функцию определения самого длинного слова. */

$str = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, officia error dignissimos asperiores consectetur ipsum quos reprehenderit placeat ratione nihil.";

function getLongestWord($str) {
   $regexp = "/\w+/";
   preg_match_all($regexp, $str, $matches);
   $arr = $matches[0];
   $max = $arr[0];
   for($i = 1; $i < count($arr); $i++) {
      if(strlen($arr[$i]) >= strlen($max)) {
         $max = $arr[$i];
      }
   }
   $length = strlen($max);
   echo "Самое длинное слово: <strong>$max</strong>; его длина: $length символов";
}

getLongestWord($str);

taskN(17);

/* 17. Напишите функцию определения суммарного количества единиц в числах от 1 до 100. */

function getSumOne($num) {
   $sum = 0;
   for($i = 1; $i <= $num; $i++) {
      $iStr = strval($i);
      for($j = 0; $j < strlen($iStr); $j++) {
         if ($iStr[$j] == 1) {
            $sum++;
         }
      }
   }
   echo "Суммарное кол. единиц в числах от 1 до $num равно $sum";
}

getSumOne(100);

taskN(18);

/* 18. Напишите функцию, которая разбивает длинную строку тегами <br> так, чтобы длина каждой подстроки была не более N символов. Новая подстрока не должна начинаться с пробела. */

function divStr($str, $n) {
   echo "Дано: $str <br/>";
   $newStr = '';
   if (strlen($str) > $n) {
      $count = floor(strlen($str)/$n);
      for($i = 0; $i < $count; $i++) {
         $varStr = substr($str, 0, $n);
         while($varStr[0] == ' ') {
            $varStr = substr($varStr, -(strlen($varStr) - 1));
         }
         $newStr .= $varStr . '<br/>';
         $str = substr($str, -(strlen($str) - $n));
         if (strlen($str) < $n) {
            $newStr .= $str;
         }
      }
   }  else {
      $newStr = $str;
   }
   echo "Итог: <br/> $newStr";
}

$str = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, commodi.';

divStr($str, 10);
