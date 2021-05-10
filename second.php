<?php
//ЗАДАНИЕ К УРОКУ 2

//#1
/*
Разработайте скрипт командной строки, задающий любой исторический вопрос с предоставлением трёх вариантов ответов. Например: «В каком году произошло крещение Руси?». Варианты: 810, 990 или 740 год. В случае, если пользователь ответит вариантом, не входящим в перечень ответов, повторите вопрос. Если пользователь ответил ожидаемым вариантом, но не верно, выведите сообщение о неверном ответе и завершите программу. Если пользователь ответил правильно, поздравьте его и завершите выполнение скрипта.
*/
function history() {
    switch ($str = (int) readline("В каком году произошло крещение Руси?\r\n")) {
        case "810":
            echo "Нет, это не верный ответ!\r\n" . PHP_EOL;
            break;
        case "990":
            echo "Поздравляю, Вы ответили верно!\r\n" . PHP_EOL;
            break;
        case "740":
            echo "Нет, это не верный ответ!\r\n" . PHP_EOL;
            break;
        default:
            history();
    }
}
history();
/*
//#2
Доработайте задание с прошлого занятия с использованием условных операторов и циклических конструкций. Реализуйте скрипт, запрашивающий у пользователя количество задач, запланированных на день. После получения корректного числа, программа должна спросить определённое количество раз, какая задача запланирована и сколько примерно времени займёт её выполнение. По завершению циклического опроса необходимо вывести итог запланированного пользователем дня, содержащий весь перечень задач с оценкой времени, а также суммарное количество часов.
*/
$name = readline("Привет, как вас зовут?\r\n");
do {
    $count_tasks = (int) readline($name . ", cколько задач вы планируете на сегодня (введите число)?\r\n\r\n");
} while (!$count_tasks);

function getRusStrNum ($num) {
    $numTasksRus = [
        1 => 'первая', 2 => 'вторая', 3 => 'третья', 4 => 'четвёртая', 5 => 'пятая',
        6 => 'шестая', 7 => 'седьмая', 8 => 'восьмая', 9 => 'девятая', 10 => 'десятая'
    ];
    return ($num <= count($numTasksRus)) ? $numTasksRus[$num] : $num . "-я"; 
}

$q = [];
for ($i=1; $i <= $count_tasks; $i++) {
    $task = readline("Какая задача стоит перед вами сегодня?\r\n\r\n");
    do {
        $time = (int) readline("Сколько примерно времени займёт у вас " . getRusStrNum($i) . " задача?\r\n");
    } while (!$time);
    $q[$i] = [
         'task' => $task,
         'time' => $time
    ];
}
echo PHP_EOL;

$sumTime = 0;
echo "{$name}, сегодня у вас запланировано " . count($q) . " приоритетных задачи на день:\r\n";
foreach ($q as $val) {
    echo "\t- {$val['task']} ({$val['time']}ч)\r\n";
    $sumTime += $val['time'];
}
echo "Примерное время выполнения плана = {$sumTime}ч\r\n\r\n" . PHP_EOL;

/*
//#3
* Представьте, что вы ведёте счёт на пальцах одной ладони, не считая два раза подряд один и тот же, начиная с большого. Дойдя до мизинца, вы продолжаете счёт в обратном направлении. Напишите скрипт для запуска из командной строки, определяющий по введённому положительному числу палец, который соответствует ему по счёту. В случаях, если введено некорректное значение (меньше или равное нуля) повторяйте запрос ввода, пока не будет введено корректное число.
*/
while (($num3 = (int) readline("Чтобы вычислить палец по номеру, введите число\r\n")) <= 0) {
}
switch ($num3 % 8) {
    case 1:
        echo "Большой палец\r\n\r\n";
        break;
    case 0:
    case 2:
        echo "Указательный палец\r\n\r\n";
        break;
    case 3:
    case 7:
        echo "Средний палец\r\n\r\n";
        break;
    case 4:
    case 6:
        echo "Безымянный палец\r\n\r\n";
        break;
    case 5:
        echo "Мизинец\r\n\r\n";
        break;
}