// style.js: JavaScript file which uses Document Object Model
// to set style of text in htmlpres HTML presentation template.
// Created by Eric Krock, Netscape Communications.
// Permission is granted to freely reuse and distribute this file.
// Changes:
// - 30 July  1997 backward compatibility with Nav3.0.
// - 11 Sept  1997 font scaling in speakerNotes and tutorial modes
// - 10 April 1998 cross-browser compatibility with IE4


// Global variables speakerNotesMode and tutorialMode determines 
// whether we are in:
//
// * speaker notes display mode (speaker mode text visible, all
//   text in smaller fonts so speaker notes fit on screen)
// * tutorial mode (tutorial mode text visible, text in slightly
//   larger fonts for online viewing)
// * normal mode (speaker mode text invisible because color is same
//   as backgroundcolor, all text in large fonts appropriate
//   for overhead display).

var speakerNotesMode = false
var tutorialMode = false


// Adjust font sizes downward in speakerNotes and tutorial modes.
var sizeMultiplier = 0.79                     // default
if (tutorialMode) sizeMultiplier = 0.79       // online viewing
if (speakerNotesMode) sizeMultiplier = 0.55   // speaker preparation with notes
var minFontSize = 12                          // smallest ever displayed


// Global variable fontSizeOf will store the per-element size data
// for the current screen size so that style
// sheets in individual HTML pages can retrieve and 
// use this data. 

var fontSizeOf


// Calculates font size to be used for element, which is
// the maximum of specified*sizeMultiplier and minAllowed.
// Returns as string for storage in data structure fontSizeOf.
function calcSize (specified, sizeMult, minOK)
{  return ( Math.max (Math.round(specified*sizeMult), minOK) + "pt" )
}


// Constructor function for object type fontSizeOf.
// This object type holds the per-element size data
// for the current screen size.  A global variable,
// fontSizeOf, is set to this object so that style
// sheets in individual HTML pages can retrieve and 
// use this data. 

function constructFontSizeOf (h1, h2, h3, h4, h5, h6, titlepage, p, li, ul, ol, dl, dt, dd, blockquote, th, td, pre, tt, small, medium, large, sizeMult, minOK)
{  this.h1 = calcSize(h2, sizeMult, minOK) 
   this.h2 = calcSize(h2, sizeMult, minOK)
   this.h3 = calcSize(h3, sizeMult, minOK)
   this.h4 = calcSize(h4, sizeMult, minOK)
   this.h5 = calcSize(h5, sizeMult, minOK)
   this.h6 = calcSize(h6, sizeMult, minOK)
   this.titlepage = calcSize(titlepage, sizeMult, minOK)
   this.p  = calcSize(p, sizeMult, minOK)
   this.li = calcSize(li, sizeMult, minOK)
   /* BUG WORKAROUND: Shouldn't be necessary to set fontSize on UL and OL as
      well as LI, but setting LI fontSize doesn't work now.  Setting on UL and OL
      is the workaround. */ 
   this.ul = calcSize(ul, sizeMult, minOK)
   this.ol = calcSize(ol, sizeMult, minOK)
   this.dl = calcSize(dl, sizeMult, minOK)
   this.dt = calcSize(dt, sizeMult, minOK)
   this.dd = calcSize(dd, sizeMult, minOK)
   this.blockquote = calcSize(blockquote, sizeMult, minOK)
   this.th = calcSize(th, sizeMult, minOK)
   this.td = calcSize(td, sizeMult, minOK)
   this.pre = calcSize(pre, sizeMult, minOK)
   this.tt  = calcSize(tt, sizeMult, minOK)
   this.small = calcSize(small, sizeMult, minOK)
   this.medium = calcSize(medium, sizeMult, minOK)
   this.large = calcSize(large, sizeMult, minOK)
}

// This is a simplified version of the JavaScript Client Sniffer code 
// found at http://developer.nextscape.com/docs/examples/javascript/browser_type.html

