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
/* parameter name is the name of the file, without the .php3 extension. */

function AddSlide(name)
{
	last_slide++;
	if(name == null) name = last_slide-slides_inserted+slides_deleted;
	else {
		slides_inserted++;
	}
	filename[last_slide] = name + ".php3";
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
var tutorialMode = false


// Keep these first three slides (Logopage, Title, S_agenda)
// in your presentation so we have a standard look and feel.
// (Edit the contents of the Title and S_agenda slide.)

if (!online) { AddSlide("logopage"); }

// Add *either* the tutorial title page or the presentation
// title page, depending on whether we're running in tutorialMode.
if (tutorialMode) { AddSlide("titletut") }
else AddSlide("title");	// title slide

// if (tutorialMode || online ) { AddSlide("howto"); }
// if (tutorialMode) { AddSlide("howtotu2"); }
// else if (online) { AddSlide("howto2"); }

AddSlide("s_agenda");
AddSlide("s_chars");
AddSlide("s_numbers");
AddSlide("s_history");
AddSlide("s_embed");
AddSlide("s_server");
AddSlide("s_lang");
AddSlide("s_lang2");
AddSlide("s_lang3");
AddSlide("s_lang4");
AddSlide("s_lang5");
AddSlide("s_lang6");
AddSlide("s_lang7");
AddSlide("s_lang8");
AddSlide("s_cases");
AddSlide("s_agenda2");
AddSlide("s_langintro");
AddSlide("s_builtins");
AddSlide("s_datetime");
AddSlide("s_string");
AddSlide("s_regex");
AddSlide("s_url");
AddSlide("s_encode");
AddSlide("s_filehandling");
AddSlide("s_filehandling2");
AddSlide("s_image");
AddSlide("s_advlang");
AddSlide("s_function");
AddSlide("s_varscope");
AddSlide("s_varvar");
AddSlide("s_objinherit");
AddSlide("s_sql");
AddSlide("s_sqlexample");
AddSlide("s_other");
AddSlide("s_config");
AddSlide("s_limits");
AddSlide("s_fileconfig");
AddSlide("s_gpc");
AddSlide("s_apache");
AddSlide("s_ext");
AddSlide("s_mem");
AddSlide("s_api1");
AddSlide("s_api2");
AddSlide("s_api3");
AddSlide("s_api4");
AddSlide("s_api5");
AddSlide("s_api6");
AddSlide("s_api7");
AddSlide("s_api8");
AddSlide("s_api9");
AddSlide("s_future2");

// Keep this last slide (logopage) in your presentation 
// so every presentation ends with the logo.

AddSlide("logopage");	// 
