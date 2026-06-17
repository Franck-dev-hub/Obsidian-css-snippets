<?php
$output_file_name = "language_folder.css";

$folders = [
    [ "name" => "api",          "color" => "#05d270"],
    [ "name" => "assembleur",   "color" => "#6e4c13"],
    [ "name" => "bash",         "color" => "#4eaa25"],
    [ "name" => "c",            "color" => "#659AD2"],
    [ "name" => "c#",           "color" => "#9179E4"],
    [ "name" => "c++",          "color" => "#00599c"],
    [ "name" => "certbot",      "color" => "#ef3b39"],
    [ "name" => "css",          "color" => "#1572b6"],
    [ "name" => "docker",       "color" => "#2496ed"],
    [ "name" => "emagma",       "color" => "#e41c24"],
    [ "name" => "firefox",      "color" => "#ff7139"],
    [ "name" => "gdscript",     "color" => "#478cbf"],
    [ "name" => "git",          "color" => "#f05032"],
    [ "name" => "html",         "color" => "#e34f26"],
    [ "name" => "javascript",   "color" => "#f7df1e"],
    [ "name" => "linux",        "color" => "#fcc624"],
    [ "name" => "llm",          "color" => "#06b6d4"],
    [ "name" => "lua",          "color" => "#000080"],
    [ "name" => "markdown",     "color" => "#ffffff"],
    [ "name" => "mermaid",      "color" => "#ff3785"],
    [ "name" => "obsidian",     "color" => "#8B5CF6"],
    [ "name" => "php",          "color" => "#777BB3"],
    [ "name" => "python",       "color" => "#306998"],
    [ "name" => "rust",         "color" => "#dea584"],
    [ "name" => "sql",          "color" => "#cc7832"],
    [ "name" => "sublime text", "color" => "#ff9800"],
    [ "name" => "sylius",       "color" => "#22B99A"],
    [ "name" => "symfony",      "color" => "#ffffff"],
    [ "name" => "typescript",   "color" => "#3178C6"],
    [ "name" => "ubuntu",       "color" => "#E95420"],
    [ "name" => "windows",      "color" => "#00a4ef"],
];

$textColor = "#ffffff";

// Folder svg
function svgFolder(string $color): string {
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="' . $color . '" fill-opacity="0.25" stroke="' . $color . '" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>';
    return 'url("data:image/svg+xml,' . rawurlencode($svg) . '")';
}

// File svg
function svgFile(string $color): string {
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.364 13.634a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506l4.013-4.009a1 1 0 0 0-3.004-3.004z"/><path d="M14.487 7.858A1 1 0 0 1 14 7V2"/><path d="M20 19.645V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l2.516 2.516"/><path d="M8 18h1"/></svg>';
    return 'url("data:image/svg+xml,' . rawurlencode($svg) . '")';
}

function generateBlock(string $name, string $color, string $textColor): string {
    $title = ucwords($name);
    $folderIcon = svgFolder($color);
    $fileIcon   = svgFile($color);
    return "/* --- $title --- */\n"
        . ".nav-folder-title[data-path*=\"$name\" i] .tree-item-inner,\n"
        . ".nav-file-title[data-path*=\"$name\" i] .tree-item-inner { border-left: 1px solid $color; color: $textColor;}\n"
        . ".nav-folder-title[data-path*=\"$name\" i] ~ .nav-folder-children { border-left: 1px solid $color; }\n"
        . ".nav-folder-title[data-path*=\"$name\" i]::before { content: $folderIcon; }\n"
        . ".nav-file-title[data-path*=\"$name\" i]::before   { content: $fileIcon; }\n";
}

$defaultColor  = '#667eea';
$defaultFolder = svgFolder($defaultColor);
$defaultFile   = svgFile($defaultColor);

$common = "/* Common styles */\n"
        . ".nav-folder-title .tree-item-inner,\n"
        . ".nav-file-title .tree-item-inner {\n"
        . "\tborder-radius: 4px;\n"
        . "\tpadding: 2px 6px;\n"
        . "\tdisplay: block;\n"
        . "\twidth: 100%;\n"
        . "\tbox-sizing: border-box;\n"
        . "\tborder-left: 1px solid $defaultColor;\n"
        . "\tcolor: #ffffff;\n"
        . "}\n\n"
        . "/* Default folder children border */\n"
        . ".nav-folder-title ~ .nav-folder-children { border-left: 1px solid $defaultColor; }\n\n"
        . "/* Default icons */\n"
        . ".nav-folder-title .nav-folder-collapse-indicator { display: none; }\n"
        . ".nav-folder-title::before {\n"
        . "\tcontent: $defaultFolder;\n"
        . "\tdisplay: inline-block;\n"
        . "\twidth: 14px;\n"
        . "\theight: 14px;\n"
        . "\tmargin-right: 6px;\n"
        . "\tvertical-align: middle;\n"
        . "}\n"
        . ".nav-file-title::before {\n"
        . "\tcontent: $defaultFile;\n"
        . "\tdisplay: inline-block;\n"
        . "\twidth: 14px;\n"
        . "\theight: 14px;\n"
        . "\tmargin-right: 6px;\n"
        . "\tvertical-align: middle;\n"
        . "}\n\n";

$output = $common . implode("\n", array_map(
    fn($f) => generateBlock($f['name'], $f['color'], $textColor),
    $folders
));

file_put_contents($output_file_name, $output);
echo "$output_file_name generated with success !\n";