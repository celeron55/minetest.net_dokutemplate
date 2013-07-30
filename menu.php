<?php 
//$tmp = substr(DOKU_INC, 0, strlen(DOKU_INC)-1);
$str = file_get_contents(DOKU_INC . "/data/pages/menu.txt");
$links = array();
$links = split("!", $str);

echo"        <div id='menu'>
              <ul>
";

for ($i = 0; $i <= count($links)-1; $i++) {
    $links[$i] = trim($links[$i]);
    $lnk_tit = substr($links[$i],0,strpos($links[$i],"|"));
    $lnk = substr($links[$i],strpos($links[$i],"|")+1);
    $lnk_pre = substr($lnk_tit, 0, 2);
    $n_pre = $nav_pre;
    $ext = "";
    if (substr($lnk,0,4) == "http") {$n_pre = ""; $ext = "_ex";}
    if ($i == 0) {$n_pre = "";}
    if ($lnk_pre == "**") {
	if (substr($links[($i-1)], 0, 2) != "**") {echo "<ul>"."\n";} else { echo "</li>"."\n";}
	echo "<li><a href='" . $n_pre . $lnk . "' class='sub" .$ext."'>" . substr($lnk_tit,2) . "</a></li>"."\n";
    } else {
	if (substr($links[($i-1)], 0, 2) == "**") {echo "</ul></li>"."\n";} else { echo "</li>"."\n";}
	echo "<li><a href='" . $n_pre . $lnk . "'>" . substr($lnk_tit,1) . "</a>"."\n";
    }
}

echo"
<li style='float:right;'>";
                  
                        if ($_SERVER['REMOTE_USER']) {
					 $USERINFO = $_SESSION[DOKU_COOKIE]['auth']['info'];
                            echo "<li style='float:right;'><a href='' style='font-weight:bold;font-size:16px';>" . $USERINFO['name'] . "</a><ul><li><a href='". $nav_pre . $ID ."&do=recent' class='sub'>Changelog</a></li>";
				  
                        tpl_action('admin', 1, 'li');
                        tpl_action('profile', 1, 'li');
                        tpl_action('register', 1, 'li');
                        tpl_action('login', 1, 'li'); 
			echo "</ul></li>";}
echo "       </ul>
            </div>";
?>