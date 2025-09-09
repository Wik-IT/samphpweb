<?php
header('Content-Type: application/json');

$url = "http://10.0.5.222:8000/status.xsl";
$html = @file_get_contents($url);

if ($html) {
    // cautÄ textul "Current Song" din status.xsl
    if (preg_match('/Current Song:\s*<\/td>\s*<td[^>]*>(.*?)<\/td>/i', $html, $matches)) {
        $title = trim($matches[1]);

        // Ã®mpÄrÈim Ã®n Artist - Titlu (dacÄ existÄ separator)
        $parts = explode(" - ", $title, 2);

        echo json_encode([
            "artist" => $parts[0] ?? "Unknown Artist",
            "title"  => $parts[1] ?? "Unknown Title"
        ]);
        exit;
    }
}

echo json_encode([
    "artist" => "Unknown Artist",
    "title"  => "Unknown Title"
]);
