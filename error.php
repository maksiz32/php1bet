<?php

set_exception_handler(function(Throwable $exeption) {
    if ($exeption instanceof UserExeptionInterface) {
        die($exeption->getMessage());
    }
    //sendmail $exeption->getMessage()
});

set_error_handler(function(int $errNo, string $errStr) {
    //sendmail $errStr
    die("Произошла ошибка. Комманда уже работает над ее исправлением".$errStr);
});