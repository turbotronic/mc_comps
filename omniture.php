<?php include 'inc/init.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body bgcolor="#fff">
<div id="wait" style="position: absolute; top: 1000px; visibility:hidden; font-size: 1pt; color: white;">   
<script language="JavaScript" type="text/javascript"><!--
    var q = document.location.search;
    getParam = function(arg){
        if (q.indexOf(arg) >= 0){
            var pntr = q.indexOf(arg) + arg.length + 1;
            if (q.indexOf("&", pntr) >= 0){
                return q.substring(pntr, q.indexOf("&", pntr));
            }else{
                return q.substring(pntr, q.length);
            }
        }else{
            return null;
        }
    }
    window.navEvent = getParam('ne');
    window.pageName = '<?php echo THE_TITLE; ?>';
    //alert(window.pageName);    
    //-->
</script>
<div id="omniture" style="display:none;">
<!-- SiteCatalyst code version: H.17.
Copyright 1997-2005 Omniture, Inc. More info available at
http://www.omniture.com -->
<script language="JavaScript"><!--//
/* Specify the Report Suite ID(s) to track here */
var s_account="denverpost";
//--></script>
<script language="JavaScript" src="http://extras.mnginteractive.com/live/js/omniture/SiteCatalystCode_H_17.js"></script>
<script language="JavaScript" src="http://extras.mnginteractive.com/live/js/omniture/OmnitureHelper.js"></script>
<script language="JavaScript">
<!--
    /* You may give each page an identifying name, server, and channel on the next lines. */
    s.pageName = window.pageName;
    s.channel = getParam('channel');
    s.prop1 = s.channel; 
    s.prop2 = s.channel + "/" + getParam('section'); 
    s.prop3 = s.channel + "/" + getParam('section') + "/" + s.pageName; 
    s.prop4 = s.channel + "/" + getParam('section') + "/" + s.pageName + "/" + window.navEvent;
    s.prop9 = getCiQueryString("SOURCE");
    s.eVar2 = getCiQueryString("SOURCE");
    /* E-commerce Variables */
    s.campaign = getCiQueryString("EADID")+getCiQueryString("CREF");
    s.events = "event1"
    s.eVar4 = s.pageName;
    /************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
    var s_code=s.t();if(s_code)document.write(s_code);
//-->
</script>

<script language="JavaScript"><!--
if(navigator.appVersion.indexOf('MSIE')>=0)document.write(unescape('%3C')+'\!-'+'-')
//--></script>
<noscript>
    <img src="http://denverpost.112.2O7.net/b/ss/denverpost/1/H.17--NS/0" height="1" width="1" border="0" alt="" />
</noscript>
<!--/DO NOT REMOVE/-->
<!-- End SiteCatalyst code version: H.17. -->
</div>
</div>
</body>
</html>