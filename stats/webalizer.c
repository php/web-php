/*
    webalizer - a web server log analysis program

    Copyright (C) 1997, 1998  Bradford L. Barrett (brad@mrunix.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version, and provided that the above
    copyright and permission notice is included with all distributed
    copies of this or derived software.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA

    This software uses the gd graphics library, which is copyright by
    Quest Protien Database Center, Cold Spring Harbor Labs. The following
    applies only to the gd graphics library software (the most up to date
    license information will be included with the gd distribution, or you
    may find additional information at http://www.boutell.com/gd/):

    gd 1.2 is copyright 1994, 1995, Quest Protein Database Center,
    Cold Spring Harbor Labs. Permission granted to copy and distribute
    this work provided that this notice remains intact. Credit
    for the library must be given to the Quest Protein Database Center,
    Cold Spring Harbor Labs, in all derived works. This does not
    affect your ownership of the derived work itself, and the intent
    is to assure proper credit for Quest, not to interfere with your
    use of gd. If you have questions, ask. ("Derived works"
    includes all programs that utilize the library. Credit must
    be given in user-visible documentation.) 

    gd 1.2 was written by Thomas Boutell and is currently
    distributed by boutell.com, Inc.

    If you wish to release modifications to gd,
    please clear them first by sending email to 
    boutell@boutell.com; if this is not done, any modified version of the gd 
    library must be clearly labeled as such.

    The Quest Protein Database Center is funded under Grant P41-RR02188 by
    the National Institutes of Health.

    Written by Thomas Boutell  2/94 - 8/95. 
    (http://sunsite.unc.edu/boutell/index.html)

    The GIF compression code is based on that found in the pbmplus 
    utilities, which in turn is based on GIFENCOD by David Rowley. See the 
    notice below:

    ** Based on GIFENCOD by David Rowley <mgardi@watdscu.waterloo.edu>.A
    ** Lempel-Zim compression based on "compress".
    **
    ** Modified by Marcel Wijkstra <wijkstra@fwi.uva.nl>
    **
    ** Copyright (C) 1989 by Jef Poskanzer.
    **
    ** Permission to use, copy, modify, and distribute this software and its
    ** documentation for any purpose and without fee is hereby granted, provided
    ** that the above copyright notice appear in all copies and that both the
    ** copyright notice and this permission notice appear in supporting
    ** documentation.  This software is provided "as is" without express or
    ** implied warranty.
    **
    ** The Graphics Interchange Format(c) is the Copyright property of
    ** CompuServe Incorporated.  GIF(sm) is a Service Mark property of
    ** CompuServe Incorporated.

    The GIF decompression is based on that found in the pbmplus 
    utilities, which in turn is based on GIFDECOD by David Koblas. See the 
    notice below:

    +-------------------------------------------------------------------+
    | Copyright 1990, 1991, 1993, David Koblas.  (koblas@netcom.com)    |
    |   Permission to use, copy, modify, and distribute this software   |
    |   and its documentation for any purpose and without fee is hereby |
    |   granted, provided that the above copyright notice appear in all |
    |   copies and that both that copyright notice and this permission  |
    |   notice appear in supporting documentation.  This software is    |
    |   provided "as is" without express or implied warranty.           |
    +-------------------------------------------------------------------+
*/

/*********************************************/
/* STANDARD INCLUDES                         */
/*********************************************/

#include <time.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>                           /* normal stuff             */
#include <ctype.h>
#include <sys/utsname.h>
#include <sys/times.h>

#include "webalizer.h"                        /* main header              */
#include "graphs.h"                           /* graphs header            */
#include "ctry.h"                             /* ctry codes               */
#include "webalizer_lang.h"                   /* lang. support            */

/*********************************************/
/* GLOBAL VARIABLES                          */
/*********************************************/

char    *version     = "1.20";                /* program version          */
char    *editlvl     = "07";                  /* edit level               */
char    *moddate     = "23-Jul-1998";         /* modification date        */
char    *copyright   = "Copyright 1997, 1998 by Bradford L. Barrett";

FILE    *log_fp, *out_fp;                     /* global file pointers     */

char    buffer[BUFSIZE];                      /* log file record buffer   */
char    tmp_buf[BUFSIZE];                     /* used to temp save above  */

int     verbose      = 2;                     /* 2=verbose,1=err, 0=none  */ 
int     debug_mode   = 0;                     /* debug mode flag          */
int     time_me      = 0;                     /* timing display flag      */
int     local_time   = 1;                     /* 1=localtime 0=GMT (UTC)  */
int     ignore_hist  = 0;                     /* history flag (1=skip)    */
int     hourly_graph = 1;                     /* hourly graph display     */
int     hourly_stats = 1;                     /* hourly stats table       */
int	shade_groups = 1;                     /* Group shading 0=no 1=yes */
int	hlite_groups = 1;                     /* Group hlite 0=no 1=yes   */
int     mangle_agent = 0;                     /* mangle user agents       */
int	incremental  = 0;                     /* incremental mode 1=yes   */
char    *hname       = NULL;                  /* hostname for reports     */
char	*state_fname = "webalizer.current";   /* run state file name      */
char    *hist_fname  = "webalizer.hist";      /* name of history file     */
char    *conf_fname  = NULL;                  /* name of config file      */
char    *log_fname   = NULL;                  /* log file pointer         */
char    *out_dir     = NULL;                  /* output directory         */
char    *blank_str   = "";                    /* blank string             */
char    *file_ext    = "html";                /* default file extension   */

int     ntop_sites   = 30;                    /* top n sites to display   */
int     ntop_urls    = 30;                    /* top n url's to display   */
int     ntop_refs    = 30;                    /* top n referrers ""       */
int     ntop_agents  = 15;                    /* top n user agents ""     */
int     ntop_ctrys   = 50;                    /* top n countries   ""     */

int     hist_month[12], hist_year[12];        /* arrays for monthly total */
u_long  hist_hit[12];                         /* calculations: used to    */
u_long  hist_files[12];                       /* produce index.html       */
u_long  hist_site[12];                        /* these are read and saved */
double	hist_xfer[12];                        /* in the history file      */

int     hist_fday[12], hist_lday[12];         /* first/last day arrays    */

int     cur_year=0, cur_month=0,              /* year/month/day/hour      */
        cur_day=0, cur_hour=0,                /* tracking variables       */
        cur_min=0, cur_sec=0;

char    cur_tstamp[16]="00000000000000";      /* current timestamp value  */
int	check_dup=0;                          /* check for dup flag       */

double	t_xfer=0.0;                           /* monthly total xfer value */
u_long  t_hit=0,t_file=0,t_site=0,            /* monthly total vars       */
        t_url=0,t_ref=0,t_agent=0;

u_long  tm_hit[31], tm_file[31],              /* daily total arrays       */
        tm_xfer[31], tm_site[31];

u_long  dt_site;                              /* daily 'sites' total      */

u_long  ht_hit=0, mh_hit=0;                   /* hourly hits totals       */

u_long  th_hit[24], th_file[24], th_xfer[24]; /* hourly total arrays      */

int     f_day,l_day;                          /* first/last day vars      */

struct  utsname system_info;                  /* system info structure    */

u_long  ul_bogus =0;                          /* Dummy counter for groups */

struct  log_struct log_rec;                   /* expanded log storage     */

time_t	now;                                  /* used by cur_time funct   */
struct  tm *tp;                               /* to generate timestamp    */
char    timestamp[32];                        /* for the reports          */

HNODEPTR sm_htab[MAXHASH], sd_htab[MAXHASH];  /* hash tables              */
UNODEPTR um_htab[MAXHASH];                    /* for hits, sites,         */
RNODEPTR rm_htab[MAXHASH];                    /* referrers and agents...  */
ANODEPTR am_htab[MAXHASH];

HNODEPTR *top_sites    = NULL;                /* "top" lists              */
CLISTPTR *top_ctrys    = NULL;
UNODEPTR *top_urls     = NULL;
RNODEPTR *top_refs     = NULL;
ANODEPTR *top_agents   = NULL;

/* Linkded list pointers */
NLISTPTR group_sites   = NULL;                /* "group" lists            */
NLISTPTR group_urls    = NULL;
NLISTPTR group_refs    = NULL;
NLISTPTR group_agents  = NULL;
NLISTPTR hidden_sites  = NULL;                /* "hidden" lists           */
NLISTPTR hidden_urls   = NULL;
NLISTPTR hidden_refs   = NULL;
NLISTPTR hidden_agents = NULL;
NLISTPTR ignored_sites = NULL;                /* "Ignored" lists          */
NLISTPTR ignored_urls  = NULL;
NLISTPTR ignored_refs  = NULL;
NLISTPTR ignored_agents= NULL;
NLISTPTR index_alias   = NULL;                /* index. aliases           */
NLISTPTR html_pre      = NULL;                /* before anything code     */
NLISTPTR html_head     = NULL;                /* code in the header       */
NLISTPTR html_body     = NULL;                /* code at the start of the body  */
NLISTPTR html_post     = NULL;                /* middle HTML code         */
NLISTPTR html_tail     = NULL;                /* tail code                */
NLISTPTR html_end      = NULL;                /* after everything         */

/*********************************************/
/* MAIN - start here                         */
/*********************************************/

