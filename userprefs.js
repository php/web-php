// Default document onload function
function runOnLoad()
{
    searchHistory();
}

// Get a value of one cookie set by it's name
// Impmentation from the JS 1.3 Client Guide by Netscape
function getCookie(Name)
{
    var search = Name + "=";
    if (document.cookie.length > 0) {
        offset = document.cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = document.cookie.indexOf(";", offset);
            if (end == -1) { end = document.cookie.length; }
            return unescape(document.cookie.substring(offset, end));
        }
    }
    return null;
}

// Make events in the user's country bold
function boldEvents()
{
    // Get cookie if possible
    country = getCookie("COUNTRY");
    if (typeof(country) == "string") {
        
        // Get country code from cookie
        country = country.substring(0, 3);
        
        // If DOM is supported, get <span>s
        if (document.getElementsByTagName) {
            
            spans = document.getElementsByTagName("span");
            
            // Style every span bold which is for this country
            for (var i = 0; i < spans.length; i++) {
                if (spans[i].className == "event_" + country) {
                    spans[i].style.fontWeight = "bold";
                }
            }
        }
    }
}

// Restore the last search as stored in a cookie
function searchHistory()
{
    // Something is already typed in, do not try to overwrite it
    if (document.forms["topsearch"].pattern.value.length > 0) {
        return;
    }

    // Try to get the lastsearch cookie
    lastSearch = getCookie("LAST_SEARCH");
    if (typeof(lastSearch) == "string") {
        
        // Get pattern and show information from cookie
        option  = lastSearch.substr(0, lastSearch.indexOf(","));
        pattern = lastSearch.substr(lastSearch.indexOf(",") + 1);
        
        // Set pattern in form
        document.forms["topsearch"].pattern.value = pattern;
        
        // Set the last selected search method in the dropdown
        with (document.forms["topsearch"]) {
            for (var i = 0; i < show.length; i++) {
                if (show[i].value == option) {
                    show[i].selected = true;
                    break;
                }
            }
        }
    }
}
