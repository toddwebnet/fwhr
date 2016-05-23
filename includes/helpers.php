<?php
function request($key)
{
    if (array_key_exists($key, $_POST))
    {
        return $_POST[$key];
    }
    if (array_key_exists($key, $_GET))
    {
        return $_GET[$key];
    }
    return "";

}

function encrypt($phrase)
{
    return crypt($phrase, '$2a$07$adsfasdkslfjalsksdjf23233$');
}