int main(int argc, char *argv[])
{
   int      i;                           /* generic counter             */
   char     *cp1, *cp2, *cp3;            /* generic char pointers       */
   NLISTPTR lptr;                        /* generic list pointer        */
   char     cmp_time[16];                /* temporary buffer            */

   extern char *optarg;                  /* used for command line       */
   extern int optind;                    /* parsing routine 'getopt'    */
   extern int opterr;

   time_t start_time, end_time;          /* program timers              */
   struct tms     mytms;                 /* bogus tms structure         */

   int    rec_year,rec_month=1,rec_day,rec_hour,rec_min,rec_sec;

   int    good_rec    =0;                /* 1 if we had a good record   */
   u_long total_rec   =0;                /* Total Records Processed     */
   u_long total_ignore=0;                /* Total Records Ignored       */
   u_long total_bad   =0;                /* Total Bad Records           */

   /* month names used for parsing logfile (shouldn't be lang specific) */
   char *log_month[12]={ "Jan", "Feb", "Mar",
                         "Apr", "May", "Jun",
                         "Jul", "Aug", "Sep",
                         "Oct", "Nov", "Dec"};

   /* add default index. alias */
   add_nlist("index.",&index_alias);

   /* check for default config file */
   if (!access("webalizer.conf",F_OK))
      get_config("webalizer.conf");
   else if (!access("/etc/webalizer.conf",F_OK))
      get_config("/etc/webalizer.conf");

   /* get command line options */
   opterr = 0;     /* disable parser errors */
   while ((i=getopt(argc,argv,"c:dhigpqQvVGHTa:n:o:r:s:t:u:A:C:I:M:R:S:U:x:"))!=EOF)
   {
      switch (i)
      {
        case 'd': debug_mode=1;              break;  /* Debug               */
        case 'h': print_opts(argv[0]);       break;  /* help                */
        case 'g': local_time=0;              break;  /* GMT (UTC) time      */
        case 'i': ignore_hist=1;             break;  /* Ignore history      */
        case 'p': incremental=1;             break;  /* Incremental run     */
        case 'q': verbose=1;                 break;  /* Quiet (verbose=1)   */
        case 'Q': verbose=0;                 break;  /* Really Quiet        */
        case 'V':
        case 'v': print_version();           break;  /* Version             */
        case 'G': hourly_graph=0;            break;  /* no hourly graph     */
        case 'H': hourly_stats=0;            break;  /* no hourly stats     */
        case 'M': mangle_agent=atoi(optarg); break;  /* mangle user agents  */
        case 'T': time_me=1;                 break;  /* TimeMe              */
        case 'a': add_nlist(optarg,&hidden_agents); break; /* Hide agents   */
        case 'c': get_config(optarg);        break;  /* Config file         */
        case 'n': hname=optarg;              break;  /* Hostname            */
        case 'o': out_dir=optarg;            break;  /* Output directory    */
        case 'r': add_nlist(optarg,&hidden_refs);   break; /* Hide referrer */
        case 's': add_nlist(optarg,&hidden_sites);  break; /* Hide site     */
        case 't': msg_title=optarg;          break;  /* Report title        */
        case 'u': add_nlist(optarg,&hidden_urls);   break; /* hide URL      */
        case 'A': ntop_agents=atoi(optarg);  break;  /* Top agents          */
        case 'C': ntop_ctrys=atoi(optarg);   break;  /* Top countries       */
        case 'I': add_nlist(optarg,&index_alias); break; /* Index alias     */
        case 'R': ntop_refs=atoi(optarg);    break;  /* Top referrers       */
        case 'S': ntop_sites=atoi(optarg);   break;  /* Top sites           */
        case 'U': ntop_urls=atoi(optarg);    break;  /* Top urls            */
        case 'x': file_ext=optarg;           break;  /* File extension      */
      }
   }

   if (argc - optind != 0) log_fname = argv[optind];

   /* setup our internal variables */
   init_counters();
   for (i=0;i<MAXHASH;i++)
   {
      sm_htab[i]=sd_htab[i]=NULL;        /* clear out hash tables           */
      um_htab[i]=NULL;
      rm_htab[i]=NULL;
      am_htab[i]=NULL;
   }

   /* Be polite and announce yourself... */
   if (verbose>1)
   {
      uname(&system_info);
      printf("Webalizer V%s-%s (%s %s) %s\n",
              version,editlvl,system_info.sysname,
              system_info.release,language);
   }

   /* open log file */
   if (log_fname)
   {
      log_fp = fopen(log_fname,"r");
      if (!log_fp)
      {
         /* Error: Can't open log file ... */
         fprintf(stderr, "%s %s\n",msg_log_err,log_fname);
         exit(1);
      }
   }

   /* Using logfile ... */
   if (verbose>1) printf("%s %s\n",msg_log_use,log_fname?log_fname:"STDIN");

   /* switch directories if needed */
   if (out_dir)
   {
      if (chdir(out_dir) != 0)
      {
         /* Error: Can't change directory to ... */
         fprintf(stderr, "%s %s\n",msg_dir_err,out_dir);
         exit(1);
      }
   }

   /* Creating output in ... */
   if (verbose>1)
      printf("%s %s\n",msg_dir_use,out_dir?out_dir:msg_cur_dir);

   /* prep hostname */
   if (!hname)
      if (uname(&system_info)) hname="localhost";
      else hname=system_info.nodename;
   /* Hostname for reports is ... */
   if (verbose>1) printf("%s '%s'\n",msg_hostname,hname);

   /* get past history */
   if (ignore_hist) {if (verbose>1) printf("%s\n",msg_ign_hist); }
   else get_history();

   /* incremental processing */
   if (incremental) restore_state();

   /* Allocate memory for our TOP arrays */
   if (ntop_sites  != 0) /* top sites */
   { if ( (top_sites=calloc(ntop_sites,sizeof(HNODEPTR))) == NULL)
    /* Can't get memory, Top Sites disabled! */
    {fprintf(stderr,"%s\n",msg_nomem_ts); ntop_sites=0;}}

   if (ntop_ctrys  != 0) /* top countries */
   { if ( (top_ctrys=calloc(ntop_ctrys,sizeof(CLISTPTR))) == NULL)
    /* Can't get memory, Top Countries disabled! */
    {fprintf(stderr,"%s\n",msg_nomem_tc); ntop_ctrys=0;}}

   if (ntop_urls  != 0) /* top urls */
   {if ( (top_urls=calloc(ntop_urls,sizeof(UNODEPTR))) == NULL)
    /* Can't get memory, Top URLs disabled! */
    {fprintf(stderr,"%s\n",msg_nomem_tu); ntop_urls=0;}}

   if (ntop_refs  != 0) /* top referrers */
   { if ( (top_refs=calloc(ntop_refs,sizeof(RNODEPTR))) == NULL)
    /* Can't get memory, Top Referrers disabled! */
    {fprintf(stderr,"%s\n",msg_nomem_tr); ntop_refs=0;}}

   if (ntop_agents  != 0) /* top user agents */
   {if ( (top_agents=calloc(ntop_agents,sizeof(ANODEPTR))) == NULL)
    /* Can't get memory, Top User Agents disabled! */
    {fprintf(stderr,"%s\n",msg_nomem_ta); ntop_agents=0;}}

   start_time = times(&mytms);

   /*********************************************/
   /* MAIN PROCESS LOOP - read through log file */
   /*********************************************/

   while ((fgets(buffer, BUFSIZE, log_fname?log_fp:stdin)) != NULL)
   {
      total_rec++;
      if (strlen(buffer) == (BUFSIZE-1))
      {
         if (verbose)
         {
            fprintf(stderr,"%s",msg_big_rec);
            if (debug_mode) fprintf(stderr,":\n%s",buffer);
            else fprintf(stderr,"\n");
         }

         total_bad++;                     /* bump bad record counter      */

         /* get the rest of the record */
         while ( (fgets(buffer,BUFSIZE,log_fname?log_fp:stdin)) != NULL)
         {
            if (strlen(buffer) < BUFSIZE-1)
            {
               if (debug_mode && verbose) fprintf(stderr,"%s\n",buffer);
               break;
            }
            if (debug_mode && verbose) fprintf(stderr,"%s",buffer);
         }
         continue;                        /* go get next record if any    */
      }

      /* got a record... */
      strcpy(tmp_buf, buffer);            /* save buffer in case of error */
      if (parse_record())                 /* parse the record             */
      {
         /*********************************************/
         /* GOOD RECORD                               */
         /*********************************************/

         good_rec = 1;                    /* got a good one, process it.. */

         /*********************************************/
         /* DO ADDITIONAL PROCESSING ON LOG FIELDS    */
         /*********************************************/

         /* get yesr/month/day/hour/min/sec values    */
         for (i=0;i<12;i++)
         {
            if (strncmp(log_month[i],&log_rec.datetime[4],3)==0)
               { rec_month = i+1; break; }
         }

         rec_year=atoi(&log_rec.datetime[8]);    /* get year number (int)   */
         rec_day =atoi(&log_rec.datetime[1]);    /* get day number          */
         rec_hour=atoi(&log_rec.datetime[13]);   /* get hour number         */
         rec_min =atoi(&log_rec.datetime[16]);   /* get minute number       */
         rec_sec =atoi(&log_rec.datetime[19]);   /* get second number       */

         /* Kludge for Netscape server time (0-24?) error                   */
         if (rec_hour>23) rec_hour=0;

         /* minimal sanity check */
         if ((i>=12)||(rec_min>59)||(rec_sec>59))
         {
            total_bad++;                /* if a bad date, bump counter      */
            if (verbose)
            {
               fprintf(stderr,"%s",msg_bad_date);
               if (debug_mode) fprintf(stderr,":\n%s\n",tmp_buf);
               else fprintf(stderr,"\n");
            }
            continue;                   /* and ignore this record           */
         }

         /* Do we need to check for duplicate records? (incremental mode)   */
         if (check_dup)
         {
            /* get current records timestamp */
            sprintf(cmp_time,"%04d%02d%02d%02d%02d%02d",
             rec_year, rec_month, rec_day, rec_hour, rec_min, rec_sec);

            /* check if less than/equal to last record processed            */
            if ( strcmp(cmp_time, cur_tstamp) <= 0 )
            {
               /* if it is, assume we have already processed and ignore it  */
               total_ignore++;
               continue;
            }
            else
            {
               /* if it isn't.. disable any more checks this run            */
               check_dup=0;
               /* now check if it's a new month                             */
               if (cur_month != rec_month)
               {
                  /* new month... ignore previous and clear everything      */
                  clear_month();
                  cur_sec   = rec_sec;          /* set current counters     */
                  cur_min   = rec_min;
                  cur_hour  = rec_hour;
                  cur_day   = rec_day;
                  cur_month = rec_month;
                  cur_year  = rec_year;
                  f_day=l_day=rec_day;          /* reset first and last day */
               }
            }
         }

         /* fix URL field */
         cp1 = cp2 = log_rec.url;
         /* handle null '-' case here... */
         if (*++cp1 == '-') { *cp2++ = '-'; *cp2 = '\0'; }
         else
         {
            /* strip actual URL out of request */
            while  ( (*cp1 != ' ') && (*cp1 != '\0') ) cp1++;
            if (*cp1 != '\0')
            {
               /* scan to begin of actual URL field */
               while ((*cp1 == ' ') && (*cp1 != '\0')) cp1++;
               /* remove duplicate / if needed */
               if (( *cp1=='/') && (*(cp1+1)=='/')) cp1++;
               while ((*cp1 != ' ')&&(*cp1 != '"')&&(*cp1 != '\0'))
                  *cp2++ = *cp1++;
               *cp2 = '\0';
            }
         }

         /* un-escape URL */
         unescape(log_rec.url);

         /* strip query portion of cgi scripts */
         cp1 = log_rec.url;
         while (*++cp1 != '\0') if (*cp1=='?') { *cp1 = '\0'; break; }

         /* strip off index.html (or any aliases) */
         lptr=index_alias;
         while (lptr!=NULL)
         {
            if ((cp1=strstr(log_rec.url,lptr->string))!=NULL)
            {
               if ((cp1==log_rec.url)||(*(cp1-1)=='/'))
               {
                  *cp1='\0';
                  if (log_rec.url[0]=='\0')
                   { log_rec.url[0]='/'; log_rec.url[1]='\0'; }
                  break;
               }
            }
            lptr=lptr->next;
         }

         /* fix referrer field */
         cp1 = log_rec.refer;
         cp3 = cp2 = cp1++;
         if ( (*cp2 != '\0') && (*cp2 == '"') )
         {
            while ( *cp1 != '\0' ) { cp3 = cp2; *cp2++ = *cp1++; }
            *cp3 = '\0';
         }

         /* unescape referrer */
         unescape(log_rec.refer);

         /* strip query portion of cgi referrals */
         cp1 = log_rec.refer;
         if (*cp1 != '\0')
            while (*++cp1 != '\0')
             if ((*cp1=='?')||(*cp1=='+')) *cp1 = '\0';

         /* if HTTP request, lowercase http://sitename/ portion */
         cp1 = log_rec.refer;
         if ( (*cp1=='h') || (*cp1=='H'))
         {
            while ( (*cp1!='/') && (*cp1!='\0'))
            {
               if ( (*cp1>='A') && (*cp1<='Z')) *cp1 += 'a'-'A';
               cp1++;
            }
            /* now do hostname */
            if ( (*cp1=='/') && ( *(cp1+1)=='/')) {cp1++; cp1++;}
            while ( (*cp1!='/') && (*cp1!='\0'))
            {
               if ( (*cp1>='A') && (*cp1<='Z')) *cp1 += 'a'-'A';
               cp1++;
            }
         }

         /* if necessary, shrink referrer to fit storage */
         if (strlen(log_rec.refer)>=MAXREFH) log_rec.url[MAXREFH-1]='\0';

         /* fix user agent field */
         cp1 = log_rec.agent;
         cp3 = cp2 = cp1++;
         if ( (*cp2 != '\0') && ((*cp2 == '"')||(*cp2 == '(')) )
         {
            while (*cp1 |= '\0') { cp3 = cp2; *cp2++ = *cp1++; }
            *cp3 = '\0';
         }

         /********************************************/
         /* PROCESS RECORD                           */
         /********************************************/

         /* first time through? */
         if (cur_month == 0)
         {
             /* if yes, init our date vars */
             cur_month=rec_month; cur_year=rec_year;
             cur_day=rec_day; cur_hour=rec_hour;
             cur_min=rec_min; cur_sec=rec_sec;
             f_day=rec_day;
         }

         /* adjust last day processed if different */
         if (rec_day > l_day) l_day = rec_day;
 
         /* update min/sec stuff */
         if (cur_sec != rec_sec) cur_sec = rec_sec;
         if (cur_min != rec_min) cur_min = rec_min;

         /* check for hour change  */
         if (cur_hour != rec_hour)
         {
            /* if yes, init hourly stuff */
            if (ht_hit > mh_hit) mh_hit = ht_hit;
            ht_hit = 0;
            cur_hour = rec_hour;
         }

         /* check for day change   */
         if (cur_day != rec_day)
         {
            /* if yes, init daily stuff */
            tm_site[cur_day-1]=dt_site; dt_site=0;
            del_hlist(sd_htab);
            cur_day = rec_day;
         }

         /* check for month change */
         if (cur_month != rec_month)
         {
            /* if yes, do monthly stuff */
            write_month_html();               /* generate HTML for month */
            clear_month();
            cur_month = rec_month;            /* update our flags        */
            cur_year  = rec_year;
            f_day=l_day=rec_day;
         }

         /* Check if we should ignore */
         if (isinlist(ignored_sites,log_rec.hostname)!=NULL)
            { total_ignore++; continue; }
         if (isinlist(ignored_urls,log_rec.url)!=NULL)
            { total_ignore++; continue; }
         if (isinlist(ignored_agents,log_rec.agent)!=NULL)
            { total_ignore++; continue; }
         if (isinlist(ignored_refs,log_rec.refer)!=NULL)
            { total_ignore++; continue; }

         /* Bump response code totals */
         switch (log_rec.resp_code) {
          case RC_CONTINUE:         i=IDX_CONTINUE;         break;
          case RC_SWITCHPROTO:      i=IDX_SWITCHPROTO;      break;
          case RC_OK:               i=IDX_OK;               break;
          case RC_CREATED:          i=IDX_CREATED;          break;
          case RC_ACCEPTED:         i=IDX_ACCEPTED;         break;
          case RC_NONAUTHINFO:      i=IDX_NONAUTHINFO;      break;
          case RC_NOCONTENT:        i=IDX_NOCONTENT;        break;
          case RC_RESETCONTENT:     i=IDX_RESETCONTENT;     break;
          case RC_PARTIALCONTENT:   i=IDX_PARTIALCONTENT;   break;
          case RC_MULTIPLECHOICES:  i=IDX_MULTIPLECHOICES;  break;
          case RC_MOVEDPERM:        i=IDX_MOVEDPERM;        break;
          case RC_MOVEDTEMP:        i=IDX_MOVEDTEMP;        break;
          case RC_SEEOTHER:         i=IDX_SEEOTHER;         break;
          case RC_NOMOD:            i=IDX_NOMOD;            break;
          case RC_USEPROXY:         i=IDX_USEPROXY;         break;
          case RC_BAD:              i=IDX_BAD;              break;
          case RC_UNAUTH:           i=IDX_UNAUTH;           break;
          case RC_PAYMENTREQ:       i=IDX_PAYMENTREQ;       break;
          case RC_FORBIDDEN:        i=IDX_FORBIDDEN;        break;
          case RC_NOTFOUND:         i=IDX_NOTFOUND;         break;
          case RC_METHODNOTALLOWED: i=IDX_METHODNOTALLOWED; break;
          case RC_NOTACCEPTABLE:    i=IDX_NOTACCEPTABLE;    break;
          case RC_PROXYAUTHREQ:     i=IDX_PROXYAUTHREQ;     break;
          case RC_TIMEOUT:          i=IDX_TIMEOUT;          break;
          case RC_CONFLICT:         i=IDX_CONFLICT;         break;
          case RC_GONE:             i=IDX_GONE;             break;
          case RC_LENGTHREQ:        i=IDX_LENGTHREQ;        break;
          case RC_PREFAILED:        i=IDX_PREFAILED;        break;
          case RC_REQENTTOOLARGE:   i=IDX_REQENTTOOLARGE;   break;
          case RC_REQURITOOLARGE:   i=IDX_REQURITOOLARGE;   break;
          case RC_UNSUPMEDIATYPE:   i=IDX_UNSUPMEDIATYPE;   break;
          case RC_SERVERERR:        i=IDX_SERVERERR;        break;
          case RC_NOTIMPLEMENTED:   i=IDX_NOTIMPLEMENTED;   break;
          case RC_BADGATEWAY:       i=IDX_BADGATEWAY;       break;
          case RC_UNAVAIL:          i=IDX_UNAVAIL;          break;
          case RC_GATEWAYTIMEOUT:   i=IDX_GATEWAYTIMEOUT;   break;
          case RC_BADHTTPVER:       i=IDX_BADHTTPVER;       break;
          default:                  i=IDX_UNDEFINED;        break;
         }
         response[i].count++;

         /* now save in the various hash tables... */
         if (log_rec.resp_code==RC_OK)
            i=1; else i=0;
         
         /* hostname (site) hash table - daily */
         if (put_hnode(log_rec.hostname,OBJ_REG,
             1,(u_long)i,log_rec.xfer_size,&dt_site,sd_htab))
         {
            if (verbose)
            /* Error adding host node (daily), skipping .... */
            fprintf(stderr,"%s %s\n",msg_nomem_dh, log_rec.hostname);
         }

         /* hostname (site) hash table - monthly */
         if (put_hnode(log_rec.hostname,OBJ_REG,
             1,(u_long)i,log_rec.xfer_size,&t_site,sm_htab))
         {
            if (verbose)
            /* Error adding host node (monthly), skipping .... */
            fprintf(stderr,"%s %s\n", msg_nomem_mh, log_rec.hostname);
         }

         /* URL hash table */
         if ((log_rec.resp_code==RC_OK)||(log_rec.resp_code==RC_NOMOD))
            if (put_unode(log_rec.url,OBJ_REG,(u_long)1,
                log_rec.xfer_size,&t_url,um_htab))
            {
               if (verbose)
               /* Error adding URL node, skipping ... */
               fprintf(stderr,"%s %s\n", msg_nomem_u, log_rec.url);
            }

         /* referrer hash table */
         if (ntop_refs)
         {
            if (log_rec.refer[0]!='\0')
             if (put_rnode(log_rec.refer,OBJ_REG,(u_long)1,&t_ref,rm_htab))
             {
              if (verbose)
              fprintf(stderr,"%s %s\n", msg_nomem_r, log_rec.refer);
             }
         }

         /* user agent hash table */
         if (ntop_agents)
         {
            if (log_rec.agent[0]!='\0')
             if (put_anode(log_rec.agent,OBJ_REG,(u_long)1,&t_agent,am_htab))
             {
              if (verbose)
              fprintf(stderr,"%s %s\n", msg_nomem_a, log_rec.agent);
             }
         }

         /* bump monthly/daily/hourly totals        */
         t_hit++; ht_hit++;                         /* daily/hourly hits    */
         t_xfer += log_rec.xfer_size;               /* total xfer size      */
         tm_xfer[rec_day-1] += log_rec.xfer_size;   /* daily xfer total     */
         tm_hit[rec_day-1]++;                       /* daily hits total     */
         th_xfer[rec_hour] += log_rec.xfer_size;    /* hourly xfer total    */
         th_hit[rec_hour]++;                        /* hourly hits total    */
   
         /* if RC_OK, increase file counters */
         if (log_rec.resp_code == RC_OK)
         {
            t_file++;
            tm_file[rec_day-1]++;
            th_file[rec_hour]++;
         }

         /*********************************************/
         /* RECORD PROCESSED - DO GROUPS HERE         */ 
         /*********************************************/

         /* URL Grouping */
         if ( (cp1=isinlist(group_urls,log_rec.url))!=NULL)
         {
            if (put_unode(cp1,OBJ_GRP,(u_long)1,log_rec.xfer_size,
                &ul_bogus,um_htab))
            {
               if (verbose)
               /* Error adding URL node, skipping ... */
               fprintf(stderr,"%s %s\n", msg_nomem_u, cp1);
            }
         }

         /* Site Grouping */
         if ( (cp1=isinlist(group_sites,log_rec.hostname))!=NULL)
         {
            if (put_hnode(cp1,OBJ_GRP,1,(u_long)(log_rec.resp_code==RC_OK)?1:0,
                          log_rec.xfer_size,&ul_bogus,sm_htab))
            {
               if (verbose)
               /* Error adding Site node, skipping ... */
               fprintf(stderr,"%s %s\n", msg_nomem_mh, cp1);
            }
         }

         /* Referrer Grouping */
         if ( (cp1=isinlist(group_refs,log_rec.refer))!=NULL)
         {
            if (put_rnode(cp1,OBJ_GRP,(u_long)1,&ul_bogus,rm_htab))
            {
               if (verbose)
               /* Error adding Referrer node, skipping ... */
               fprintf(stderr,"%s %s\n", msg_nomem_r, cp1);
            }
         }

         /* User Agent Grouping */
         if ( (cp1=isinlist(group_agents,log_rec.agent))!=NULL)
         {
            if (put_anode(cp1,OBJ_GRP,(u_long)1,&ul_bogus,am_htab))
            {
               if (verbose)
               /* Error adding User Agent node, skipping ... */
               fprintf(stderr,"%s %s\n", msg_nomem_a, cp1);
            }
         }
      }

      /*********************************************/
      /* BAD RECORD                                */
      /*********************************************/

      else
      {
         /* If first record, check if stupid Netscape header stuff      */
         if ( (total_rec==1) && (strncmp(buffer,"format=",7)==0) )
         {
            /* Skipping Netscape header record */
            if (verbose>1) printf("%s\n",msg_ign_nscp);
            /* count it as ignored... */
            total_ignore++;
         }
         else
         {
            /* really bad record... */
            total_bad++;
            if (verbose)
            {
               fprintf(stderr,"%s (%lu)",msg_bad_rec,total_rec);
               if (debug_mode) fprintf(stderr,":\n%s\n",tmp_buf);
               else fprintf(stderr,"\n");
            }
         }
      }
   }

   /*********************************************/
   /* DONE READING LOG FILE - final processing  */
   /*********************************************/

   /* only close log if really a file */
   if (log_fname) fclose(log_fp);            /* close log file           */

   if (good_rec)                             /* were any good records?   */
   {
      tm_site[cur_day-1]=dt_site;            /* If yes, clean up a bit   */
      if (ht_hit > mh_hit) mh_hit = ht_hit;
      write_month_html();                    /* write monthly HTML file  */
      write_main_index();                    /* write main HTML file     */
      put_history();                         /* write history            */
      if (incremental) save_state();         /* incremental stuff        */

      end_time = times(&mytms);              /* display timing totals?   */
      if (time_me || (verbose>1))
      {
         printf("%lu %s ",total_rec, msg_records);
         if (total_ignore)
         {
            printf("(%lu %s",total_ignore,msg_ignored);
            if (total_bad) printf(", %lu %s) ",total_bad,msg_bad);
               else        printf(") ");
         }
         else if (total_bad) printf("(%lu %s) ",total_bad,msg_bad);

         printf("%s %.2f %s\n", msg_in, (float)(end_time-start_time)/CLK_TCK,
                                msg_seconds);
      }
      /* Whew, all done! Exit with completion status (0) */
      exit(0);
   }
   else
   {
      /* No valid records found... exit with error (1) */
      if (verbose>0) printf("%s\n",msg_no_vrec);
      exit(1);
   }
}

