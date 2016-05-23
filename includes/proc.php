<?php
require_once "helpers.php";
require_once "classes/ToddSQL.php";
require_once "classes/ToddSession.php";

$page = processPage();

function processPage()
{
    if (request("f") == "procLogin")
    {
        procLogin(request("username"), request("password"));
        return null;
    }
    if (request("f") == "procLogout")
    {
        procLogout();
        return null;
    }
    if (is_numeric(ToddSession::getSessionValue("client_id")))
    {
        return "page";
    }
    else
    {
        return "login";
    }
}

function procLogin($username, $password)
{
    $retObject = array();
    $db = new ToddSQL();

    $password = encrypt($password);
    $params = array($username, $password);
    $sql = "select client_id, username from client where username = ? and password_hash = ? ";
    $ret = $db->getRecordset($sql, $params);
    if (count($ret) == 1)
    {
        $retObject["pass"] = 1;
        $sql = "UPDATE client SET last_login = NOW() WHERE client_id = ?";
        $params = array($ret[0]["client_id"]);
        $db->executeQuery($sql, $params);
        ToddSession::setSessionArray($ret[0]);
    }
    else
    {
        $retObject["pass"] = 0;
        $retObject["err"] = "Invalid Credentials";
    }
    $db = null;
    print json_encode($retObject);
}

function procLogout()
{
    ToddSession::flushSession();
}

