<?
require("shared.inc");
commonHeader("Year 2000 Compliance and PHP");
?>
Like Perl, PHP is about as Year 2000 compliant as your pencil.  It is the applications
you write with PHP you need to worry about, not PHP itself.

There is an issue with the dates in cookies.  We have found that not all browsers understand
4-digit years in the cookie expiry time.  But they all accept 2-digit years.  If you do not
care about these non-compliant browsers, then feel free to edit PHP's functions/datetime.c
file.  This is the function in question:

<pre>  /* Return date string in standard format for http headers */
  char *php3_std_date(time_t t)
  {
    struct tm *tm1;
    char *str;

    tm1 = gmtime(&t);
    str = emalloc(81);
    snprintf(str, 80, "%s, %02d-%s-<b><blink>%02d</blink></b> %02d:%02d:%02d GMT",
            day_full_names[tm1->tm_wday],
            tm1->tm_mday,
            mon_short_names[tm1->tm_mon],
            ((tm1->tm_year)%100),
            tm1->tm_hour, tm1->tm_min, tm1->tm_sec);
    str[79]=0;
    return (str);
  }</pre>
<?
commonFooter();
?>