/*********************************************/
/* FMT_LOGREC - terminate log fields w/zeros */
/*********************************************/

void fmt_logrec()
{
   char *cp=buffer;
   int  q=0,b=0,p=0;

   while (*cp != '\0')
   {
      /* break record up, terminate fields with '\0' */
      switch (*cp)
      {
       case ' ': if (b || q || p) break; *cp='\0'; break;
       case '"': q=(q)?0:1; break;
       case '[': if (q) break; b++; break;
       case ']': if (q) break; if (b>0) b--; break;
       case '(': if (q) break; p++; break;
       case ')': if (q) break; if (p>0) p--; break;
      }
      cp++;
   }
}

/*********************************************/
/* PARSE_RECORD - uhhh, you know...          */
/*********************************************/

int parse_record()
{
   int size;
   char *cp1, *cp2, *cpx, *eob, *eos;

   /* clear out structure */
   log_rec.hostname[0]=0;
   log_rec.datetime[0]=0;
   log_rec.url[0]=0;
   log_rec.resp_code=0;
   log_rec.xfer_size=0;
   log_rec.refer[0]=0;
   log_rec.agent[0]=0;

   size = strlen(buffer);                 /* get length of buffer        */
   eob = buffer+size;                     /* calculate end of buffer     */
   fmt_logrec();                          /* seperate fields with \0's   */

   /* HOSTNAME */
   cp1 = cpx = buffer; cp2=log_rec.hostname;
   eos = (cp1+MAXHOST)-1;
   if (eos >= eob) eos=eob-1;

   while ( (*cp1 != '\0') && (cp1 != eos) ) *cp2++ = *cp1++;
   *cp2 = '\0';
   if (*cp1 != '\0')
   {
      if (verbose)
      {
         fprintf(stderr,"%s",msg_big_host);
         if (debug_mode) fprintf(stderr,": %s\n",cpx);
         else fprintf(stderr,"\n");
      }
      while (*cp1 != '\0') cp1++;
   }
   if (cp1 < eob) cp1++;

   /* skip next two fields (ident and auth) */
   while ( (*cp1 != '\0') && (cp1 < eob) ) cp1++;
   if (cp1 < eob) cp1++;
   while ( (*cp1 != '\0') && (cp1 < eob) ) cp1++;
   if (cp1 < eob) cp1++;
   /* space in auth_name? */
   if (*cp1 != '[')
      while ( (*cp1 != '[') && (cp1 < eob) ) cp1++;

   if (cp1 >= eob) return 0;

   /* date/time string */
   cpx = cp1;
   cp2 = log_rec.datetime;
   eos = (cp1+28);
   if (eos >= eob) eos=eob-1;

   while ( (*cp1 != '\0') && (cp1 != eos) ) *cp2++ = *cp1++;
   *cp2 = '\0';
   if (*cp1 != '\0')
   {
      if (verbose)
      {
         fprintf(stderr,"%s",msg_big_date);
         if (debug_mode) fprintf(stderr,": %s\n",cpx);
         else fprintf(stderr,"\n");
      }
      while (*cp1 != '\0') cp1++;
   }
   if (cp1 < eob) cp1++;

   /* minimal sanity check on timestamp */
   if ( (log_rec.datetime[0] != '[') ||
        (log_rec.datetime[3] != '/') ||
        (cp1 >= eob))  return 0;

   /* HTTP request */
   cpx = cp1;
   cp2 = log_rec.url;
   eos = (cp1+MAXURL-1);
   if (eos >= eob) eos = eob-1;

   while ( (*cp1 != '\0') && (cp1 != eos) ) *cp2++ = *cp1++;
   *cp2 = '\0';
   if (*cp1 != '\0')
   {
      if (verbose)
      {
         fprintf(stderr,"%s",msg_big_req);
         if (debug_mode) fprintf(stderr,": %s\n",cpx);
         else fprintf(stderr,"\n");
      }
      while (*cp1 != '\0') cp1++;
   }
   if (cp1 < eob) cp1++;

   if ( (log_rec.url[0] != '"') ||
        (cp1 >= eob) ) return 0;

   /* response code */
   log_rec.resp_code = atoi(cp1);

   /* xfer size */
   while ( (*cp1 != '\0') && (cp1 < eob) ) cp1++;
   if (cp1 < eob) cp1++;
   log_rec.xfer_size = strtoul(cp1,NULL,10);

   /* done with CLF record */

   while ( (*cp1 != '\0') && (cp1 < eob) ) cp1++;
   if (cp1 < eob) cp1++;
   /* get referrer if present */
   cpx = cp1;
   cp2 = log_rec.refer;
   eos = (cp1+MAXREF-1);
   if (eos >= eob) eos = eob-1;

   while ( (*cp1 != '\0') && (cp1 != eos) ) *cp2++ = *cp1++;
   *cp2 = '\0';
   if (*cp1 != '\0')
   {
      if (verbose)
      {
         fprintf(stderr,"%s",msg_big_ref);
         if (debug_mode) fprintf(stderr,": %s\n",cpx);
         else fprintf(stderr,"\n");
      }
      while (*cp1 != '\0') cp1++;
   }
   if (cp1 < eob) cp1++;

   cpx = cp1;
   cp2 = log_rec.agent;
   eos = cp1+(MAXAGENT-1);
   if (eos >= eob) eos = eob-1;

   while ( (*cp1 != '\0') && (cp1 != eos) ) *cp2++ = *cp1++;
   *cp2 = '\0';

   return 1;     /* maybe a valid record, return with TRUE */
}

void clear_month()
{
   int i;

   init_counters();                  /* reset monthly counters  */
   del_hlist(sd_htab);               /* and clear tables        */
   del_ulist(um_htab);
   del_hlist(sm_htab);
   del_rlist(rm_htab);
   del_alist(am_htab);
   if (ntop_sites!=0 ) for (i=0;i<ntop_sites;i++)  top_sites[i]=NULL;
   if (ntop_ctrys!=0 ) for (i=0;i<ntop_ctrys;i++)  top_ctrys[i]=NULL;
   if (ntop_urls!=0 )  for (i=0;i<ntop_urls;i++)   top_urls[i]=NULL;
   if (ntop_refs!=0 )  for (i=0;i<ntop_refs;i++)   top_refs[i]=NULL;
   if (ntop_agents!=0) for (i=0;i<ntop_agents;i++) top_agents[i]=NULL;
}

/*********************************************/
/* GET_CONFIG - get configuration file info  */
/*********************************************/

