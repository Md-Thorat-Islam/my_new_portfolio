<?php
/**
 * Created by PhpStorm.
 * User: Tourat
 * Date: 02-May-22
 * Time: 1:45 PM
 */
function division($id)
{
    global $db;
    $result=$db->query("SELECT name FROM divisions WHERE id=$id");
    list($name)=$result->fetch_row();
    return $name;
}
function districts($id)
{
    global $db;
    $result=$db->query("SELECT name FROM districts WHERE id=$id");
    list($name)=$result->fetch_row();
    return $name;
}
function upazilas($id)
{
    global $db;
    $result=$db->query("SELECT name FROM upazilas WHERE id=$id");
    list($name)=$result->fetch_row();
    return $name;
}

$gender_array=[0=>"Male",1=>"Female",3=>"Others"];

$maritalStatus_array=[0=>"Single",1=>"Married",3=>"Widowed",4=>"Separated",5=>"Divorced"];
$religion_array=[0=>"Atheism",1=>"Buddhism",2=>"Christianity",3=>"Confucianism",4=>"Druze",5=>"Gnosticism",6=>"Hinduism",7=>"Islam",8=>"Jainism",9=>"Judaism",10=>"Rastafarianism",11=>"Shinto",12=>"Sikhism",13=>"Zoroastrianism",14=>"Traditional African Religions",15=>"African Diaspora Religions",16=>"Indigenous American Religions"];
    
    

?>

