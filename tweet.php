<?php /*by sukei*/function p($l){$i=0;while($i++<$l){echo($i%3+$i%5==0?'FizzBuzz':($i%3==0?'Fizz':($i%5==0?'Buzz':$i))).PHP_EOL;}}p(100);
