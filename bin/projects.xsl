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
   <xsl:element name="a">
    <xsl:attribute name="href">
     <xsl:value-of select="url_homepage" />
    </xsl:attribute>
    <b><xsl:value-of select="projectname_full" /></b>
   </xsl:element>
   <xsl:text> -- </xsl:text>
   <xsl:value-of select="desc_short" />
   <br />
   License: <xsl:value-of select="license" />
   <xsl:text> -- </xsl:text>
   Updated: <i><xsl:value-of select="date_updated" /></i>
   <br />
   <br />
   <xsl:value-of select="desc_full" />
   <hr noshade="1" size="1" color="#000000" />
 </xsl:for-each>
</xsl:template>

</xsl:stylesheet>
