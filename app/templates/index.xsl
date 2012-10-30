<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output
		method="html"
		omit-xml-declaration="yes"
		doctype-system="about:legacy-compat"
		encoding="UTF-8"
		indent="yes" />
		
		
	<xsl:template match="response">
		<html>
			<head>
				<title>Ola from XSL</title>
			</head>
			<body>
				<p>hello from XSL</p>
				<textarea rows="10" cols="100">
					<xsl:copy-of select="." />
				</textarea>
			</body>
		</html>
	</xsl:template>	
		
</xsl:stylesheet>