function Is ()
{   // convert all characters to lowercase to simplify testing
    var agt=navigator.userAgent.toLowerCase()

    // --- BROWSER VERSION ---
    this.major = parseInt(navigator.appVersion)
    this.minor = parseFloat(navigator.appVersion)

    this.nav  = ((agt.indexOf('mozilla')!=-1) && ((agt.indexOf('spoofer')==-1)
                && (agt.indexOf('compatible') == -1)))
    this.nav2 = (this.nav && (this.major == 2))
    this.nav3 = (this.nav && (this.major == 3))
    this.nav4 = (this.nav && (this.major == 4))

    this.ie   = (agt.indexOf("msie") != -1)
    this.ie3  = (this.ie && (this.major == 2))
    this.ie4  = (this.ie && (this.major == 4))

    this.opera = (agt.indexOf("opera") != -1)
     
    this.nav4up = this.nav && (this.major >= 4)
    this.ie4up  = this.ie  && (this.major >= 4)
}


var is = new Is()

var ieTargetStyleSheetID = "ietssxyz"


function setFontSizes (h1, h2, h3, h4, h5, h6, titlepage, p, li, ul, ol, dl, dt, dd, blockquote, th, td, pre, tt, small, medium, large, sizeMultiplier, minFontSize)
{var fontSizeOf = new constructFontSizeOf (h1, h2, h3, h4, h5, h6, titlepage, p, li, ul, ol, dl, dt, dd, blockquote, th, td, pre, tt, small, medium, large, sizeMultiplier, minFontSize)
 if (is.nav4up) {
   document.tags.H1.fontSize = fontSizeOf.h2
   document.tags.H2.fontSize = fontSizeOf.h2
   document.tags.H3.fontSize = fontSizeOf.h3
   document.tags.H4.fontSize = fontSizeOf.h4
   document.tags.H5.fontSize = fontSizeOf.h5
   document.tags.H6.fontSize = fontSizeOf.h6
   document.tags.PRE.fontSize = fontSizeOf.pre
   document.tags.P.fontSize = fontSizeOf.p
   /* BUG WORKAROUND: Shouldn't be necessary to set fontSize on UL and OL as
      well as LI, but setting LI fontSize doesn't work now.  Setting on UL and OL
      is the workaround. */ 
   document.tags.LI.fontSize = fontSizeOf.li
   document.tags.UL.fontSize = fontSizeOf.ul
   document.tags.OL.fontSize = fontSizeOf.ol
   document.tags.DL.fontSize = fontSizeOf.dl
   document.tags.DT.fontSize = fontSizeOf.dt
   document.tags.DD.fontSize = fontSizeOf.dd
   document.tags.BLOCKQUOTE.fontSize = fontSizeOf.blockquote
   document.tags.TH.fontSize = fontSizeOf.th
   document.tags.TD.fontSize = fontSizeOf.td
   document.classes.titlepage.all.fontSize = fontSizeOf.titlepage
   document.classes.small.all.fontSize = fontSizeOf.small
   document.classes.medium.all.fontSize = fontSizeOf.medium
   document.classes.large.all.fontSize = fontSizeOf.large
   document.classes.footnote.all.fontSize = fontSizeOf.small
 }
 else if (is.ie4up) {
// document.styleSheets[ieTargetStyleSheetID].addRule ("", "" + ":" + "");
   document.styleSheets[ieTargetStyleSheetID].addRule ("H1", "font-size:" + fontSizeOf.h2)
   document.styleSheets[ieTargetStyleSheetID].addRule ("H2", "font-size:" + fontSizeOf.h2)
   document.styleSheets[ieTargetStyleSheetID].addRule ("H3", "font-size:" + fontSizeOf.h3)
   document.styleSheets[ieTargetStyleSheetID].addRule ("H4", "font-size:" + fontSizeOf.h4)
   document.styleSheets[ieTargetStyleSheetID].addRule ("H5", "font-size:" + fontSizeOf.h5)
   document.styleSheets[ieTargetStyleSheetID].addRule ("H6", "font-size:" + fontSizeOf.h6)
   document.styleSheets[ieTargetStyleSheetID].addRule ("PRE", "font-size:" + fontSizeOf.pre)
   document.styleSheets[ieTargetStyleSheetID].addRule ("P", "font-size:" + fontSizeOf.p)
   /* BUG WORKAROUND: Shouldn't be necessary to set fontSize on UL and OL as
      well as LI, but setting LI fontSize doesn't work now.  
      Setting on UL and OL is the workaround. */ 
   document.styleSheets[ieTargetStyleSheetID].addRule ("LI", "font-size:" + fontSizeOf.li)
   document.styleSheets[ieTargetStyleSheetID].addRule ("UL", "font-size:" + fontSizeOf.ul)
   document.styleSheets[ieTargetStyleSheetID].addRule ("OL", "font-size:" + fontSizeOf.ol)
   document.styleSheets[ieTargetStyleSheetID].addRule ("DL", "font-size:" + fontSizeOf.dl)
   document.styleSheets[ieTargetStyleSheetID].addRule ("DT", "font-size:" + fontSizeOf.dt)
   document.styleSheets[ieTargetStyleSheetID].addRule ("DD", "font-size:" + fontSizeOf.dd)
   document.styleSheets[ieTargetStyleSheetID].addRule ("BLOCKQUOTE", "font-size:" + fontSizeOf.blockquote)
   document.styleSheets[ieTargetStyleSheetID].addRule ("TH", "font-size:" + fontSizeOf.th)
   document.styleSheets[ieTargetStyleSheetID].addRule ("TD", "font-size:" + fontSizeOf.td)
   document.styleSheets[ieTargetStyleSheetID].addRule (".titlepage", "font-size:" + fontSizeOf.titlepage)
   document.styleSheets[ieTargetStyleSheetID].addRule (".small",  "font-size:" + fontSizeOf.small)
   document.styleSheets[ieTargetStyleSheetID].addRule (".medium", "font-size:" + fontSizeOf.medium)
   document.styleSheets[ieTargetStyleSheetID].addRule (".large", "font-size:" + fontSizeOf.large)
   document.styleSheets[ieTargetStyleSheetID].addRule (".footnote", "font-size:" + fontSizeOf.small)
 }
 return fontSizeOf
}



