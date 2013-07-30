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

    include('menu.php');
    tpl_includeFile('header.html');
 echo "

    <div class='headings group'>
        <ul class='a11y skip'>
            <li><a href='#dokuwiki__content'>" . $lang['skip_to_content'] . "</a></li>
        </ul>

        <h1>";
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
