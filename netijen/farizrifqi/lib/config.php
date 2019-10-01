<?php

class SMM
{
    
    public function config()
    {
        $manageFile = "manage"; //misal index.php isi index, manage.php isi manage
        $con        = mysqli_connect("localhost", "root", "", "smm");
        return array(
            "manageFile" => $manageFile,
            "con" => $con
        );
    }
    public function setBgColor($color)
    {
        switch ($color) {
            case "axis":
                return "563d7c";
                break;
            case "telkomsel":
                return "bb010a";
                break;
            case "xl":
                return "164396";
                break;
            case "indosat":
                return "f1c40f";
                break;
            case "tri":
                return "fff";
                break;
            default:
                return "fff";
        }
    }
    public function setColor($color)
    {
        switch ($color) {
            case "tri":
                return "000";
                break;
            default:
                return "fff";
        }
    }
}