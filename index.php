<?php 

/**
 * @package                Joomla.Site
 * @subpackage             Templates.responsive_bricks
 * @copyright              Copyright (C) 2012 Giovanni Canzio for joomla theming - Copyright (C) 2012 Dave Gamache for Skeleton framework
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// get params
$logo               = $this->params->get('logo');
$app                = JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams     = $app->getTemplate(true)->params;

// check modules
$showPrefaceBlocks = (
        $this->countModules('respbricks-prefacefirst') 
     or $this->countModules('respbricks-prefacemiddle') 
     or $this->countModules('respbricks-prefacelast')
        );

$showLeftCol = $this->countModules('respbricks-leftsidebar');
$showRightCol = $this->countModules('respbricks-rightsidebar');

if ($showLeftCol==0 and $showRightCol==0) {
        $contentWidthClass = "sixteen columns";
} 

else if (
        ($showLeftCol>0 and $showRightCol==0)
     OR ($showLeftCol==0 and $showRightCol>0)
     ) {
        $contentWidthClass = "twelve columns";
     }
else {
    $contentWidthClass = "eight columns";
}

JHtml::_('behavior.framework', true);

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<jdoc:include type="head" />
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/skeleton.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/layout.css" type="text/css" media="screen" />
        
        <!--[if IE ]>
            <style type="text/css" media="all">@import "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/ie_patches.css";</style>
        <![endif]-->

        <!--[if IE 6]>
            <style type="text/css" media="all">@import "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/ie6_patches.css";</style>
        <![endif]-->
        
        <!--[if IE 7]>
            <style type="text/css" media="all">@import "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/ie7_patches.css";</style>
        <![endif]-->
        
        <!--[if IE 8]>
            <style type="text/css" media="all">@import "<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/stylesheets/ie8_patches.css";</style>
        <![endif]-->
        
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/apple-touch-icon-114x114.png">

</head>
<body>



    <!-- Primary Page Layout
    ================================================== -->

    <div class="container">
        
        <!-- HEADER -->
        
        <span id="debug"></span>
        
        <header class="sixteen columns">
            
            <h1 id="logo">
                <?php if ($logo): ?>
                <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" />
                <?php endif;?>
                <?php if (!$logo ): ?>
                <?php echo htmlspecialchars($templateparams->get('sitetitle'));?>
                <?php endif; ?>
            </h1>
            <h2>
            <?php echo htmlspecialchars($templateparams->get('sitedescription'));?>
            </h2>
            <jdoc:include type="modules" name="respbricks-header" />
            <div id="searchBlock" class="one-third columns">
                <jdoc:include type="modules" name="respbricks-search" />
            </div>
        </header>
        
        <!-- TOP NAVIGATION -->
        
        <nav id="top_navigation" class="sixteen columns">
            <jdoc:include type="modules" name="respbricks-topnavigation" />
        </nav>
        
        <!-- COMMUNICATION BANNER -->
        
        <div class="sixteen columns" id="communicationBanner">
        <jdoc:include type="modules" name="respbricks-communication" />
        </div>
        
        <?php 
        
        if ($showPrefaceBlocks > 0) {
        
        ?>
        
        <!-- PREFACE FIRST -->
        
        <div class="preface_container one-third column" id="preface_first">
            <jdoc:include type="modules" name="respbricks-prefacefirst" />
        </div>
        
        <!-- PREFACE MIDDLE -->
        
        <div class="preface_container one-third column" id="preface_middle">
            <jdoc:include type="modules" name="respbricks-prefacemiddle" />
        </div>
        
        <!-- PREFACE LAST -->
        
        <div class="preface_container one-third column" id="preface_last">
            <jdoc:include type="modules" name="respbricks-prefacelast" />
        </div>
        
        <?php 
                
        }
        
        ?>
        
        <!-- LEFT SIDEBAR -->
        
        <section class="four columns " id="leftCol">
            <jdoc:include type="modules" name="respbricks-leftsidebar" />
        </section>
        
        <!-- MAIN CONTENT -->
        
        <section class="<?php echo $contentWidthClass; ?>" id="content">
            
        
            <!-- BREADCRUMB -->

            <div id="breadcrumb">
                <jdoc:include type="modules" name="respbricks-breadcrumb" />
            </div>
            
            <!-- Content TOP -->
            
            <div id="content_top">
            <jdoc:include type="modules" name="respbricks-contenttop" />
            </div>
            
            <!-- Content MIDDLE-->
            
            <div id="content_middle">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
                <jdoc:include type="modules" name="respbricks-contentbottom" />
            </div>
            
        </section>
        
        <!-- RIGHT COLUMN -->

        <section class="four columns" id="rightCol">
            <jdoc:include type="modules" name="respbricks-rightsidebar" />
        </section>
        
        <!-- BOTTOM FIRST -->
        
        <section class="one-third column clearLeft" id="bottom_first">
            <jdoc:include type="modules" name="respbricks-bottomfirst" />
        </section>
        
        <!-- BOTTOM MIDDLE -->
        
        <section class="one-third column" id="bottom_middle">
            <jdoc:include type="modules" name="respbricks-bottommiddle" />
        </section>
        
        <!-- BOTTOM LAST -->
        
        <section class="one-third column" id="bottom_last">
            <jdoc:include type="modules" name="respbricks-bottomlast" />
        </section>
        
        <!-- BOTTOM 1 -->
        
        <section class="four columns" id="bottom_1">
            <jdoc:include type="modules" name="respbricks-bottom1" />        
        </section>
        
        <!-- BOTTOM 2 -->
        
        <section class="four columns" id="bottom_2">
            <jdoc:include type="modules" name="respbricks-bottom2" />
        </section>
        
        <!-- BOTTOM 3 -->
        
        <section class="four columns" id="bottom_3">
            <jdoc:include type="modules" name="respbricks-bottom3" />
        </section>
               
        <!-- BOTTOM 4 -->
        
        <section class="four columns" id="bottom_4">
            <jdoc:include type="modules" name="respbricks-bottom4" />
        </section> 
        
        <!-- PREFOOTER -->
        
        <div class="sixteen columns" id="prefooter">
            <jdoc:include type="modules" name="respbricks-prefooter" />
        </div>
        
        <!-- FOOTER -->
        
        <div class="sixteen columns" id="footer">
            <jdoc:include type="modules" name="respbricks-footer" />
        </div>
        
        
    </div><!-- container -->



    <!-- JS
    ================================================== -->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="javascripts/tabs.js"></script>

<!-- End Document
================================================== -->
</body>
</html>