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
 encoding="ISO-8859-1"
/>

<!-- To parse PHP projects in Freshmeat.net -->
<xsl:template match="/">
  <table border="0" cellpadding="4" cellspacing="0" bgcolor="#e0e0e0">
  <xsl:apply-templates select="/search-results" />
  </table>
</xsl:template>

<xsl:template match="/search-results">
 <!-- Loop through all the matches -->
 <xsl:for-each select="match">
   <tr><td>
   <xsl:element name="a">
    <xsl:attribute name="href">
     <xsl:value-of select="url_homepage" />
    </xsl:attribute>
    <b><xsl:value-of select="projectname_full" /></b>
   </xsl:element>
   <xsl:text> -- </xsl:text>
   <xsl:value-of select="desc_short" />
   <br /><small>
   License: <xsl:value-of select="license" />
   <xsl:text> -- </xsl:text>
   Updated: <i><xsl:value-of select="date_updated" /></i></small>
   </td></tr><tr><td>
   <table border="0" cellpadding="3" cellspacing="0" width="100%">
   <tr><td bgcolor="#f0f0f0"><xsl:value-of select="desc_full" /><br /><br /></td></tr></table>
   </td></tr>
 </xsl:for-each>
</xsl:template>

</xsl:stylesheet>
