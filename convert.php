<?php //convert.php

$c = $f = "";

if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);

if($c !="")
{
    $f =intval((9/5)*$c+32);
    $out = "$c centigrade equals $f fahrenheit";    
}
elseif($f !="")
{
    $c = intval((5/9)*($f-32));
    $out = "$f fahrenheight equals $c centigrade";
}
else
{
    $out = "";
}
echo <<<_END

    <html>
        <head>
            <title> Temperature Converter </title>
        </head>
        <body><pre>
        <b>$out</b>
        <form method="post" action="convert.php">
           Enter Celsius: <input type="text" name="c" size="7">
        Enter Fahrenheit: <input type="text" name="f" size="7">
        <input type="submit" value="Convert">
        </form></pre>
        </body>  
    </html>

_END;

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var; 
}

?>