void get_config(char *fname)
{
   char *kwords[]= { "Undefined",         /* 0 = undefined keyword       0  */
                     "OutputDir",         /* Output directory            1  */
                     "LogFile",           /* Log file to use for input   2  */
                     "ReportTitle",       /* Title for reports           3  */
                     "HostName",          /* Hostname to use             4  */
                     "IgnoreHist",        /* Ignore history file         5  */
                     "Quiet",             /* Run in quiet mode           6  */
                     "TimeMe",            /* Produce timing results      7  */
                     "Debug",             /* Produce debug information   8  */
                     "HourlyGraph",       /* Hourly stats graph          9  */
                     "HourlyStats",       /* Hourly stats table         10  */
                     "TopSites",          /* Top sites                  11  */
                     "TopURLs",           /* Top URL's                  12  */
                     "TopReferrers",      /* Top Referrers              13  */
                     "TopAgents",         /* Top User Agents            14  */
                     "TopCountries",      /* Top Countries              15  */
                     "HideSite",          /* Sites to hide              16  */
                     "HideURL",           /* URL's to hide              17  */
                     "HideReferrer",      /* Referrers to hide          18  */
                     "HideAgent",         /* User Agents to hide        19  */
                     "IndexAlias",        /* Aliases for index.html     20  */
                     "HTMLBody",          /* HTML body code             21  */
                     "HTMLPost",          /* HTML post code             22  */
                     "HTMLTail",          /* HTML Tail code             23  */
                     "MangleAgents",      /* Mangle User Agents         24  */
                     "IgnoreSite",        /* Sites to ignore            25  */
                     "IgnoreURL",         /* Url's to ignore            26  */
                     "IgnoreReferrer",    /* Referrers to ignore        27  */
                     "IgnoreAgent",       /* User Agents to ignore      28  */
                     "ReallyQuiet",       /* Dont display ANY messages  29  */
                     "GMTTime",           /* Local or UTC time?         30  */
                     "GroupURL",          /* Group URL's                31  */
                     "GroupSite",         /* Group Sites                32  */
                     "GroupReferrer",     /* Group Referrers            33  */
                     "GroupAgent",        /* Group Agents               34  */
                     "GroupShading",      /* Shade Grouped entries      35  */
                     "GroupHighlight",    /* BOLD Grouped entries       36  */
                     "Incremental",       /* Incremental runs           37  */
                     "HTMLPre",           /* Pre-HTML code              38  */
                     "HTMLHead",          /* HTML header code           39  */
                     "HTMLEnd"            /* HTML end code              40  */
                   };

   FILE *fp;

   char buffer[BUFSIZE];
   char keyword[32];
   char value[132];
   char *cp1, *cp2;
   int  i,key;
   int	num_kwords=sizeof(kwords)/sizeof(char *);

   if ( (fp=fopen(fname,"r")) == NULL)
   {
      if (verbose)
      fprintf(stderr,"%s %s\n",msg_bad_conf,fname);
      return;
   }

   while ( (fgets(buffer,BUFSIZE,fp)) != NULL)
   {
      if ( (buffer[0]=='#') || (buffer[0]=='\n')) continue;

      /* Get keyword */
      cp1=buffer;cp2=keyword;
      while ( isalnum(*cp1) ) *cp2++ = *cp1++;
      *cp2='\0';

      /* Get value */
      cp2=value;
      while ( (*cp1!='\n')&&(*cp1!='\0')&&(isspace(*cp1)) ) cp1++;
      while ( (*cp1!='\n')&&(*cp1!='\0') ) *cp2++ = *cp1++;
      *cp2--='\0';
      while ( (isspace(*cp2)) && (cp2 != value) ) *cp2--='\0';

      /* check if blank keyword/value */
      if ( (keyword[0]=='\0') || (value[0]=='\0') ) continue;

      key=0;
      for (i=0;i<num_kwords;i++)
         if (!strcmp(keyword,kwords[i])) key=i;

      if (key==0) { printf("%s '%s' (%s)\n",       /* Invalid keyword       */
                    msg_bad_key,keyword,fname);
                    continue;
                  }

      switch (key)
      {
        case 1:  out_dir=save_opt(value);          break; /* OutputDir      */
        case 2:  log_fname=save_opt(value);        break; /* LogFile        */
        case 3:  msg_title=save_opt(value);        break; /* ReportTitle    */
        case 4:  hname=save_opt(value);            break; /* HostName       */
        case 5:  ignore_hist=(value[0]=='n')?0:1;  break; /* IgnoreHist     */
        case 6:  verbose=(value[0]=='n')?2:1;      break; /* Quiet          */
        case 7:  time_me=(value[0]=='n')?0:1;      break; /* TimeMe         */
        case 8:  debug_mode=(value[0]=='n')?0:1;   break; /* Debug          */
        case 9:  hourly_graph=(value[0]=='n')?0:1; break; /* HourlyGraph    */
        case 10: hourly_stats=(value[0]=='n')?0:1; break; /* HourlyStats    */
        case 11: ntop_sites = atoi(value);         break; /* TopSites       */
        case 12: ntop_urls = atoi(value);          break; /* TopURLs        */
        case 13: ntop_refs = atoi(value);          break; /* TopRefs        */
        case 14: ntop_agents = atoi(value);        break; /* TopAgents      */
        case 15: ntop_ctrys = atoi(value);         break; /* TopCountries   */
        case 16: add_nlist(value,&hidden_sites);   break; /* HideSite       */
        case 17: add_nlist(value,&hidden_urls);    break; /* HideURL        */
        case 18: add_nlist(value,&hidden_refs);    break; /* HideReferrer   */
        case 19: add_nlist(value,&hidden_agents);  break; /* HideAgent      */
        case 20: add_nlist(value,&index_alias);    break; /* IndexAlias     */
        case 21: add_nlist(value,&html_body);      break; /* HTMLBody       */
        case 22: add_nlist(value,&html_post);      break; /* HTMLPost       */
        case 23: add_nlist(value,&html_tail);      break; /* HTMLTail       */
        case 24: mangle_agent=atoi(value);         break; /* MangleAgents   */
        case 25: add_nlist(value,&ignored_sites);  break; /* IgnoreSite     */
        case 26: add_nlist(value,&ignored_urls);   break; /* IgnoreURL      */
        case 27: add_nlist(value,&ignored_refs);   break; /* IgnoreReferrer */
        case 28: add_nlist(value,&ignored_agents); break; /* IgnoreAgent    */
        case 29: if (value[0]=='y') verbose=0;     break; /* ReallyQuiet    */
        case 30: local_time=(value[0]=='y')?0:1;   break; /* GMTTime        */
        case 31: add_nlist(value,&group_urls);     break; /* GroupURL       */
        case 32: add_nlist(value,&group_sites);    break; /* GroupSite      */
        case 33: add_nlist(value,&group_refs);     break; /* GroupReferrer  */
        case 34: add_nlist(value,&group_agents);   break; /* GroupAgent     */
        case 35: shade_groups=(value[0]=='y')?1:0; break; /* GroupShading   */
        case 36: hlite_groups=(value[0]=='y')?1:0; break; /* GroupHighlight */
        case 37: incremental=(value[0]=='y')?1:0;  break; /* Incremental    */
        case 38: add_nlist(value,&html_pre);       break; /* HTMLPre        */
        case 39: add_nlist(value,&html_head);      break; /* HTMLHead       */
        case 40: add_nlist(value,&html_end);       break; /* HTMLEnd       */
      }
   }
   fclose(fp);
}

/*********************************************/
/* SAVE_OPT - save option from config file   */
/*********************************************/

char *save_opt(char *str)
{
   int  i;
   char *cp1;

   i=strlen(str);

   if ( (cp1=malloc(i+1))==NULL) return NULL;

   strcpy(cp1,str);
   return cp1;
}

/*********************************************/
/* GET_HISTORY - load in history file        */
/*********************************************/

void get_history()
{
   int i;
   FILE *hist_fp;

   /* first initalize internal array */
   for (i=0;i<12;i++)
   {
      hist_month[i]=hist_year[i]=hist_fday[i]=hist_lday[i]=0;
      hist_hit[i]=hist_files[i]=hist_site[i]=0;
      hist_xfer[i]=0.0;
   }

   hist_fp=fopen(hist_fname,"r");

   if (hist_fp)
   {
      if (verbose>1) printf("%s\n",msg_get_hist);
      while ((fgets(buffer,BUFSIZE,hist_fp)) != NULL)
      {
         i = atoi(buffer) -1;
         if (i>11)
         {
            if (verbose)
               fprintf(stderr,"%s (mth=%d)\n",msg_bad_hist,i+1);
            continue;
         }

         /* month# year# requests files sites xfer firstday lastday */
         sscanf(buffer,"%d %d %lu %lu %lu %lf %d %d",
                       &hist_month[i],
                       &hist_year[i],
                       &hist_hit[i],
                       &hist_files[i],
                       &hist_site[i],
                       &hist_xfer[i],
                       &hist_fday[i],
                       &hist_lday[i]);
      }
      fclose(hist_fp);
   }
   else if (verbose>1) printf("%s\n",msg_no_hist);
}

/*********************************************/
/* PUT_HISTORY - write out history file      */
/*********************************************/

void put_history()
{
   int i;
   FILE *hist_fp;

   hist_fp = fopen(hist_fname,"w");

   if (hist_fp)
   {
      if (verbose>1) printf("%s\n",msg_put_hist);
      for (i=0;i<12;i++)
      {
         if ((hist_month[i] != 0) && (hist_hit[i] != 0))
         {
            fprintf(hist_fp,"%d %d %lu %lu %lu %.0f %d %d\n",
                            hist_month[i],
                            hist_year[i],
                            hist_hit[i],
                            hist_files[i],
                            hist_site[i],
                            hist_xfer[i],
                            hist_fday[i],
                            hist_lday[i]);
         }
      }
      fclose(hist_fp);
   }
   else
      if (verbose)
      fprintf(stderr,"%s %s\n",msg_hist_err,hist_fname);
}

/*********************************************/
/* INIT_COUNTERS - prep counters for use     */
/*********************************************/

void init_counters()
{
   int i;
   for (i=0;i<TOTAL_RC;i++) response[i].count = 0;
   for (i=0;i<31;i++)
    tm_hit[i]=tm_file[i]=tm_xfer[i]=tm_site[i]=0;
   for (i=0;i<24;i++) th_hit[i]=th_file[i]=th_xfer[i]=0;
   for (i=0;i<MAX_CTRY;i++)
   {
      ctry[i].count=0;
      ctry[i].files=0;
      ctry[i].xfer=0;
   }
   t_hit=t_file=t_site=t_url=t_ref=t_agent=0;
   t_xfer=0.0;
   mh_hit = 0;
   f_day=l_day=1;
}

/*********************************************/
/* PRINT_OPTS - print command line options   */
/*********************************************/

void print_opts(char *pname)
{
   int i;

   printf("%s: %s %s\n",h_usage1,pname,h_usage2);
   for (i=0;i<LAST_HLP_MSG;i++) printf("%s\n",h_msg[i]);
   exit(1);
}

/*********************************************/
/* PRINT_VERSION                             */
/*********************************************/

void print_version()
{
 uname(&system_info);
 printf("Webalizer V%s-%s (%s %s) %s\n%s\n\n",
    version,editlvl,
    system_info.sysname,system_info.release,
    language,copyright);
 exit(1);
}

/*********************************************/
/* CUR_TIME - return date/time as a string   */
/*********************************************/

char *cur_time()
{
   /* get system time */
   now = time(NULL);
   /* convert to timestamp string */
   if (local_time)
      strftime(timestamp,sizeof(timestamp),"%d-%b-%Y %H:%M %Z",
            localtime(&now));
   else
      strftime(timestamp,sizeof(timestamp),"%d-%b-%Y %H:%M GMT",
            gmtime(&now));

   return timestamp;
}

/*********************************************/
/* WRITE_HTML_HEAD - output top of HTML page */
/*********************************************/

void write_html_head(char *period)
{
   NLISTPTR lptr;                          /* used for HTMLhead processing */

/**** HTMLPre ... before anything else */

   lptr = html_pre;
   if (lptr==NULL) {
      fprintf(out_fp,"<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 3.2//EN\">\n\n");
      fprintf(out_fp,"<HTML>\n\n"); }
   else
   {
      while (lptr!=NULL)
      {
         fprintf(out_fp,"%s\n",lptr->string);
         lptr=lptr->next;
      }
   }

   fprintf(out_fp,"<!-- Generated by The Webalizer  Version %s -->\n", version);
   fprintf(out_fp,"<!--                                          -->\n");
   fprintf(out_fp,"<!--  Copyright 1998  by Bradford L. Barrett  -->\n");
   fprintf(out_fp,"<!-- (brad@mrunix.net  http://www.mrunix.net) -->\n");
   fprintf(out_fp,"<!--                                          -->\n");
   fprintf(out_fp,"<!-- Distributed under the GNU GPL  Version 2 -->\n");
   fprintf(out_fp,"<!--        Full text may be found at:        -->\n");
   fprintf(out_fp,"<!--     http://www.mrunix.net/webalizer/     -->\n");
   fprintf(out_fp,"<!--                                          -->\n");
   fprintf(out_fp,"<!--  Give the power back to the programmers  -->\n");
   fprintf(out_fp,"<!--    Fight Micro$oft,  support the FSF!    -->\n");
   fprintf(out_fp,"<!--           (http://www.fsf.org)           -->\n");
   fprintf(out_fp,"<!--                                          -->\n");
   fprintf(out_fp,"<!-- *** Generated: %s *** -->\n\n",cur_time());

/**** HTMLHead ... the header */

   fprintf(out_fp,"<HEAD>\n");
   fprintf(out_fp,"<TITLE>%s %s - %s</TITLE>\n", msg_title, hname, period);

   lptr = html_head;
   if (lptr!=NULL) {
      while (lptr!=NULL)
      {
         fprintf(out_fp,"%s\n",lptr->string);
         lptr=lptr->next;
      }
   }

   fprintf(out_fp,"</HEAD>\n\n");

/**** HTMLBody ... the body */

   lptr = html_body;
   if (lptr==NULL) 
      fprintf(out_fp,"<BODY BGCOLOR=\"%s\" TEXT=\"%s\" LINK=\"%s\" VLINK=\"%s\">\n",
              LTGREY, BLACK, BLUE, RED);
   else
   {
      while (lptr!=NULL)
      {
         fprintf(out_fp,"%s\n",lptr->string);
         lptr=lptr->next;
      }
   }

   fprintf(out_fp,"<H2>%s %s</H2>\n",msg_title, hname);
   fprintf(out_fp,"<SMALL><STRONG>\n%s: %s<BR>\n",msg_hhdr_sp,period);
   fprintf(out_fp,"%s %s<BR>\n</STRONG></SMALL>\n",msg_hhdr_gt,cur_time());
   lptr=html_post;
   while (lptr!=NULL)
   {
      fprintf(out_fp,"%s\n",lptr->string);
      lptr=lptr->next;
   }
   fprintf(out_fp,"<CENTER>\n<HR noshade>\n<P>\n");
}

/*********************************************/
/* WRITE_HTML_TAIL - output HTML page tail   */
/*********************************************/

void write_html_tail()
{
   NLISTPTR lptr;

   fprintf(out_fp,"</CENTER>\n");
   fprintf(out_fp,"<P>\n<HR noshade>\n");
   fprintf(out_fp,"<TABLE WIDTH=\"100%%\" CELLPADDING=0 CELLSPACING=0 BORDER=0>\n");
   fprintf(out_fp,"<TR>\n");
   fprintf(out_fp,"<TD ALIGN=left VALIGN=top>\n");
   fprintf(out_fp,"<SMALL>Generated by ");
   fprintf(out_fp,"<A HREF=\"http://www.mrunix.net/webalizer/\">");
   fprintf(out_fp,"<STRONG>Webalizer Version %s</STRONG></A>\n",version);
   fprintf(out_fp,"</SMALL>\n</TD>\n");
   lptr=html_tail;
   if (lptr)
   {
      fprintf(out_fp,"<TD ALIGN=\"right\" VALIGN=\"top\">\n");
      while (lptr!=NULL)
      {
         fprintf(out_fp,"%s\n",lptr->string);
         lptr=lptr->next;
      }
      fprintf(out_fp,"</TD>\n");
   }
   fprintf(out_fp,"</TR>\n</TABLE>\n");
   fprintf(out_fp,"\n<!-- Webalizer Version %s-%s (Mod: %s) -->\n",
           version,editlvl,moddate);

   lptr=html_end;
   if (lptr==NULL)
      fprintf(out_fp,"\n</BODY>\n</HTML>\n");
   else {
      while (lptr!=NULL)
      {
         fprintf(out_fp,"%s\n",lptr->string);
         lptr=lptr->next;
      }
   }

}

/*********************************************/
/* WRITE_MONTH_HTML - does what it says...   */
/*********************************************/

