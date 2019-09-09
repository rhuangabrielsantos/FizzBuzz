<?php

for ($number = 1; $number <= 100; $number++) {

    if ($number % 15 == 0) {
        echo 'FizzBuzz';
        continue;
    }

    if ($number % 3 == 0) {
        echo 'Fizz';
        continue;
    }

    if ($number % 5 == 0) {
        echo 'Buzz';
        continue;
    }

    echo $number . PHP_EOL;
}

//for ($i = 1; $i <= 100; $i++) {
//	$result = null;
//
//    if ($i % 3 == 0) {
//		$result .= 'Fizz';
//	}
//	if ($i % 5 == 0) {
//		$result .= 'Buzz';
//	}
//	if ($i % 3 > 0 && $i % 5 > 0) {
//		$result = $i;
//	}
//
//    echo $result . PHP_EOL;
//}
