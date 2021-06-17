<?php

class UsernameLenExeption extends Exception implements UserExeptionInterface
{
    public function __construct(string $str)
    {
        parent::__construct(
            $str ?? 'Произошла ошибка. Комманда уже работает над ее исправлением',
            500
        );
    }
}