int write_month_html()
{
   int i;
   char html_fname[32];            /* filename storage areas...       */
   char gif1_fname[32];
   char gif2_fname[32];

   char buffer[256];               /* scratch buffer                  */

   if (verbose>1)
      printf("%s %s %d\n",msg_gen_rpt, l_month[cur_month-1], cur_year); 

   /* update history */
   i=cur_month-1;
   hist_month[i] =  cur_month;
   hist_year[i]  =  cur_year;
   hist_hit[i]   =  t_hit;
   hist_files[i] =  t_file;
   hist_site[i]  =  t_site;
   hist_xfer[i]  =  t_xfer/1024;
   hist_fday[i]  =  f_day;
   hist_lday[i]  =  l_day;

   /* fill in filenames */
   sprintf(html_fname,"usage_%02d%d.%s",cur_month,cur_year%100,file_ext);
   sprintf(gif1_fname,"daily_usage_%02d%d.gif",cur_month,cur_year%100);
   sprintf(gif2_fname,"hourly_usage_%02d%d.gif",cur_month,cur_year%100);

   /* create GIF images for web page */
   sprintf(buffer,"%s %s %d",msg_hmth_du,l_month[cur_month-1],cur_year);

   month_graph4 (  gif1_fname,          /* filename          */
                   buffer,              /* graph title       */
                   cur_month,           /* graph month       */
                   cur_year,            /* graph year        */
                   tm_hit,              /* data 1 (hits)     */
                   tm_file,             /* data 2 (files)    */
                   tm_site,             /* data 3 (sites)    */
                   tm_xfer);            /* data 4 (kbytes)   */

   if (hourly_graph)
   {
      sprintf(buffer,"%s %s %d",msg_hmth_hu,l_month[cur_month-1],cur_year);
      day_graph2(    gif2_fname,
                     buffer,
                     th_hit,
                     th_file );
   }

   /* now do html stuff... */
   if ( (out_fp = fopen(html_fname,"w")) == NULL)
   {
      if (verbose)
      fprintf(stderr,"%s %s\n",msg_no_open,html_fname);
      return 1;
   }
   sprintf(buffer,"%s %d",l_month[cur_month-1],cur_year);
   write_html_head(buffer);
   month_links();
   month_total_table();
   fprintf(out_fp,"<A NAME=\"DAYSTATS\">\n");
   fprintf(out_fp,"<IMG SRC=\"%s\" ALT=\"Daily statistics\" "      \
                  "HEIGHT=400 WIDTH=512><P>\n",gif1_fname);
   daily_total_table();

   if (hourly_graph)                      /* hourly graph                   */
   {
      fprintf(out_fp,"<A NAME=\"HOURSTATS\">\n");
      fprintf(out_fp,"<IMG SRC=\"%s\" ALT=\"Hourly statistics\" "  \
                     "HEIGHT=256 WIDTH=512><P>\n",
      gif2_fname);
   }

   if (hourly_stats) hourly_total_table();  /* hourly usage table           */

   if (ntop_sites ) top_sites_table();    /* top sites table                */
   if (ntop_urls  ) top_urls_table();     /* top URL's table                */
   if (ntop_refs  ) top_refs_table();     /* top referrers table            */
   if (ntop_agents) top_agents_table();   /* top user agents table          */
   if (ntop_ctrys ) top_ctry_table();     /* top countries table            */

   write_html_tail();                     /* finish up the HTML document    */
   fclose(out_fp);                        /* close the file                 */
   return (0);                            /* done...                        */
}

/*********************************************/
/* MONTH_LINKS - links to other page parts   */
/*********************************************/

void month_links()
{
   fprintf(out_fp,"<SMALL>\n");
   fprintf(out_fp,"<A HREF=\"#DAYSTATS\">[%s]</A>\n",msg_hlnk_ds);
   if (hourly_stats || hourly_graph)
      fprintf(out_fp,"<A HREF=\"#HOURSTATS\">[%s]</A>\n",msg_hlnk_hs);
   if (ntop_sites)
      fprintf(out_fp,"<A HREF=\"#TOPSITES\">[%s]</A>\n",msg_hlnk_s);
   if (ntop_urls)
      fprintf(out_fp,"<A HREF=\"#TOPURLS\">[%s]</A>\n",msg_hlnk_u);
   if (ntop_refs && t_ref)
      fprintf(out_fp,"<A HREF=\"#TOPREFS\">[%s]</A>\n",msg_hlnk_r);
   if (ntop_agents && t_agent)
      fprintf(out_fp,"<A HREF=\"#TOPAGENTS\">[%s]</A>\n",msg_hlnk_a);
   if (ntop_ctrys)
      fprintf(out_fp,"<A HREF=\"#TOPCTRYS\">[%s]</A>\n",msg_hlnk_c);
   fprintf(out_fp,"</SMALL>\n<P>\n");
}
/*********************************************/
/* MONTH_TOTAL_TABLE - monthly totals table  */
/*********************************************/

void month_total_table()
{
   int i,days_in_month;
   u_long max_files=0;

   days_in_month=(l_day-f_day)+1;

   for (i=0;i<31;i++) if (tm_hit[i]>max_files) max_files = tm_hit[i];

   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADDING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH COLSPAN=2 ALIGN=center BGCOLOR=\"%s\">"           \
           "%s %s %d</TH></TR>\n",
           GREY,msg_mtot_ms,l_month[cur_month-1],cur_year);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   /* Total Hits */
   fprintf(out_fp,"<TR><TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"               \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B>"                     \
           "</FONT></TD></TR>\n",
           msg_mtot_th,t_hit);
   /* Total Files */
   fprintf(out_fp,"<TR><TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"               \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B>"                     \
           "</FONT></TD></TR>\n",
           msg_mtot_tf,t_file);
   /* Total XFer */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%.0f<B></FONT></TD></TR>\n",
           msg_mtot_tx,t_xfer/1024);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   /* Unique Sites */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_us,t_site);
   /* Unique URL's */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_uu,t_url);
   /* Unique Referrers */
   if (t_ref != 0)
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_ur,t_ref);
   /* Unique Agents */
   if (t_agent != 0)
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_ua,t_agent);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   /* Max Files per Day */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_mhd,max_files);
   /* Avg Hits per Day */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_ahd,t_hit/days_in_month);
   /* Max Hits per Hour */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_mhh,mh_hit);
   /* Avg Hits per Hour */
   fprintf(out_fp,"<TR>"                                                     \
           "<TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"                          \
           "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu<B></FONT></TD></TR>\n",
           msg_mtot_ahh,t_hit/(24*days_in_month));
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   /* response code totals */
   fprintf(out_fp,"<TR><TH COLSPAN=2 ALIGN=center BGCOLOR=\"%s\">"           \
           "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",GREY,msg_mtot_rc);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<TOTAL_RC;i++)
   {
      if (response[i].count != 0)
         fprintf(out_fp,"<TR><TD><FONT SIZE=\"-1\">%s</FONT></TD>\n"         \
            "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD></TR>\n",
            response[i].desc, response[i].count);
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n");
   fprintf(out_fp,"<P>\n");
}

/*********************************************/
/* DAILY_TOTAL_TABLE - daily totals          */
/*********************************************/

void daily_total_table()
{
   int i;

   /* Daily stats */
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADDING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   /* Daily statistics for ... */
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" COLSPAN=9 ALIGN=center>"           \
           "%s %s %d</TH></TR>\n",
           GREY,msg_dtot_ds,l_month[cur_month-1], cur_year);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH ALIGN=center BGCOLOR=\"%s\">"                     \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"                       \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"               \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"                       \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"               \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"                       \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"               \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"                       \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"               \
                  "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",
                  GREY,    msg_h_day,
                  DKGREEN, msg_h_hits,
                  LTBLUE,  msg_h_files,
                  ORANGE,  msg_h_sites,
                  RED,     msg_h_xfer);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<hist_lday[cur_month-1];i++)
   {
      fprintf(out_fp,"<TR><TD ALIGN=center>"                                 \
              "<FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n", i+1);
      fprintf(out_fp,"<TD ALIGN=right>"                                      \
              "<FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n"                   \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n",
              tm_hit[i],PCENT(tm_hit[i],t_hit));
      fprintf(out_fp,"<TD ALIGN=right>"                                      \
              "<FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n"                   \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n",
              tm_file[i],PCENT(tm_file[i],t_file));
      fprintf(out_fp,"<TD ALIGN=right>"                                      \
              "<FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n"                   \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n",
              tm_site[i],PCENT(tm_site[i],t_site));
      fprintf(out_fp,"<TD ALIGN=right>"                                      \
              "<FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n"                   \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD></TR>\n",
              tm_xfer[i]/1024,PCENT(tm_xfer[i],t_xfer));
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n");
   fprintf(out_fp,"<P>\n");
}

/*********************************************/
/* HOURLY_TOTAL_TABLE - hourly table         */
/*********************************************/

