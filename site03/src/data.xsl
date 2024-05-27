<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Listă Adepți</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    table, th, td {
                        border: 1px solid black;
                    }
                    th, td {
                        padding: 10px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    img {
                        max-width: 100px;
                        height: auto;
                    }
                </style>
            </head>
            <body>
                <h1>Listă Adepți</h1>
                <table>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Domiciliu</th>
                        <th>Parolă</th>
                        <th>Imagine</th>
                    </tr>
                    <xsl:for-each select="adepti/infadepti/adept">
                        <tr>
                            <td><xsl:value-of select="nume"/></td>
                            <td><xsl:value-of select="prenume"/></td>
                            <td><xsl:value-of select="domiciliu"/></td>
                            <td><xsl:value-of select="parola"/></td>
                            <td>
                                <xsl:choose>
                                    <xsl:when test="image != 'null'">
                                        <img src="data:image/jpeg;base64,{image}" alt="Imagine utilizator"/>
                                    </xsl:when>
                                    <xsl:otherwise>
                                        Nu există nicio imagine încărcată pentru acest utilizator.
                                    </xsl:otherwise>
                                </xsl:choose>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>