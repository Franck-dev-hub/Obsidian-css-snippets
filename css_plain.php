<?php
$output_file_name = "language_folder.css";

$folders = [
    [ "name" => "api",          "color" => "#05d270", "textColor" => "#000000"],
    [ "name" => "assembleur",   "color" => "#6e4c13", "textColor" => "#000000"],
    [ "name" => "bash",         "color" => "#4eaa25", "textColor" => "#000000"],
    [ "name" => "c",            "color" => "#659AD2", "textColor" => "#000000"],
    [ "name" => "c#",           "color" => "#9179E4", "textColor" => "#ffffff"],
    [ "name" => "c++",          "color" => "#00599c", "textColor" => "#ffffff"],
    [ "name" => "certbot",      "color" => "#ef3b39", "textColor" => "#000000"],
    [ "name" => "css",          "color" => "#1572b6", "textColor" => "#000000"],
    [ "name" => "docker",       "color" => "#2496ed", "textColor" => "#000000"],
    [ "name" => "emagma",       "color" => "#e41c24", "textColor" => "#ffffff"],
    [ "name" => "firefox",      "color" => "#ff7139", "textColor" => "#000000"],
    [ "name" => "gdscript",     "color" => "#478cbf", "textColor" => "#000000"],
    [ "name" => "git",          "color" => "#f05032", "textColor" => "#ffffff"],
    [ "name" => "html",         "color" => "#e34f26", "textColor" => "#000000"],
    [ "name" => "javascript",   "color" => "#f7df1e", "textColor" => "#000000"],
    [ "name" => "linux",        "color" => "#fcc624", "textColor" => "#000000"],
    [ "name" => "llm",          "color" => "#06b6d4", "textColor" => "#000000"],
    [ "name" => "lua",          "color" => "#000080", "textColor" => "#ffffff"],
    [ "name" => "markdown",     "color" => "#ffffff",  "textColor" => "#000000"],
    [ "name" => "mermaid",      "color" => "#ff3785", "textColor" => "#000000"],
    [ "name" => "obsidian",     "color" => "#8B5CF6", "textColor" => "#ffffff"],
    [ "name" => "php",          "color" => "#777BB3", "textColor" => "#ffffff"],
    [ "name" => "python",       "color" => "#306998", "textColor" => "#FFD43B"],
    [ "name" => "rust",         "color" => "#dea584", "textColor" => "#000000"],
    [ "name" => "sql",          "color" => "#cc7832", "textColor" => "#ffffff"],
    [ "name" => "sublime text", "color" => "#ff9800", "textColor" => "#000000"],
    [ "name" => "sylius",       "color" => "#22B99A", "textColor" => "#000000"],
    [ "name" => "symfony",      "color" => "#000000", "textColor" => "#ffffff"],
    [ "name" => "typescript",   "color" => "#3178C6", "textColor" => "#ffffff"],
    [ "name" => "ubuntu",       "color" => "#E95420", "textColor" => "#ffffff"],
    [ "name" => "windows",      "color" => "#00a4ef", "textColor" => "#000000"],
];

// Folder svg
function svgFolder(string $color): string {
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>';
    return 'url("data:image/svg+xml,' . rawurlencode($svg) . '")';
}

// File svg
function svgFile(string $color): string {
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="' . $color . '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.364 13.634a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506l4.013-4.009a1 1 0 0 0-3.004-3.004z"/><path d="M14.487 7.858A1 1 0 0 1 14 7V2"/><path d="M20 19.645V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l2.516 2.516"/><path d="M8 18h1"/></svg>';
    return 'url("data:image/svg+xml,' . rawurlencode($svg) . '")';
}

function generateBlock(string $name, string $color, string $textColor): string {
    $title = ucwords($name);
    $folderIcon = svgFolder($color);
    $fileIcon   = svgFile($color);
    return "/* --- $title --- */\n"
        . ".nav-folder-title[data-path*=\"$name\" i] .tree-item-inner,\n"
        . ".nav-file-title[data-path*=\"$name\" i] .tree-item-inner { background-color: $color; color: $textColor;}\n"
        . ".nav-folder-title[data-path*=\"$name\" i] ~ .nav-folder-children { border-left: 1px solid $color; }\n"
        . ".nav-folder-title[data-path*=\"$name\" i]::before { content: $folderIcon; }\n"
        . ".nav-file-title[data-path*=\"$name\" i]::before   { content: $fileIcon; }\n";
}

$defaultFolder = svgFolder('#888888');
$defaultFile   = svgFile('#888888');

$common = "/* Common styles */\n"
        . ".nav-folder-title .tree-item-inner,\n"
        . ".nav-file-title .tree-item-inner {\n"
        . "\tborder-radius: 4px;\n"
        . "\tpadding: 2px 6px;\n"
        . "\tdisplay: block;\n"
        . "\twidth: 100%;\n"
        . "\tbox-sizing: border-box;\n"
        . "}\n\n"
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
    fn($f) => generateBlock($f['name'], $f['color'], $f['textColor']),
    $folders
));

file_put_contents($output_file_name, $output);
echo "$output_file_name generated with success !\n";