void hourly_total_table()
{
   int i,days_in_month;
   u_long avg_file=0, avg_xfer=0;

   days_in_month=(l_day-f_day)+1;

   /* Hourly stats */
   if (!hourly_graph)
      fprintf(out_fp,"<A NAME=\"HOURSTATS\">\n");
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" COLSPAN=10 ALIGN=center>"\
           "%s %s %d</TH></TR>\n",
           GREY,msg_htot_hs,l_month[cur_month-1], cur_year);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH ALIGN=center ROWSPAN=2 BGCOLOR=\"%s\">" \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=3>"     \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=3>"     \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=3>"     \
                  "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",
                  GREY,    msg_h_hour,
                  DKGREEN, msg_h_hits,
                  LTBLUE,  msg_h_files,
                  RED,     msg_h_xfer);
   fprintf(out_fp,"<TR><TH ALIGN=center BGCOLOR=\"%s\">"           \
                  "<FONT SIZE=\"-2\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"     \
                  "<FONT SIZE=\"-2\">%s</FONT></TH>\n",
                  DKGREEN, msg_h_avg, DKGREEN, msg_h_total);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"               \
                  "<FONT SIZE=\"-2\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"     \
                  "<FONT SIZE=\"-2\">%s</FONT></TH>\n",
                  LTBLUE, msg_h_avg, LTBLUE, msg_h_total);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"               \
                  "<FONT SIZE=\"-2\">%s</FONT></TH>\n"             \
                  "<TH ALIGN=center BGCOLOR=\"%s\" COLSPAN=2>"     \
                  "<FONT SIZE=\"-2\">%s</FONT></TH></TR>\n",
                  RED, msg_h_avg, RED, msg_h_total);

   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<24;i++)
   {
      fprintf(out_fp,"<TR><TD ALIGN=center>"                         \
         "<FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n",i);
      fprintf(out_fp,
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n",
         th_hit[i]/days_in_month,th_hit[i],
         PCENT(th_hit[i],t_hit));
      fprintf(out_fp,
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n",
         th_file[i]/days_in_month,th_file[i],
         PCENT(th_file[i],t_file));
      fprintf(out_fp,
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
         "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD></TR>\n",
         (th_xfer[i]/days_in_month)/1024,th_xfer[i]/1024,
         PCENT(th_xfer[i],t_xfer));
      avg_file += th_file[i]/days_in_month;
      avg_xfer+= (th_xfer[i]/days_in_month)/1024;
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* TOP_SITES_TABLE - generate top n table    */
/*********************************************/

void top_sites_table()
{
   int i,j,x,tot_num=0;
   HNODEPTR hptr;

   for (i=0;i<MAXHASH;i++)
   {
      hptr=sm_htab[i];
      while (hptr!=NULL)
      {
         if (hptr->flag != OBJ_HIDE)
         {
            for (j=0;j<ntop_sites;j++)
            {
               if (top_sites[j]==NULL) { top_sites[j]=hptr; break; }
               else
               {
                  if (hptr->count >= top_sites[j]->count)
                  {
                     for (x=ntop_sites-1;x>j;x--)
                        top_sites[x] = top_sites[x-1];
                     top_sites[j]=hptr; break;
                  }
               }
            }
         }
         hptr=hptr->next;
      }
   }

   for (i=0;i<ntop_sites;i++) if (top_sites[i] != NULL) tot_num++;
   if (tot_num==0) return;
   fprintf(out_fp,"<A NAME=\"TOPSITES\">\n");
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=CENTER COLSPAN=8>"         \
           "%s %d %s %lu %s</TH></TR>\n",
           GREY, msg_top_top, tot_num, msg_top_of, t_site, msg_top_s);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=center>"                   \
          "<FONT SIZE=\"-1\">#</FONT></TH>\n",GREY);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",LTBLUE,msg_h_files);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",RED,msg_h_xfer);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center>"                       \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",CYAN,msg_h_hname);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<ntop_sites;i++)
   {
      if (top_sites[i] != NULL)
      {
         /* shade grouping? */
         if (shade_groups && (top_sites[i]->flag==OBJ_GRP))
            fprintf(out_fp,"<TR BGCOLOR=\"%s\">\n", GRPCOLOR);
         else fprintf(out_fp,"<TR>\n");

         fprintf(out_fp,
              "<TD ALIGN=center><FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"
              "<TD ALIGN=left><FONT SIZE=\"-1\">",
              i+1,top_sites[i]->count,
              (t_hit==0)?0:((float)top_sites[i]->count/t_hit)*100.0,
              top_sites[i]->files,
              (t_file==0)?0:((float)top_sites[i]->files/t_file)*100.0,
              top_sites[i]->xfer/1024,
              (t_xfer==0)?0:((float)top_sites[i]->xfer/t_xfer)*100.0);

         if ((top_sites[i]->flag==OBJ_GRP)&&hlite_groups)
             fprintf(out_fp,"<STRONG>%s</STRONG></FONT></TD></TR>\n",
               top_sites[i]->string);
         else fprintf(out_fp,"%s</FONT></TD></TR>\n",
               top_sites[i]->string);
      }
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* TOP_URLS_TABLE - generate top n table     */
/*********************************************/

void top_urls_table()
{
   int i,j,x,tot_num=0;
   UNODEPTR uptr;

   for (i=0;i<MAXHASH;i++)
   {
      uptr=um_htab[i];
      while (uptr!=NULL)
      {
         if (uptr->flag != OBJ_HIDE)
         {
            for (j=0;j<ntop_urls;j++)
            {
               if (top_urls[j]==NULL) { top_urls[j]=uptr; break; }
               else
               {
                  if (uptr->count >= top_urls[j]->count)
                  {
                     for (x=ntop_urls-1;x>j;x--)
                        top_urls[x] = top_urls[x-1];
                     top_urls[j]=uptr; break;
                  }
               }
            }
         }
         uptr=uptr->next;
      }
   }

   for (i=0;i<ntop_urls;i++) if (top_urls[i] != NULL) tot_num++;
   if (tot_num==0) return;
   fprintf(out_fp,"<A NAME=\"TOPURLS\">\n");
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=CENTER COLSPAN=6>"        \
           "%s %d %s %lu %s</TH></TR>\n",
           GREY, msg_top_top, tot_num, msg_top_of, t_url, msg_top_u);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=center>"                  \
                  "<FONT SIZE=\"-1\">#</FONT></TH>\n",
                  GREY);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"            \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n",
                  DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"            \
                  "<FONT SIZE=\"-1\">%s</FONT></TH>\n",
                  RED,msg_h_xfer);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center>"                      \
                  "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",
                  CYAN,msg_h_url);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<ntop_urls;i++)
   {
      if (top_urls[i] != NULL)
      {
         /* shade grouping? */
         if (shade_groups && (top_urls[i]->flag==OBJ_GRP))
            fprintf(out_fp,"<TR BGCOLOR=\"%s\">\n", GRPCOLOR);
         else fprintf(out_fp,"<TR>\n");

         fprintf(out_fp,
             "<TD ALIGN=center><FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n" \
             "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
             "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
             "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
             "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
             "<TD ALIGN=left><FONT SIZE=\"-1\">",
             i+1,top_urls[i]->count,
             (t_hit==0)?0:((float)top_urls[i]->count/t_hit)*100.0,
             top_urls[i]->xfer/1024,
             (t_xfer==0)?0:((float)top_urls[i]->xfer/t_xfer)*100.0);

         if (top_urls[i]->flag==OBJ_GRP)
         {
            if (hlite_groups)
               fprintf(out_fp,"<STRONG>%s</STRONG></FONT></TD></TR>\n",
                  top_urls[i]->string);
            else fprintf(out_fp,"%s</FONT></TD></TR>\n",top_urls[i]->string);
         }
         else fprintf(out_fp,"<A HREF=\"http://%s%s\">%s</A></FONT></TD></TR>\n",
               hname,top_urls[i]->string,top_urls[i]->string);
      }
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* TOP_REFS_TABLE - generate top n table     */
/*********************************************/

void top_refs_table()
{
   int i,j,x,tot_num=0;
   RNODEPTR rptr;

   if (t_ref == 0) return;  /* don't bother if we don't have any */

   for (i=0;i<MAXHASH;i++)
   {
      rptr=rm_htab[i];
      while (rptr!=NULL)
      {
         if (rptr->flag != OBJ_HIDE)
         {
            for (j=0;j<ntop_refs;j++)
            {
               if (top_refs[j]==NULL) { top_refs[j]=rptr; break; }
               else
               {
                  if (rptr->count >= top_refs[j]->count)
                  {
                     for (x=ntop_refs-1;x>j;x--)
                        top_refs[x] = top_refs[x-1];
                     top_refs[j]=rptr; break;
                  }
               }
            }
         }
         rptr=rptr->next;
      }
   }

   for (i=0;i<ntop_refs;i++) if (top_refs[i] != NULL) tot_num++;
   if (tot_num==0) return;
   fprintf(out_fp,"<A NAME=\"TOPREFS\">\n");
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=CENTER COLSPAN=4>"         \
           "%s %d %s %lu %s</TH></TR>\n",
           GREY, msg_top_top, tot_num, msg_top_of, t_ref, msg_top_r);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=center>"                   \
          "<FONT SIZE=\"-1\">#</FONT></TH>\n",
          GREY);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",
          DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center>"                       \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",
          CYAN,msg_h_ref);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<ntop_refs;i++)
   {
      if (top_refs[i] != NULL)
      {
         /* shade grouping? */
         if (shade_groups && (top_refs[i]->flag==OBJ_GRP))
            fprintf(out_fp,"<TR BGCOLOR=\"%s\">\n", GRPCOLOR);
         else fprintf(out_fp,"<TR>\n");

         fprintf(out_fp,
             "<TD ALIGN=center><FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n"  \
             "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n"  \
             "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"    \
             "<TD ALIGN=left><FONT SIZE=\"-1\">",
             i+1,top_refs[i]->count,
             (t_hit==0)?0:((float)top_refs[i]->count/t_hit)*100.0);

         if (top_refs[i]->flag==OBJ_GRP)
         {
            if (hlite_groups)
               fprintf(out_fp,"<STRONG>%s</STRONG>",top_refs[i]->string);
            else fprintf(out_fp,"%s",top_refs[i]->string);
         }
         else
         {
            if (top_refs[i]->string[0] != '-')
            fprintf(out_fp,"<A HREF=\"%s\">%s</A>",
                top_refs[i]->string, top_refs[i]->string);
            else
            fprintf(out_fp,"%s", top_refs[i]->string);
         }
         fprintf(out_fp,"</FONT></TD></TR>\n");
      }
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* TOP_AGENTS_TABLE - generate top n table   */
/*********************************************/

void top_agents_table()
{
   int i,j,x,tot_num=0;
   ANODEPTR aptr;

   if (t_agent == 0) return;    /* don't bother if we don't have any */

   for (i=0;i<MAXHASH;i++)
   {
      aptr=am_htab[i];
      while (aptr!=NULL)
      {
         if (aptr->flag != OBJ_HIDE)
         {
            for (j=0;j<ntop_agents;j++)
            {
               if (top_agents[j]==NULL) { top_agents[j]=aptr; break; }
               else
               {
                  if (aptr->count >= top_agents[j]->count)
                  {
                     for (x=ntop_agents-1;x>j;x--)
                        top_agents[x] = top_agents[x-1];
                     top_agents[j]=aptr; break;
                  }
               }
            }
         }
         aptr=aptr->next;
      }
   }

   for (i=0;i<ntop_agents;i++) if (top_agents[i] != NULL) tot_num++;
   if (tot_num==0) return;
   fprintf(out_fp,"<A NAME=\"TOPAGENTS\">\n");
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=CENTER COLSPAN=4>"        \
          "%s %d %s %lu %s</TH></TR>\n",
          GREY, msg_top_top, tot_num, msg_top_of, t_agent, msg_top_a);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=center>"                  \
          "<FONT SIZE=\"-1\">#</FONT></TH>\n",
          GREY);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"            \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",
          DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center>"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",
          CYAN,msg_h_agent);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<ntop_agents;i++)
   {
      if (top_agents[i] != NULL)
      {
         /* shade grouping? */
         if (shade_groups && (top_agents[i]->flag==OBJ_GRP))
            fprintf(out_fp,"<TR BGCOLOR=\"%s\">\n", GRPCOLOR);
         else fprintf(out_fp,"<TR>\n");

         fprintf(out_fp,
             "<TD ALIGN=center><FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n" \
             "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
             "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
             "<TD ALIGN=left><FONT SIZE=\"-1\">",
             i+1,top_agents[i]->count,
             (t_hit==0)?0:((float)top_agents[i]->count/t_hit)*100.0);

         if ((top_agents[i]->flag==OBJ_GRP)&&hlite_groups)
            fprintf(out_fp,"<STRONG>%s</STRONG></FONT></TD></TR>\n",
               top_agents[i]->string);
         else fprintf(out_fp,"%s</FONT></TD></TR>\n",
               top_agents[i]->string);
      }
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* TOP_CTRY_TABLE - top countries table      */
/*********************************************/

void top_ctry_table()
{
   int i,j,x,tot_num=0,tot_ctry=0;
   int ctry_fnd;
   u_long idx;
   HNODEPTR hptr;
   char *domain;
   u_long pie_data[10];
   char   *pie_legend[10];
   char   pie_title[48];
   char   pie_fname[48];

   /* scan hash table adding up domain totals */
   for (i=0;i<MAXHASH;i++)
   {
      hptr=sm_htab[i];
      while (hptr!=NULL)
      {
         if (hptr->flag != OBJ_GRP)   /* ignore group totals */
         {
            domain = hptr->string+strlen(hptr->string)-1;
            while ( (*domain!='.')&&(domain!=hptr->string)) domain--;
            if ((isdigit(*++domain))||(domain==hptr->string))
            {
               ctry[0].count+=hptr->count;
               ctry[0].files+=hptr->files;
               ctry[0].xfer +=hptr->xfer;
            }
            else
            {
               ctry_fnd=0;
               idx=ctry_idx(domain);
               for (j=0;j<MAX_CTRY;j++)
               {
                  if (idx==ctry[j].idx)
                  {
                     ctry[j].count+=hptr->count;
                     ctry[j].files+=hptr->files;
                     ctry[j].xfer +=hptr->xfer;
                     ctry_fnd=1;
                     break;
                  }
               }
               if (!ctry_fnd)
               {
                  ctry[0].count+=hptr->count;
                  ctry[0].files+=hptr->files;
                  ctry[0].xfer +=hptr->xfer;
               }
            }
         }
         hptr=hptr->next;
      }
   }

   for (i=0;i<MAX_CTRY;i++)
   {
      if (ctry[i].count!=0) tot_ctry++;
      for (j=0;j<ntop_ctrys;j++)
      {
         if (top_ctrys[j]==NULL) { top_ctrys[j]=&ctry[i]; break; }
         else
         {
            if (ctry[i].count > top_ctrys[j]->count)
            {
               for (x=ntop_ctrys-1;x>j;x--)
                  top_ctrys[x]=top_ctrys[x-1];
               top_ctrys[x]=&ctry[i];
               break;
            }
         }
      }
   }

   /* generate pie chart */
   for (i=0;i<10;i++) pie_data[i]=0;             /* init data array      */
   if (ntop_ctrys<10) j=ntop_ctrys; else j=10;   /* ensure data size     */

   for (i=0;i<j;i++)
   {
      pie_data[i]=top_ctrys[i]->count;           /* load the array       */
      pie_legend[i]=top_ctrys[i]->desc;
   }
   sprintf(pie_title,"%s %s %d",msg_ctry_use,l_month[cur_month-1],cur_year);
   sprintf(pie_fname,"ctry_usage_%02d%d.gif",cur_month,cur_year%100);

   pie_chart(pie_fname,pie_title,t_hit,pie_data,pie_legend);  /* do it   */

   /* generate HTML */
   fprintf(out_fp,"<A NAME=\"TOPCTRYS\">\n");
   fprintf(out_fp,"<IMG SRC=\"%s\" ALT=\"Country Usage\" "                 \
                  "HEIGHT=300 WIDTH=512><P>\n",
      pie_fname);
   for (i=0;i<ntop_ctrys;i++) if (top_ctrys[i]->count!=0) tot_num++;
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=CENTER COLSPAN=8>"         \
           "%s %d %s %d %s</TH></TR>\n",
           GREY,msg_top_top,tot_num,msg_top_of,tot_ctry,msg_top_c);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" ALIGN=center>"                   \
          "<FONT SIZE=\"-1\">#</FONT></TH>\n",GREY);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",LTBLUE,msg_h_files);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center COLSPAN=2>"             \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",RED,msg_h_xfer);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=center>"                       \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",CYAN,msg_h_ctry);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<ntop_ctrys;i++)
   {
      if (top_ctrys[i]->count!=0)
      fprintf(out_fp,"<TR>"                                                \
              "<TD ALIGN=center><FONT SIZE=\"-1\"><B>%d</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%lu</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
              "<TD ALIGN=right><FONT SIZE=\"-1\"><B>%.0f</B></FONT></TD>\n" \
              "<TD ALIGN=right><FONT SIZE=\"-2\">%3.02f%%</FONT></TD>\n"   \
              "<TD ALIGN=left><FONT SIZE=\"-1\">%s</FONT></TD></TR>\n",
              i+1,top_ctrys[i]->count,
              (t_hit==0)?0:((float)top_ctrys[i]->count/t_hit)*100.0,
              top_ctrys[i]->files,
              (t_file==0)?0:((float)top_ctrys[i]->files/t_file)*100.0,
              top_ctrys[i]->xfer/1024,
              (t_xfer==0)?0:((float)top_ctrys[i]->xfer/t_xfer)*100.0,
              top_ctrys[i]->desc);
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n<P>\n");
}

/*********************************************/
/* WRITE_MAIN_INDEX - main index.html file   */
/*********************************************/

int write_main_index()
{
   /* create main index file */

   char html_iname[32];

   int  i,days_in_month;
   int  lyear=0;
   int	s_mth=0;
   double  gt_hit=0.0;
   double  gt_files=0.0;
   double  gt_xfer=0.0;

   char buffer[256];

   if (verbose>1) printf("%s\n",msg_gen_sum);

   sprintf(buffer,"%s %s",msg_main_us,hname);
   sprintf(html_iname,"index.%s",file_ext);

   for (i=0;i<12;i++)                   /* get last month in history */
   {
      if (hist_year[i]>lyear)
       { lyear=hist_year[i]; s_mth=hist_month[i]; }
      if (hist_year[i]==lyear)
      {
         if (hist_month[i]>=s_mth)
            s_mth=hist_month[i];
      }
   }

   i=(s_mth==12)?1:s_mth+1;

   year_graph4x(   "usage.gif",         /* filename          */
                   buffer,              /* graph title       */
                   i,                   /* last month        */
                   hist_hit,            /* data set 1        */
                   hist_files,          /* data set 2        */
                   hist_site,           /* data set 3        */
                   hist_xfer);          /* data set 4        */

   /* now do html stuff... */
   if ( (out_fp=fopen(html_iname,"w")) == NULL)
   {
      if (verbose)
      fprintf(stderr,"%s %s!\n",msg_no_open,html_iname);
      return 1;
   }
   write_html_head(msg_main_per);
   /* year graph */
   fprintf(out_fp,"<IMG SRC=\"usage.gif\" ALT=\"Monthly Statistics\" "    \
                  "HEIGHT=256 WIDTH=512><P>\n");
   /* month table */
   fprintf(out_fp,"<TABLE WIDTH=510 BORDER=2 CELLSPACING=1 CELLPADDING=1>\n");
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH COLSPAN=7 BGCOLOR=\"%s\" ALIGN=center>",GREY);
   fprintf(out_fp,"%s</TH></TR>\n",msg_main_sum);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH ALIGN=left ROWSPAN=2 BGCOLOR=\"%s\">"          \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",GREY,msg_h_mth);
   fprintf(out_fp,"<TH ALIGN=center COLSPAN=2 BGCOLOR=\"%s\">"            \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",GREY,msg_main_da);
   fprintf(out_fp,"<TH ALIGN=center COLSPAN=4 BGCOLOR=\"%s\">"            \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",GREY,msg_main_mt);
   fprintf(out_fp,"<TR><TH ALIGN=center BGCOLOR=\"%s\">"                  \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",LTBLUE,msg_h_files);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",ORANGE,msg_h_sites);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",RED,msg_h_xfer);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",LTBLUE,msg_h_files);
   fprintf(out_fp,"<TH ALIGN=center BGCOLOR=\"%s\">"                      \
          "<FONT SIZE=\"-1\">%s</FONT></TH></TR>\n",DKGREEN,msg_h_hits);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   for (i=0;i<12;i++)
   {
      if (--s_mth < 0) s_mth = 11;
      if ((hist_month[s_mth]==0) && (hist_files[s_mth]==0)) continue;
      days_in_month=(hist_lday[s_mth]-hist_fday[s_mth])+1;
      fprintf(out_fp,"<TR><TD><A HREF=\"usage_%02d%d.%s\">"             \
                     "<FONT SIZE=\"-1\">%s %d</FONT></A></TD>\n",
                      hist_month[s_mth], hist_year[s_mth]%100, file_ext,
                      l_month[hist_month[s_mth]-1], hist_year[s_mth]%100);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%lu</FONT></TD>\n",
                      hist_hit[s_mth]/days_in_month);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%lu</FONT></TD>\n",
                      hist_files[s_mth]/days_in_month);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%lu</FONT></TD>\n",
                      hist_site[s_mth]);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%.0f</FONT></TD>\n",
                      hist_xfer[s_mth]);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%lu</FONT></TD>\n",
                      hist_files[s_mth]);
      fprintf(out_fp,"<TD ALIGN=right><FONT SIZE=\"-1\">%lu</FONT></TD></TR>\n",
                      hist_hit[s_mth]);
      gt_hit   += hist_hit[s_mth];
      gt_files += hist_files[s_mth];
      gt_xfer  += hist_xfer[s_mth];
   }
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"<TR><TH BGCOLOR=\"%s\" COLSPAN=4 ALIGN=left>"          \
          "<FONT SIZE=\"-1\">%s</FONT></TH>\n",GREY,msg_h_totals);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=right>"                       \
          "<FONT SIZE=\"-1\">%.0f</FONT></TH>\n",GREY,gt_xfer);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=right>"                       \
          "<FONT SIZE=\"-1\">%.0f</FONT></TH>\n",GREY,gt_files);
   fprintf(out_fp,"<TH BGCOLOR=\"%s\" ALIGN=right>"                       \
          "<FONT SIZE=\"-1\">%.0f</FONT></TH></TR>\n",GREY,gt_hit);
   fprintf(out_fp,"<TR><TH HEIGHT=4></TH></TR>\n");
   fprintf(out_fp,"</TABLE>\n");
   write_html_tail();
   fclose(out_fp);
   return 0;
}

