<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="dokuwiki__header" style='padding:0;'><div class="pad group">
<?php 
$nav_pre = "./doku.php?id=";
if ($conf['userewrite'] == 1) {$nav_pre = "./";} 
echo"
              <div id='menu'>
              <ul>
               <li><a href='./'>Home</a></li>
               <li><a href='". $nav_pre . "download'>Download</a></li>
               <li><a href='". $nav_pre . "mods'>Mods</a>
	           <ul>
	            <li><a href='". $nav_pre . "mods' class='sub'>Recommended</a></li>
	            <li><a href='http://forum.minetest.net/viewforum.php?id=11' class='sub_ex'>Mod Releases</a></li>
	            <li><a href='http://forum.minetest.net/viewforum.php?id=9' class='sub_ex'>Modding General</a></li>
	           </ul>
                </li>
               <li><a href='". $nav_pre . "texturepacks'>Texture Packs</a>
	           <ul>
	            <li><a href='". $nav_pre . "texturepacks' class='sub'>Recommended</a></li>
	            <li><a href='http://forum.minetest.net/viewforum.php?id=4' class='sub_ex'>All</a></li>
	           </ul>
                </li>
               <li><a href='". $nav_pre . "community'>Community</a>
	           <ul>
	            <li><a href='". $nav_pre . "community' class='sub'>Overview</a></li>
	            <li><a href='http://forum.minetest.net/' class='sub_ex'>Forum</a></li>
	            <li><a href='". $nav_pre . "irc' class='sub'>IRC</a></li>
	            <li><a href='". $nav_pre . "contributors' class='sub'>Contributors</a></li>
	            <li><a href='". $nav_pre . "servers' class='sub'>Servers</a></li>
	           </ul>
                </li>
<li><a href='". $nav_pre . "development'>Development</a>
	<ul>
	<li><a href='". $nav_pre . "development' class='sub'>Overview</a></li>
	<li><a href='https://github.com/minetest/' class='sub_ex'>Github</a></li>
	<li><a href='http://dev.minetest.net/Main_Page' class='sub_ex'>Developer Wiki</a></li>
	<li><a href='http://dev.minetest.net/Intro' class='sub_ex'>API</a></li>
	<li><a href='http://c55.me/blog' class='sub_ex'>Blog</a></li>
	</ul>
</li>
<li><a href='". $nav_pre . "support'>Support</a></li>";
?>
<li>|</li>
<li><a href='http://wiki.minetest.com/wiki/'>Wiki</a></li>
<li style='float:right;'>
                    <?php
                        if ($_SERVER['REMOTE_USER']) {
					 $USERINFO = $_SESSION[DOKU_COOKIE]['auth']['info'];
                            echo "<a href='' style='font-weight:bold;font-size:16px';>" . $USERINFO['name'] . "</a><ul><li><a href='". $nav_pre . $ID ."&do=recent' class='sub'>Changelog</a></li>";
				  
                        tpl_action('admin', 1, 'li');
                        tpl_action('profile', 1, 'li');
                        tpl_action('register', 1, 'li');
                        tpl_action('login', 1, 'li'); }
                    ?>
                </ul></li></ul>
            </div>

    <?php tpl_includeFile('header.html') ?>

    <div class="headings group">
        <ul class="a11y skip">
            <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content']; ?></a></li>
        </ul>

        <h1><?php
            // get logo either out of the template images folder or data/media folder
            $logoSize = array();
            $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

            // display logo and wiki title in a link to the home page
            tpl_link(
                wl(),
                '<span><img src="'.$logo.'" '.$logoSize[3].' style="width:520px;" alt="'.$conf['title'].'" /></span>',
                'accesskey="h" title="Home"'
            );
        ?></h1>
        <?php if ($conf['tagline']): ?>
            <p class="claim"><?php echo $conf['tagline']; ?></p>
        <?php endif ?>
    </div>

    <div class="tools group">
        <!-- USER TOOLS -->
        <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools" style='position:relative;'>
</div>

        <?php endif ?>

        <!-- SITE TOOLS -->
        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
            <!--<?php tpl_searchform(); ?>-->
            <div class="mobileTools">
                <?php tpl_actiondropdown($lang['tools']); ?>
            </div>
            <ul>
                <?php
                  //  tpl_action('recent', 1, 'li');
                  //  tpl_action('media', 1, 'li');
                 //   tpl_action('index', 1, 'li');
                ?>
            </ul>
        </div>

    </div>

    <!-- Minetest Menu -->
        <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
        <div class="breadcrumbs">
            <?php if($conf['youarehere']): ?>
                <div class="youarehere"><?php tpl_youarehere() ?></div>
            <?php endif ?>
            <?php if($conf['breadcrumbs']): ?>
                <div class="trace"><?php tpl_breadcrumbs() ?></div>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?php html_msgarea() ?>

    <hr class="a11y" />
</div></div><!-- /header -->
