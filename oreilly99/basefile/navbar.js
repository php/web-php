// navbar.js
// (Global variables are declared in slide.js.)
// Display previous/next slide in sequence, or goto other slide.

// 22 May 98: rewrite to calculate base index.htm directory URL and add filename;
//            this eliminated need for caller_in_base_directory argument *and*
//            finally eliminated the occasional slide "Not found" error message! 
// 20 May 98: add Help window code
// 10 April 98: IE4 compatibility added.

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
     
    // --- New properties added to original Client Sniffer code. ---
    this.nav4up = this.nav && (this.major >= 4)
    this.ie4up  = this.ie  && (this.major >= 4)
}

var is = new Is()

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




// Code to open separate, small "Help" window.
function openHelp()
{   var presoWin;
    var winOptions = "location=yes,menubar=yes,resizable=yes,status=yes,titlebar=yes,toolbar=no,scrollbars=yes,width=500,height=450";
    presoWin = window.open("help.htm", "help", winOptions);
    presoWin.focus();
    return false;
}
