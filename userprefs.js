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

// Load function name suggestion code (for search box)
function loadSuggestCode()
{
    searchEnabled = true;
    // Force default turnoff for buggy Mac browsers
    if (navigator.userAgent.toLowerCase().indexOf('mac') > 0) {
      searchEnabled = false;
    }
    if (myphpnet = getCookie('MYPHPNET')) {
        myphpnet_parts = myphpnet.split(",");
        if (myphpnet_parts.length > 3) {
            if (myphpnet_parts[3] == '1') {
                searchEnabled = false;
            }
            // Enable if user explicity wanted to enable it
            // Important for Mac users, who get disabled by default
            else if (myphpnet_parts[3] == '0') {
                searchEnabled = true;
            }
        }
    }
    if (searchEnabled && document.getElementsByTagName && document.createElement) {
        var elems = document.getElementsByTagName("*");
        for (var i = 0; i < elems.length; i++) {
            if (elems[i].tagName.toLowerCase() == 'head') {
                var scriptElem = document.createElement('script');
                scriptElem.setAttribute('type', 'text/javascript');
                scriptElem.setAttribute('src', '/functions.js');
                elems[i].appendChild(scriptElem);
                break;
            }
        }
    }
}
