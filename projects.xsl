<!DOCTYPE xsl:stylesheet [
  <!ENTITY % iso-lat1 SYSTEM "iso-lat1.ent">
  <!ENTITY % iso-lat2 SYSTEM "iso-lat2.ent">
  <!ENTITY % iso-num  SYSTEM "iso-num.ent">
  <!ENTITY % iso-pub  SYSTEM "iso-pub.ent">
  %iso-lat1;
  %iso-lat2;
  %iso-num;
  %iso-pub;
]>

<xsl:stylesheet version="1.0"
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
 <!-- xmlns="http://www.w3.org/1999/xhtml" -->

<xsl:output
 method="html"
 indent="no"
 encoding="iso-8859-1"
/>

<!-- To parse PHP projects in Freshmeat.net -->
<!-- trying to match look of existing projects.php page -->
<xsl:template match="/">
  <xsl:apply-templates select="/search-results" />
</xsl:template>

<xsl:template match="/search-results">
 <!-- Loop through all the matches -->
 <xsl:for-each select="match">
 <tr bgcolor="#D0D0D0" valign="top">
  <td align="left"><img alt=" " src="/gifs/gcap-lefttop.gif" width="18" 
   height="18" border="0" /><br /></td>
  <td align="left" rowspan="2">
   <font face="tahoma, verdana, arial, helvetica, sans-serif" size="-1">
   <b><xsl:value-of select="projectname_full" /></b>
   <xsl:text> -- </xsl:text>
   <xsl:value-of select="desc_short" />
   <br />
   <xsl:element name="a">
    <xsl:attribute name="href">
     <xsl:value-of select="url_homepage" />
    </xsl:attribute>
    <xsl:value-of select="url_homepage" />
   </xsl:element>
   <br />
   License: <xsl:value-of select="license" />
   <xsl:text> - </xsl:text>
   Updated: <i><xsl:value-of select="date_updated" /></i>
   </font>
  </td>
  <td align="right"><img alt=" " src="/gifs/gcap-righttop.gif" width="18"
   height="18" border="0" /><br /></td>
 </tr>
 <tr valign="bottom" bgcolor="#D0D0D0">
  <td align="left"><img alt=" " src="/gifs/gcap-leftbot.gif" width="18" 
   height="18" border="0" /><br /></td>
  <td align="right"><img alt=" " src="/gifs/gcap-rightbot.gif" width="18"
   height="18" border="0" /><br /></td>
 </tr>
 <tr valign="top">
  <td width="18"><br /></td>
  <td align="left">
   <table border="0" cellpadding="5" cellspacing="0" bgcolor="#F0F0F0" width="100%">
     <tr>
      <td>
       <font face="tahoma, verdana, arial, helvetica, sans-serif" size="-1">
       <xsl:value-of select="desc_full" />
       </font>
      <br/>
     </td>
    </tr>
   </table>
  </td>
  <td width="18"><br /></td>
 </tr>
 </xsl:for-each>
</xsl:template>

</xsl:stylesheet>
