<?php

$xml = simplexml_load_file('scufundari.xml') or die("Error: Cannot create object");
function simplexmlToHtml($xml) {
    $html = '';

    foreach ($xml->children() as $child) {
        if ($child->getName() == 'math') {
            $html .= $child->asXML();
        } elseif ($child->getName() == 'svg') {
            $html .= $child->asXML();
        } else {
            $html .= '<' . $child->getName() . '>';
            if ($child->count() > 0) {
                $html .= simplexmlToHtml($child);
            } else {
                $html .= htmlspecialchars($child);
            }
            $html .= '</' . $child->getName() . '>';
        }
    }

    return $html;
}

echo '<html>';
echo '<head>';
echo '<title>Document XML</title>';
echo '<style>
    body {
        font-family: Arial, sans-serif;
    }
    </style>';
echo '</head>';
echo '<body>';

echo '<h1>' . htmlspecialchars($xml->section->title) . '</h1>';
echo simplexmlToHtml($xml->section->content);

echo '</body>';
echo '</html>';
?>
