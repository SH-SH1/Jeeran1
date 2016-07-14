<?
session_start();

if (!(isset($_SESSION["real_name"])))
{
    //echo "I'm not logged in";
    header('Location: login.php');
}
else
{
    echo "";
}


?>



<html>
<head>
    <title>Mafia-Assassins :: Users Online</title></head>
<link REL="stylesheet" TYPE="text/css" HREF="main.css">

<script language=javascript src=Menus.js></script>

<body background="wallpaper.jpg">
<center>
    <table border="0" cellspacing="0" cellpadding="0" align="center" width="95%" class="cat">

        <TR>

            <TD width="150" background="tdbg3.jpg" bgcolor="#222222" valign="top">
                <?php include("leftmenu.php");?>
            </TD>

            <td width="100%" valign="top">        <br>


                <table border="1" cellspacing="0" cellpadding="2" bordercolor="black" align="center" width="65%" class="sub2">
                    <tr>
                        <td class="header" colspan="2" align="center">Users Online In The Last 5 Minutes</td>
                    </tr>
                    <tr>
                        <td width="92%" class="usersonline" bgcolor="#222222" border="0">

                            <?
                            include "includes/db_connect.php";
                            $timenow=time();
                            $online = time() - 300; //the current time minus 300 seconds
                            $select = mysql_query("SELECT * FROM users WHERE onlinetime2 >='$online' AND online='Online' ORDER by id ASC");
                            $num = mysql_num_rows($select);
                            while ($i = mysql_fetch_object($select)){


                                if($i->userlevel>="15"){
                                    $echo = "<font color=red><b>$i->username</b></font>";
                                }elseif ($i->userlevel=="10"){
                                    $echo = "<font color=lime><b>$i->username</b></font>";
                                }elseif ($i->userlevel=="5"){
                                    $echo = "<font color=yellow><b>$i->username</b></font>";
                                }else{
                                    $echo = "$i->username";
                                }

                                $numfor=number_format($num);

                                echo "<a class=usersonline href='viewprofile.php?viewuser=$i->username' style=\"\">$echo</a> - ";
                            }?> <? echo "$numfor"; ?><i> User(s) Online</i>

                        </td>
                    </tr>
                </table>
                <br><br><br>
                <table border="1" cellspacing="0" cellpadding="2" bordercolor="#222222" align="center" width="30%" class="sub2">
                    <tr>
                        <td class="header" colspan="2" align="center">Key</td>
                    </tr>
                    <tr>
                        <td width="92%" align="center" bgcolor="#222222" border="0" >
                            <font color="white" size="1">Admins are in</font> <font color="red" size="1">Red</font>
                            <br>
                            <font color="white" size="1">Mods are in</font> <font color="lime" size="1">Lime</font>
                            <br>
                            <font color="white" size="1">HDOs are in</font> <font color="yellow" size="1">Yellow</font></td>
                    </tr>
                </table>


            </td>



            <TD width="150" valign="top">
                <?php include("rightmenu.php");?>
            </TD>

        </TR>


    </table>

</center>
</body>
</html>