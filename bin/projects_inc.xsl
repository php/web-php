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

<xsl:output
 method="html"
 indent="no"
/>

<!-- To parse PHP projects in Freshmeat.net -->
<!-- generating an array to be included and manipulated in projects.php -->
<xsl:template match="/">
 <xsl:processing-instruction name="php">
	 <xsl:text>
// Created using projects_inc.xsl and projects.xml, do not edit manually
		</xsl:text>
  <xsl:apply-templates select="/search-results" />
	<xsl:text>
?</xsl:text></xsl:processing-instruction>
</xsl:template>

<xsl:template match="/search-results">
 <!-- Loop through all the matches -->
 <xsl:for-each select="match/*">
	 <xsl:variable name="count" select="../match_count - 1" />
  $project[<xsl:value-of select="$count" />]["<xsl:value-of 
		select="name()" />"]="<xsl:value-of select="." /><xsl:text>";</xsl:text>
 </xsl:for-each>
</xsl:template>

</xsl:stylesheet>
