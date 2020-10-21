<?php
$tsiUrl = "http://www.tsi.lv";
$tsiName = "Институт транспорта и связи";
$email = "random@email.com";
$emailText = "My e-mail";
// Comment
# Comment
/* 
Multi comment
*/
?>
<footer>
<a href="<?php echo $tsiUrl ?>"><?php echo $tsiName ?></a>
<br/>
<a href="mailto:<?php echo $email ?>"><?php echo $emailText ?></a>
</footer>

<style>
    footer {
        position:fixed;
        bottom:0;
    }
</style>