// These functions are excerpted from the cross-browser JavaScript API for setting CSSP properties
// which can be found at http://developer.netscape.com/docs/technote/dynhtml/csspapi/csspapi.html

function getElt () 
{ if (is.nav4up) {
    var currentLayer = document.layers[getElt.arguments[0]];
    for (var i=1; i<getElt.arguments.length && currentLayer; i++)
    {   currentLayer = currentLayer.document.layers[getElt.arguments[i]];
    }
    return currentLayer;
  } 
  else if (is.ie4up) {
    var elt = eval('document.all.' + getElt.arguments[getElt.arguments.length-1]);
    return(elt);
  }
}


function setEltVisibility (elt, value)
{  if (is.nav4up) elt.visibility = value;
   else if (is.ie4up) elt.style.visibility = value;
}


function moveEltTo (elt, x, y) 
{ if (is.nav4up) elt.moveTo(x, y);
  else if (is.ie4up) {
    elt.style.pixelLeft = x;
    elt.style.pixelTop  = y;
  }
}


function getEltLeft (elt) {
  if (is.nav4up)     return (elt.left);
  else if (is.ie4up) return (elt.style.pixelLeft);
}


function getEltTop (elt) 
{ if (is.nav4up)     return (elt.top);
  else if (is.ie4up) return (elt.style.pixelTop);
}






// onLoad method 
function moveSpeakerNotes ()
{   var speakerElt = getElt("speakernotessection")
    if (speakerNotesMode && !tutorialMode && speakerElt) 
    {   var tutorialElt = getElt("tutorialsection")
        if (tutorialElt)
        {  /* on Nav4, we explicitly move the speakerElt on top of hidden tutorialElt */
           if (is.nav4up) moveEltTo (speakerElt, getEltLeft(tutorialElt), getEltTop (tutorialElt)); 
           /* on IE4, the needed JavaScript properties aren't initialized, so we
              set display="none" and let dynamic reflow bury tutorialElt. */
           if (is.ie4up) tutorialElt.style.display = "none";
        }
        setEltVisibility (speakerElt, "visible");
    }
}



