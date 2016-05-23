<?php

class ToddCrypt
{
    public function encrypt($password, $salt)
    {
        return crypt($password, $salt);
    }
}