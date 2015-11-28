<?xml version = "1.0" encoding = "UTF-8" ?> 

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

<xsl:output method="xml" encoding="UTF-8" indent="yes"/>

<xsl:template match = "html">

<doc>
	<field name="title">
		<xsl:value-of select="head/title"/>
	</field>
	
</doc>

</xsl:template>

</xsl:stylesheet>