/*********************************************/
/* NEW_NLIST - create new linked list node   */ 
/*********************************************/

NLISTPTR new_nlist(char *str)
{
   NLISTPTR newptr;

   if (sizeof(newptr->string) < strlen(str))
   {
      if (verbose)
    fprintf(stderr,"[new_nlist] %s\n",msg_big_one);
   }
   if (( newptr = malloc(sizeof(struct nlist))) != NULL)
    {strncpy(newptr->string, str, sizeof(newptr->string));newptr->next=NULL;}
   return newptr;
}

/*********************************************/
/* ADD_NLIST - add item to FIFO linked list  */
/*********************************************/

int add_nlist(char *str, NLISTPTR *list)
{
   NLISTPTR newptr,cptr,pptr;

   if ( (newptr = new_nlist(str)) != NULL)
   {
      if (*list==NULL) *list=newptr;
      else
      {
         cptr=pptr=*list;
         while(cptr!=NULL) { pptr=cptr; cptr=cptr->next; };
         pptr->next = newptr;
      }
   } 
   return newptr==NULL;
}

/*********************************************/
/* DEL_NLIST - delete FIFO linked list       */
/*********************************************/

void del_nlist(NLISTPTR *list)
{
   NLISTPTR cptr,nptr;

   cptr=*list;
   while (cptr!=NULL)
   {
      nptr=cptr->next;
      free(cptr);
      cptr=nptr;
   }
}

/*********************************************/
/* NEW_HNODE - create host node              */
/*********************************************/

HNODEPTR new_hnode(char *str)
{
   HNODEPTR newptr;

   if (sizeof(newptr->string) < strlen(str))
   {
      if (verbose)
      fprintf(stderr,"[new_hnode] %s\n",msg_big_one);
   }
   if (( newptr = malloc(sizeof(struct hnode))) != NULL)
   {
      strncpy(newptr->string, str, sizeof(newptr->string));
/*      newptr->count = 1;
      newptr->flag  = OBJ_REG; */
   }
   return newptr;
}

/*********************************************/
/* PUT_HNODE - insert/update host node       */
/*********************************************/

