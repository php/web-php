// If your presentation is longer than 200 slides,
// you could change the array size below.
filename = new Array(200);

first_slide = 0;
last_slide = 0;
current_slide = 1;
slides_inserted = 0;
slides_deleted = 0;
show_slide_filename = 0;


/* function AddSlide adds a slide to the presentation at the end.      */
/*                                                                     */
/* parameter name is the name of the file, without the .htm extension. */

function AddSlide(name)
{
	last_slide++;
	if(name == null) name = last_slide-slides_inserted+slides_deleted;
	else {
		slides_inserted++;
	}
	filename[last_slide] = name + ".htm";
}


// DON'T EDIT ANY OF THE TEXT ABOVE THIS LINE!!!
// It's source code you don't need to touch and should not touch.
//
// To add, delete, and reorder slides, 
// just add, delete, and reorder the AddSlide("FILENAME")
// entries below.  Each name in double quotes is the name
// of an HTML file in this presentation directory.
//
// If you want to include an HTML file which is in a subdirectory,
// separate the subdirectory name and the HTML file name with a
// forward slash like this: AddSlide("DIRECTORYNAME/FILENAME")
// (This works fine across platforms, even on Windows.) 
//
// Within the quotes, don't include an extension like .htm or .html.
// This application automatically adds .htm to the name when it
// looks in the directory for the file.  In the directory, the
// HTML file *must* have the three letter extension .htm.


// Means the preso is being set for placement on the web
// to be viewed directly (with no human speaker) by the end user.
var online = true


// Running online as Visual Tutorial with explanatory text.
var tutorialMode = true


// Keep these first three slides (Logopage, Title, S_agenda)
// in your presentation so we have a standard look and feel.
// (Edit the contents of the Title and S_agenda slide.)

if (!online) { AddSlide("logopage"); }

// Add *either* the tutorial title page or the presentation
// title page, depending on whether we're running in tutorialMode.
if (tutorialMode) { AddSlide("titletut") }
else AddSlide("title");	// title slide

if (tutorialMode || online ) { AddSlide("howto"); }
if (tutorialMode) { AddSlide("howtotu2"); }
else if (online) { AddSlide("howto2"); }

AddSlide("s_agenda");   // agenda slide

// sample slides -- cut these out when you make your own presentation!!!

AddSlide("s_agend1");   // agenda slide

AddSlide("s_about1");   // about the presentation template

AddSlide("s_agend2");   // agenda slide

AddSlide("s_bullet");   // basic bulletpoint slide
AddSlide("s_2col");     // 2 column bulletpoint slide
AddSlide("s_table");    // slide with table
AddSlide("s_links");    // slide with links
AddSlide("s_tagsyn");   // slide with tag syntax
AddSlide("s_props");    // slide with property table
AddSlide("s_method");   // slide with method table
AddSlide("s_demo");     // slide with demo link
AddSlide("s_markup");   // slide showing HTML and style sheet markup
AddSlide("s_code");     // slide with source code
AddSlide("s_color");    // slide with text and background color set


// Keep this last slide (logopage) in your presentation 
// so every presentation ends with the logo.

AddSlide("logopage");	// 