// Workaround for Nav3.x bug in which JavaScript files
// with <SCRIPT LANGUAGE="JavaScript1.2" SRC=...> are
// loaded, even though they should be ignored.
// Make sure this code is only executed by 4.x and later.
if (parseInt(navigator.appVersion) > 3) {


var screenWidth = screen.width


/* 640x480 is 0.8 times the size of 800x600, so scale down by 20%. */
if (screenWidth < 700) {
     fontSizeOf = setFontSizes (27, 24, 21, 18, 15, 12, 27, 22, 22, 22, 22, 22, 22, 22, 22, 22, 15, 22, 22, 10, 14, 17, sizeMultiplier, minFontSize) }

/* 12" monitor of 800x600 pixels is the size which we consider "base"; 
   all other sizes are designed to scale so that their content will fit
   within an 800x600 pixel size area.  This is the pixel size used by 12"
   laptop monitors as well as many overhead display systems. */
else if (screenWidth < 900) {
     fontSizeOf = setFontSizes (34, 31, 28, 25, 22, 19, 34, 28, 28, 28, 28, 28, 28, 28, 28, 28, 19, 28, 28, 12, 18, 21, sizeMultiplier, minFontSize) }

/* 17" monitor of 1024x768 pixels is 1.28 times larger than 12",
   so scale up by 28% to make sure HTML still fits on smaller page. */
else if (screenWidth < 1050) {
     fontSizeOf = setFontSizes (44, 41, 38, 35, 32, 29, 44, 36, 36, 36, 36, 36, 36, 36, 36, 36, 24, 36, 36, 18, 23, 27, sizeMultiplier, minFontSize) }

/* 17" monitor of 1152x864 pixels is ? times larger than 12",
   so scale up by ? to make sure HTML still fits on smaller page. */
else if (screenWidth < 1180) {
     fontSizeOf = setFontSizes (44, 41, 38, 35, 32, 29, 44, 36, 36, 36, 36, 36, 36, 36, 36, 36, 24, 36, 36, 18, 23, 27, sizeMultiplier, minFontSize) }


/* 20" monitor of 1280x1024 pixels is 1.7 times larger than 800x600,
   so scale up by 70% to make sure HTML still fits on smaller page. */
else if (screenWidth < 1300) {
     fontSizeOf = setFontSizes (58, 55, 52, 49, 46, 43, 58, 48, 48, 48, 48, 48, 48, 48, 48, 48, 32, 48, 48, 21, 31, 36, sizeMultiplier, minFontSize) }

/* 21" monitor of 1600x1200 pixels is 2.0 times larger than 800x600,
   so scale up by 100% to make sure HTML still fits on smaller page. */
else {
     fontSizeOf = setFontSizes (68, 65, 62, 59, 56, 53, 68, 56, 56, 56, 56, 56, 56, 56, 56, 56, 37, 56, 56, 24, 36, 42, sizeMultiplier, minFontSize) }


// properties which don't depend on current screen size

// global variables used to set text and background color
var presentationTextColor = "white"
var presentationBackgroundColor = "black"

if (is.nav4up) {
   document.tags.BODY.color = presentationTextColor
   document.tags.BODY.backgroundColor = presentationBackgroundColor
   document.tags.H1.fontWeight = "bold"
   // enhance readability of source code by making it bold
   document.tags.PRE.fontWeight = "bold"
   document.classes.titlepage.all.fontWeight = "bold"
   document.classes.titlepage.all.textAlign = "center"
   document.classes.footnote.all.textAlign = "right"
   // An example of defining classes to create a visual effect
   // which can be used across many slides.  All elements which have
   // CLASS="agendahilite" in their start tag will display in red
   // text on a yellow background.
   document.classes.agendahilite.all.color = "red"
   document.classes.agendahilite.all.backgroundColor = "yellow"
}
else if (is.ie4up) {
   document.styleSheets[ieTargetStyleSheetID].addRule ("BODY", "color:" + presentationTextColor);
   document.styleSheets[ieTargetStyleSheetID].addRule ("BODY", "background-color:" + presentationBackgroundColor);
   document.styleSheets[ieTargetStyleSheetID].addRule ("H1", "font-weight:bold")
   document.styleSheets[ieTargetStyleSheetID].addRule ("PRE", "font-weight:bold")
   document.styleSheets[ieTargetStyleSheetID].addRule (".titlepage", "font-weight:bold")
   document.styleSheets[ieTargetStyleSheetID].addRule (".titlepage", "text-align:center")
   document.styleSheets[ieTargetStyleSheetID].addRule (".footnote",  "text-align:right")
   document.styleSheets[ieTargetStyleSheetID].addRule (".agendahilite", "color:red")
   document.styleSheets[ieTargetStyleSheetID].addRule (".agendahilite", "background-color:yellow")
}


if (speakerNotesMode) { 
   if (is.nav4up) {
      document.contextual(document.ids.speakernotessection, document.tags.H1).textDecoration = "underline"
      document.contextual(document.ids.speakernotessection, document.tags.H1).marginTop = "1em"
      self.onload = moveSpeakerNotes;
   }
   else if (is.ie4up) {
      document.styleSheets[ieTargetStyleSheetID].addRule ("#speakernotessection H1", "text-decoration:underline");
      document.styleSheets[ieTargetStyleSheetID].addRule ("#speakernotessection H1", "margin-top:1em");
      top.frames["slide"].window.onload = moveSpeakerNotes;
   }
}


if (tutorialMode) { 
   if (is.nav4up) {
      document.ids.tutorialsection.marginRight = "40px"
      document.ids.tutorialsection.borderStyle = "solid"
      document.ids.tutorialsection.borderColor = "gray"
      document.ids.tutorialsection.borderWidths("2px")
      document.ids.tutorialsection.paddings("1em")
      self.onload = moveSpeakerNotes;
   }
   else if (is.ie4up) {
      document.styleSheets[ieTargetStyleSheetID].addRule ("#tutorialsection", "margin-right:40px");
      document.styleSheets[ieTargetStyleSheetID].addRule ("#tutorialsection", "border-style:solid");
      document.styleSheets[ieTargetStyleSheetID].addRule ("#tutorialsection", "border-color:gray");
      document.styleSheets[ieTargetStyleSheetID].addRule ("#tutorialsection", "border-width:2px");
      document.styleSheets[ieTargetStyleSheetID].addRule ("#tutorialsection", "padding:1em");
      top.frames["slide"].window.onload = moveSpeakerNotes;
   }
}




// Hack to keep backward compatibility with pages which have
// per-page style settings (setting inside a STYLE element
// in the page's HEAD) made using older version (1.0) of template.
// Set variable v1CompatibilityMode to true to use v1.0 pages
// with this version without having to update those per-page settings.

var v1CompatibilityMode = false
if (v1CompatibilityMode) {
var currentScreen = 0
var theFontSizes = new Array(1)
theFontSizes[currentScreen] = fontSizeOf
}


} // end of Nav4+ only if for style sheet code