int put_hnode( char     *str,   /* Hostname  */
               int      type,   /* obj type  */
               u_long   count,  /* hit count */
               u_long   file,   /* File flag */
               u_long   xfer,   /* xfer size */
               u_long   *ctr,   /* counter   */
               HNODEPTR *htab)  /* ptr>next  */
{
   HNODEPTR cptr,nptr;

   /* check if hashed */
   if ( (cptr = htab[hash(str)]) == NULL)
   {
      /* not hashed */
      if ( (nptr=new_hnode(str)) != NULL)
      {
         nptr->flag  = type;
         nptr->count = count;
         nptr->files = file;
         nptr->xfer  = xfer;
         nptr->next  = NULL;
         htab[hash(str)] = nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   else
   {
      /* hashed */
      while (cptr != NULL)
      {
         if (strcmp(cptr->string,str)==0)
         {
            if ((type==cptr->flag)||((type!=OBJ_GRP)&&(cptr->flag!=OBJ_GRP)))
            {
               /* found... bump counter */
               cptr->count+=count;
               cptr->files+=file;
               cptr->xfer +=xfer;
               return 0;
            }
         }
         cptr = cptr->next;
      }
      /* not found... */
      if ( (nptr = new_hnode(str)) != NULL)
      {
         nptr->flag  = type;
         nptr->count = count;
         nptr->files = file;
         nptr->xfer  = xfer;
         nptr->next  = htab[hash(str)];
         htab[hash(str)]=nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }

   if (nptr!=NULL)
   {
      /* set object type */
      if (type==OBJ_GRP) nptr->flag=OBJ_GRP;
      else if (isinlist(hidden_sites,nptr->string)!=NULL)
                         nptr->flag=OBJ_HIDE;
   }
   return nptr==NULL;
}

/*********************************************/
/* DEL_HLIST - delete host hash table        */
/*********************************************/

void	del_hlist(HNODEPTR *htab)
{
   /* free memory used by hash table */
   HNODEPTR aptr,temp;
   int i;

   for (i=0;i<MAXHASH;i++)
   {
      if (htab[i] != NULL)
      {
         aptr = htab[i];
         while (aptr != NULL)
         {
            temp = aptr->next;
            free (aptr);
            aptr = temp;
         }
         htab[i]=NULL;
      }
   }
}

/*********************************************/
/* NEW_UNODE - URL node creation             */
/*********************************************/

UNODEPTR new_unode(char *str)
{
   UNODEPTR newptr;

   if (sizeof(newptr->string) < strlen(str))
   {
      if (verbose)
      fprintf(stderr,"[new_unode] %s\n",msg_big_one);
   }
   if (( newptr = malloc(sizeof(struct unode))) != NULL)
   {
      strncpy(newptr->string, str, sizeof(newptr->string));
      newptr->count = 0;
      newptr->flag  = OBJ_REG;
   }
   return newptr;
}

/*********************************************/
/* PUT_UNODE - insert/update URL node        */
/*********************************************/

int put_unode(char *str, int type, u_long count, u_long xfer,
              u_long *ctr, UNODEPTR *htab)
{
   UNODEPTR cptr,nptr;

   if (str[0]=='-') return 0;

   /* check if hashed */
   if ( (cptr = htab[hash(str)]) == NULL)
   {
      /* not hashed */
      if ( (nptr=new_unode(str)) != NULL)
      {
         nptr->flag = type;
         nptr->count= count;
         nptr->xfer = xfer;
         nptr->next = NULL;
         htab[hash(str)] = nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   else
   {
      /* hashed */
      while (cptr != NULL)
      {
         if (strcmp(cptr->string,str)==0)
         {
            if ((type==cptr->flag)||((type!=OBJ_GRP)&&(cptr->flag!=OBJ_GRP)))
            {
               /* found... bump counter */
               cptr->count+=count;
               cptr->xfer += xfer;
               return 0;
            }
         }
         cptr = cptr->next;
      }
      /* not found... */
      if ( (nptr = new_unode(str)) != NULL)
      {
         nptr->flag = type;
         nptr->count= count;
         nptr->xfer = xfer;
         nptr->next = htab[hash(str)];
         htab[hash(str)]=nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   if (nptr!=NULL)
   {
      if (type==OBJ_GRP) nptr->flag=OBJ_GRP;
      else if (isinlist(hidden_urls,nptr->string)!=NULL)
                         nptr->flag=OBJ_HIDE;
   }
   return nptr==NULL;
}

/*********************************************/
/* DEL_ULIST - delete URL hash table         */
/*********************************************/

void	del_ulist(UNODEPTR *htab)
{
   /* free memory used by hash table */
   UNODEPTR aptr,temp;
   int i;

   for (i=0;i<MAXHASH;i++)
   {
      if (htab[i] != NULL)
      {
         aptr = htab[i];
         while (aptr != NULL)
         {
            temp = aptr->next;
            free (aptr);
            aptr = temp;
         }
         htab[i]=NULL;
      }
   }
}

/*********************************************/
/* NEW_RNODE - Referrer node creation        */
/*********************************************/

RNODEPTR new_rnode(char *str)
{
   RNODEPTR newptr;

   if (sizeof(newptr->string) < strlen(str))
   {
      if (verbose)
      fprintf(stderr,"[new_rnode] %s\n",msg_big_one);
   }
   if (( newptr = malloc(sizeof(struct rnode))) != NULL)
   {
      strncpy(newptr->string, str, sizeof(newptr->string));
      newptr->count = 1;
      newptr->flag  = OBJ_REG;
   }
   return newptr;
}

/*********************************************/
/* PUT_RNODE - insert/update referrer node   */
/*********************************************/

int put_rnode(char *str, int type, u_long count, u_long *ctr, RNODEPTR *htab)
{
   RNODEPTR cptr,nptr;

   if (str[0]=='-') strcpy(str,"- (Direct Request)");

   /* check if hashed */
   if ( (cptr = htab[hash(str)]) == NULL)
   {
      /* not hashed */
      if ( (nptr=new_rnode(str)) != NULL)
      {
         nptr->flag  = type;
         nptr->count = count;
         nptr->next  = NULL;
         htab[hash(str)] = nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   else
   {
      /* hashed */
      while (cptr != NULL)
      {
         if (strcmp(cptr->string,str)==0)
         {
            if ((type==cptr->flag)||((type!=OBJ_GRP)&&(cptr->flag!=OBJ_GRP)))
            {
               /* found... bump counter */
               cptr->count+=count;
               return 0;
            }
         }
         cptr = cptr->next;
      }
      /* not found... */
      if ( (nptr = new_rnode(str)) != NULL)
      {
         nptr->flag  = type;
         nptr->count = count;
         nptr->next  = htab[hash(str)];
         htab[hash(str)]=nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   if (nptr!=NULL)
   {
      if (type==OBJ_GRP) nptr->flag=OBJ_GRP;
      else if (isinlist(hidden_refs,nptr->string)!=NULL)
                         nptr->flag=OBJ_HIDE;
   }
   return nptr==NULL;
}

/*********************************************/
/* DEL_RLIST - delete referrer hash table    */
/*********************************************/

void	del_rlist(RNODEPTR *htab)
{
   /* free memory used by hash table */
   RNODEPTR aptr,temp;
   int i;

   for (i=0;i<MAXHASH;i++)
   {
      if (htab[i] != NULL)
      {
         aptr = htab[i];
         while (aptr != NULL)
         {
            temp = aptr->next;
            free (aptr);
            aptr = temp;
         }
         htab[i]=NULL;
      }
   }
}

/*********************************************/
/* NEW_ANODE - User Agent node creation      */
/*********************************************/

ANODEPTR new_anode(char *str)
{
   ANODEPTR newptr;

   if (sizeof(newptr->string) < strlen(str))
   {
      if (verbose)
      fprintf(stderr,"[new_anode] %s\n",msg_big_one);
   }
   if (( newptr = malloc(sizeof(struct anode))) != NULL)
   {
      strncpy(newptr->string, str, sizeof(newptr->string));
      newptr->count = 1;
      newptr->flag  = OBJ_REG;
   }
   return newptr;
}

/*********************************************/
/* PUT_ANODE - insert/update user agent node */
/*********************************************/

int put_anode(char *str, int type, u_long count, u_long *ctr, ANODEPTR *htab)
{
   ANODEPTR cptr,nptr;
   char     *cp1, *cp2;

   if (str[0]=='-') return 0;     /* skip bad user agents */

   /* Do we need to mangle? */
   if (mangle_agent)
   {
      cp2=str;
      cp1=strstr(str,"MSIE");     /* Internet exploder?   */
      if (cp1!=NULL)
      {
         while (*cp1!='.'&&*cp1!='\0') *cp2++=*cp1++;
         if (mangle_agent<5)
         {
            while (*cp1!='.'&&*cp1!='\0') *cp2++=*cp1++;
            *cp2++=*cp1++;
            *cp2++=*cp1++;
         }
         if (mangle_agent<4)
            if (*cp1>='0'&&*cp1<='9') *cp2++=*cp1++;
         if (mangle_agent<3)
            while (*cp1!=';'&&*cp1!='\0'&&*cp1!=')') *cp2++=*cp1++;
         if (mangle_agent<2)
         {
            /* Level 1 - try to get OS */
            cp1=strstr(str,")");
            if (cp1!=NULL)
            {
               *cp2++=' ';
               *cp2++='(';
               while (*cp1!=';'&&*cp1!='(') cp1--;
               cp1++;
               while (*cp1==' ') cp1++;
               while (*cp1!=')') *cp2++=*cp1++;
               *cp2++=')';
            }
         }
         *cp2='\0';
      }
      else
      {
         cp1=strstr(str,"Mozilla");  /* Netscape flavor      */
         if (cp1!=NULL)
         {
            while (*cp1!='/'&&*cp1!=' ') *cp2++=*cp1++;
            if (*cp1==' ') *cp1='/';
            while (*cp1!='.'&&*cp1!='\0') *cp2++=*cp1++;
            if (mangle_agent<5)
            {
               while (*cp1!='.'&&*cp1!='\0') *cp2++=*cp1++;
               *cp2++=*cp1++;
               *cp2++=*cp1++;
            }
            if (mangle_agent<4)
               if (*cp1>='0'&&*cp1<='9') *cp2++=*cp1++;
            if (mangle_agent<3)
               while (*cp1!=' '&&*cp1!='\0'&&*cp1!=')') *cp2++=*cp1++;
            if (mangle_agent<2)
            {
               /* Level 1 - Try to get OS */
               cp1=strstr(str,"(");
               if (cp1!=NULL)
               {
                  cp1++;
                  *cp2++=' ';
                  *cp2++='(';
                  while (*cp1!=';'&&*cp1!=')'&&*cp1!='\0') *cp2++=*cp1++;
                  *cp2++=')';
               }
            }
            *cp2='\0';
         }
      }
   }

   /* check if hashed */
   if ( (cptr = htab[hash(str)]) == NULL)
   {
      /* not hashed */
      if ( (nptr=new_anode(str)) != NULL)
      {
         nptr->flag = type;
         nptr->count= count;
         nptr->next = NULL;
         htab[hash(str)] = nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   else
   {
      /* hashed */
      while (cptr != NULL)
      {
         if (strcmp(cptr->string,str)==0)
         {
            if ((type==cptr->flag)||((type!=OBJ_GRP)&&(cptr->flag!=OBJ_GRP)))
            {
               /* found... bump counter */
               cptr->count+=count;
               return 0;
            }
         }
         cptr = cptr->next;
      }
      /* not found... */
      if ( (nptr = new_anode(str)) != NULL)
      {
         nptr->flag  = type;
         nptr->count = count;
         nptr->next  = htab[hash(str)];
         htab[hash(str)]=nptr;
         if (type!=OBJ_GRP) (*ctr)++;
      }
   }
   if (type==OBJ_GRP) nptr->flag=OBJ_GRP;
   else if (isinlist(hidden_agents,nptr->string)!=NULL)
                      nptr->flag=OBJ_HIDE;
   return nptr==NULL;
}

/*********************************************/
/* DEL_ALIST - delete user agent hash table  */
/*********************************************/

void	del_alist(ANODEPTR *htab)
{
   /* free memory used by hash table */
   ANODEPTR aptr,temp;
   int i;

   for (i=0;i<MAXHASH;i++)
   {
      if (htab[i] != NULL)
      {
         aptr = htab[i];
         while (aptr != NULL)
         {
            temp = aptr->next;
            free (aptr);
            aptr = temp;
         }
         htab[i]=NULL;
      }
   }
}

/*********************************************/
/* HASH - return hash value for string       */
/*********************************************/

u_long hash(char *str)
{
   u_long  hashval;
   for (hashval = 0; *str != '\0'; str++)
      hashval = *str + 31 * hashval;
   return hashval % MAXHASH;
}

/*********************************************/
/* ISINLIST - Test if string is in list      */
/*********************************************/

char *isinlist(NLISTPTR list, char *str)
{
   NLISTPTR lptr;

   lptr=list;
   while (lptr!=NULL)
   {
      if (isinstr(str,lptr->string)) return lptr->string;
      lptr=lptr->next;
   }
   return NULL;
}

/*********************************************/
/* ISINSTR - Scan for string in string       */
/*********************************************/

int isinstr(char *str, char *cp)
{
   char *cp1,*cp2;

   cp1=(cp+strlen(cp))-1;
   if (*cp=='*')
   {
      /* if leading wildcard, start from end */
      cp2=str+strlen(str)-1;
      while ( (cp1!=cp) && (cp2!=str))
      {
         if (*cp1=='*') return 1;
         if (*cp1--!=*cp2--) return 0;
      }
      if (cp1==cp) return 1;
      else return 0;
   }
   else
   {
      /* if no leading/trailing wildcard, just strstr */
      if (*cp1!='*') return(strstr(str,cp)!=NULL);
      /* otherwise do normal forward scan */
      cp1=cp; cp2=str;
      while (*cp2!='\0')
      {
         if (*cp1=='*') return 1;
         if (*cp1++!=*cp2++) return 0;
      }
      if (*cp1=='*') return 1;
         else return 0;
   }
}

/*********************************************/
/* CTRY_IDX - create unique # from domain    */
/*********************************************/

u_long ctry_idx(char *str)
{
   int i=strlen(str),j=0;
   u_long idx=0;
   char *cp1=str+i;
   for (;i>0;i--) { idx+=((*--cp1-'a'+1)<<j); j+=5; }
   return idx;
}

/*********************************************/
/* FROM_HEX - convert hex char to decimal    */
/*********************************************/

char from_hex(char c)                           /* convert hex to dec      */
{
   c = (c>='0'&&c<='9')?c-'0':                  /* 0-9?                    */
       (c>='A'&&c<='F')?c-'A'+10:               /* A-F?                    */
       c - 'a' + 10;                            /* lowercase...            */
   return (c<0||c>15)?0:c;                      /* return 0 if bad...      */
}

/*********************************************/
/* UNESCAPE - convert escape seqs to chars   */
/*********************************************/

char *unescape(char *str)
{
   char *cp1=str, *cp2=str;

   if (!str) return NULL;                       /* make sure strings valid */

   while (*cp1)
   {
      if (*cp1=='%')                            /* Found an escape?        */
      {
         cp1++;
         if ((*cp1>'1')&&(*cp1<'8'))
         {
            if (*cp1) *cp2=from_hex(*cp1++)*16; /* convert hex to an ascii */
            if (*cp1) *cp2+=from_hex(*cp1);     /* (hopefully) character   */
            if (*cp2<32||*cp2>126) *cp2='_';    /* make underscore if bad  */
            cp2++; cp1++;
         }
         else *cp2++='%';
      }
      else *cp2++ = *cp1++;                     /* if not, just continue   */
   }
   *cp2=*cp1;                                   /* don't forget terminator */
   return str;                                  /* return the string       */
}

/***************************************************************************/
/*                                                                         */
/* Incremental processing.  Incremental processing allows using partial    */
/* logs to create the full monthly report.  It is accomplished by saving   */
/* and restoring the 'internal state' of the program.  With this feature   */
/* turned on, all relevant internal data is saved to a file at the end     */
/* of normal processing.  The next time the program is run, this state     */
/* data is restored so processing can begin where it had left off.  In     */
/* order for this scheme to work, care must be taken not to process the    */
/* same log file more than once, or duplication will result.               */
/*                                                                         */
/***************************************************************************/

/*********************************************/
/* SAVE_STATE - save internal data structs   */
/*********************************************/

void save_state()
{
   HNODEPTR hptr;
   UNODEPTR uptr;
   RNODEPTR rptr;
   ANODEPTR aptr;

   FILE *fp;
   int  i;

   /* Open data file for write */
   fp=fopen(state_fname,"w");
   if (fp==NULL)
   {
      /* Error: Unable to save current run data */
      if (verbose) fprintf(stderr,"%s\n",msg_data_err);
   }
   else
   {
      /* Saving current run data... */
      if (verbose>1) printf("%s\n",msg_put_data);

      /* first, save the easy stuff */
      fprintf(fp,"%d %d %d %d %d %d\n",
        cur_year, cur_month, cur_day, cur_hour, cur_min, cur_sec);
      fprintf(fp,"%lu %lu %lu %lu %lu %lu %.0f\n",
        t_hit, t_file, t_site, t_url,
        t_ref, t_agent, t_xfer);
      fprintf(fp,"%lu %lu %lu %d %d\n",
        dt_site, ht_hit, mh_hit, f_day, l_day);
      for (i=0;i<31;i++)
         fprintf(fp,"%lu %lu %lu %lu\n",
          tm_hit[i],tm_file[i],tm_xfer[i],tm_site[i]);
      for (i=0;i<24;i++)
         fprintf(fp,"%lu %lu %lu\n",
          th_hit[i],th_file[i],th_xfer[i]);
      for (i=0;i<TOTAL_RC;i++)
         fprintf(fp,"%lu\n",response[i].count);

      /* now we need to save our linked lists */

      for (i=0;i<MAXHASH;i++)
      {
         hptr=sm_htab[i];                       /* Daily hostname table    */
         while (hptr!=NULL)
         {
            fprintf(fp,"%s %d %lu %lu %lu\n",
              hptr->string,
              hptr->flag,
              hptr->count,
              hptr->files,
              hptr->xfer);
            hptr=hptr->next;
         }
      }
      fprintf(fp,"0 0 0 0 0\n");

      for (i=0;i<MAXHASH;i++)                   /* Hourly hostname table   */
      {
         hptr=sd_htab[i];
         while (hptr!=NULL)
         {
            fprintf(fp,"%s %d %lu %lu %lu\n", hptr->string,
             hptr->flag, hptr->count, hptr->files, hptr->xfer);
            hptr=hptr->next;
         }
      }
      fprintf(fp,"0 0 0 0 0\n");

      for (i=0;i<MAXHASH;i++)                   /* URL table               */
      {
         uptr=um_htab[i];
         while (uptr!=NULL)
         {
            fprintf(fp,"%s\n%d %lu %lu %lu\n", uptr->string,
              uptr->flag, uptr->count, uptr->files, uptr->xfer);
            uptr=uptr->next;
         }
      }
      fprintf(fp,"0\n0 0 0 0\n");

      if (t_ref != 0)                           /* Referrer table          */
      {
         for (i=0;i<MAXHASH;i++)
         {
            rptr=rm_htab[i];
            while (rptr!=NULL)
            {
               fprintf(fp,"%s\n%d %lu\n", rptr->string,
                 rptr->flag, rptr->count);
               rptr=rptr->next;
            }
         }
      }
      fprintf(fp,"0\n0 0\n");

      if (t_agent != 0)                         /* User Agent table        */
      {
         for (i=0;i<MAXHASH;i++)
         {
            aptr=am_htab[i];
            while (aptr!=NULL)
            {
               fprintf(fp,"%s\n%d %lu\n", aptr->string,
                 aptr->flag, aptr->count);
               aptr=aptr->next;
            }
         }
      }
      fprintf(fp,"0\n0 0\n");
      fclose(fp);
   }
}

/*********************************************/
/* RESTORE_STATE - reload internal run data  */
/*********************************************/

void restore_state()
{
   FILE *fp;
   int  i;
   struct hnode t_hnode;
   struct unode t_unode;
   struct rnode t_rnode;
   struct anode t_anode;

   fp=fopen(state_fname,"r");
   if (fp==NULL)
   {
      /* Previous run data not found... */
      if (verbose) fprintf(stderr,"%s\n",msg_no_data);
   }
   else
   {
      /* Reading previous run data... */
      if (verbose>1) printf("%s: ",msg_get_data);

      /* get easy stuff */
      if ((fgets(buffer,BUFSIZE,fp)) != NULL)
         sscanf(buffer,"%d %d %d %d %d %d",
          &cur_year, &cur_month, &cur_day,
          &cur_hour, &cur_min, &cur_sec);

      sprintf(cur_tstamp,"%04d%02d%02d%02d%02d%02d",
          cur_year, cur_month, cur_day, cur_hour, cur_min, cur_sec);

      if ((fgets(buffer,BUFSIZE,fp)) != NULL)
         sscanf(buffer,"%lu %lu %lu %lu %lu %lu %lf",
          &t_hit, &t_file, &t_site, &t_url,
          &t_ref, &t_agent, &t_xfer);
     
      if ((fgets(buffer,BUFSIZE,fp)) != NULL)
         sscanf(buffer,"%lu %lu %lu %d %d",
          &dt_site, &ht_hit, &mh_hit, &f_day, &l_day);

      /* get daily totals */
      for (i=0;i<31;i++)
      {
         if ((fgets(buffer,BUFSIZE,fp)) != NULL)
          sscanf(buffer,"%lu %lu %lu %lu",
           &tm_hit[i],&tm_file[i],&tm_xfer[i],&tm_site[i]);
      }

      /* get hourly totals */
      for (i=0;i<24;i++)
      {
         if ((fgets(buffer,BUFSIZE,fp)) != NULL)
          sscanf(buffer,"%lu %lu %lu",
           &th_hit[i],&th_file[i],&th_xfer[i]);
      }

      /* get response code totals */
      for (i=0;i<TOTAL_RC;i++)
      {
         if ((fgets(buffer,BUFSIZE,fp)) != NULL)
          sscanf(buffer,"%lu",&response[i].count);
      }

      /* now do hash tables */

      while ((fgets(buffer,BUFSIZE,fp)) != NULL)
      {
         sscanf(buffer,"%s %d %lu %lu %lu",
          t_hnode.string,&t_hnode.flag,&t_hnode.count,
          &t_hnode.files, &t_hnode.xfer);

         /* Check for end of table */
         if ((t_hnode.count == 0) && (!strcmp(t_hnode.string,"0"))) break;

         /* Good record, insert into hash table */
         if (put_hnode(t_hnode.string,t_hnode.flag,
             t_hnode.count,t_hnode.files,t_hnode.xfer,&ul_bogus,sm_htab))
         {
            if (verbose)
            /* Error adding host node (monthly), skipping .... */
            fprintf(stderr,"%s %s\n",msg_nomem_mh, t_hnode.string);
         }
      }

      while ((fgets(buffer,BUFSIZE,fp)) != NULL)
      {
         sscanf(buffer,"%s %d %lu %lu %lu",
          t_hnode.string,&t_hnode.flag,&t_hnode.count,
          &t_hnode.files, &t_hnode.xfer);

         /* Check for end of table */
         if ((t_hnode.count == 0) && (!strcmp(t_hnode.string,"0"))) break;

         /* Good record, insert into hash table */
         if (put_hnode(t_hnode.string,t_hnode.flag,
             t_hnode.count,t_hnode.files,t_hnode.xfer,&ul_bogus,sd_htab))
         {
            if (verbose)
            /* Error adding host node (monthly), skipping .... */
            fprintf(stderr,"%s %s\n",msg_nomem_dh, t_hnode.string);
         }
      }

      while ((fgets(t_unode.string,sizeof(t_unode.string),fp)) != NULL)
      {
         for (i=0;i<strlen(t_unode.string);i++)
            if (t_unode.string[i]=='\n') t_unode.string[i]='\0';
         if ((fgets(buffer,BUFSIZE,fp)) == NULL) break;
         sscanf(buffer,"%d %lu %lu %lu",
          &t_unode.flag,&t_unode.count,
          &t_unode.files, &t_unode.xfer);
         /* Check for end of table */
         if ((t_unode.count == 0) && (!strcmp(t_unode.string,"0"))) break;
         /* Good record, insert into hash table */
         if (put_unode(t_unode.string,t_unode.flag,t_unode.count,
            t_unode.xfer,&ul_bogus,um_htab))
         {
            if (verbose)
            /* Error adding URL node, skipping ... */
            fprintf(stderr,"%s %s\n", msg_nomem_u, t_unode.string);
         }
      }

      while ((fgets(t_rnode.string,sizeof(t_rnode.string),fp)) != NULL)
      {
         for (i=0;i<strlen(t_rnode.string);i++)
            if (t_rnode.string[i]=='\n') t_rnode.string[i]='\0';
         if ((fgets(buffer,BUFSIZE,fp)) == NULL) break;
         sscanf(buffer,"%d %lu",
          &t_rnode.flag,&t_rnode.count);
         if ((t_rnode.count == 0) && (!strcmp(t_rnode.string,"0"))) break;
         /* insert node */
         if (put_rnode(t_rnode.string,t_rnode.flag,
                       t_rnode.count, &ul_bogus, rm_htab))
         {
            if (verbose)
             fprintf(stderr,"%s %s\n", msg_nomem_r, log_rec.refer);
         }
      }

      while ((fgets(t_anode.string,sizeof(t_anode.string),fp)) != NULL)
      {
         for (i=0;i<strlen(t_anode.string);i++)
            if (t_anode.string[i]=='\n') t_anode.string[i]='\0';
         if ((fgets(buffer,BUFSIZE,fp)) == NULL) break;
         sscanf(buffer,"%d %lu",
          &t_anode.flag,&t_anode.count);
         if ((t_anode.count == 0) && (!strcmp(t_anode.string,"0"))) break;
         /* insert node */
         if (put_anode(t_anode.string,t_anode.flag,t_anode.count,
                       &ul_bogus,am_htab))
         {
            if (verbose)
              fprintf(stderr,"%s %s\n", msg_nomem_a, log_rec.agent);
         }
      }

      fclose(fp);
      check_dup = 1;              /* enable duplicate checking */
      if (verbose>1) printf("%02d-%s-%04d %02d:%02d:%02d\n",
         cur_day, s_month[cur_month-1], cur_year,
         cur_hour, cur_min, cur_sec);
   }
}