// SLIDE PAGE CHANGE CODE (copied from basefile\navbar.js)
// to enable keyboard-triggered page changes in Nav4+

// Go to slide number slide_num.
function goto_slide(slide_num)
{       var indexURL = top.location.href; // get URL of top-level frameset doc
        var baseURL = indexURL.substring (0, indexURL.lastIndexOf("/") + 1);
	if(slide_num < 1 || slide_num > top.last_slide)
	{	alert("Please enter number between 1 and " + top.last_slide);
	}
	else 
	{	top.current_slide = Math.abs(slide_num);
		top.frames["slide"].location = baseURL + top.filename[slide_num];
                // update displayed page count in goto field
                top.frames["next"].document.forms["gotoform"].slidenum.value = top.current_slide;
	}
}

// Display previous slide in sequence.
function prev_slide()
{	if (top.current_slide == 1)
	{	alert("You are already at the first slide.\nThere is no previous slide.");
	} 
        else goto_slide(top.current_slide - 1);
}


// Display next slide in sequence.
function next_slide()
{	if (top.current_slide == top.last_slide)
	{	alert("You are already at the last slide.\nThere is no next slide.");
	} 
        else goto_slide(top.current_slide + 1);
}




// KEYBOARD CONTROL IN NAV4

// support SPACE key codes (*not* RETURN because of Goto field!)
var nextKeys = new String("nN ")
var prevKeys = new String("pP")

function handleKeys(e) {
	var keyChar;
        if (is.nav4up) keyChar = String.fromCharCode(e.which);
        else if (is.ie4up) keyChar = String.fromCharCode(window.event.keyCode);
	if (prevKeys.indexOf(keyChar) != -1)
	{  prev_slide(); return false  }
	else if(nextKeys.indexOf(keyChar) != -1)
	{  next_slide(); return false  }
	else return true;
}



// Workaround for Nav3.x bug in which JavaScript files
// with <SCRIPT LANGUAGE="JavaScript1.2" SRC=...> are
// loaded, even though they should be ignored.
// Make sure this code is only executed by 4.x and later.
if (parseInt(navigator.appVersion) > 3) {

   // support ESC key code  (*not* BS because of Goto field!)
   // BUG: *** not working in 4.04? was it ever working? hmmm ...
   prevKeys.concat(String.fromCharCode(27))
   if (is.nav4up) document.captureEvents(Event.KEYPRESS);
   document.onkeypress = handleKeys;

} // end of Nav4+ only if


// end of file


