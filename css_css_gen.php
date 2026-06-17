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
    [ "name" => "lua",          "color" => "#000080", "textColor" => "#000000"],
    [ "name" => "markdown",     "color" => "#ffffff", "textColor" => "#000000"],
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

function generateBlock(string $name, string $color, string $textColor): string {
    $title = ucwords($name);
    return "/* $title */\n"
        . ".nav-folder-title[data-path*=\"$name\" i] ~ .nav-folder-children { border-left-color: $color; }\n"
        . ".nav-folder-title[data-path*=\"$name\" i] .tree-item-inner,\n"
        . ".nav-file-title[data-path*=\"$name\" i] .tree-item-inner {\n"
        . "\tbackground-color: $color;\n"
        . "\tcolor: $textColor;\n"
        . "}\n";
}

$common = ".nav-folder-title .tree-item-inner,\n"
        . ".nav-file-title .tree-item-inner {\n"
        . "\tborder-radius: 4px;\n"
        . "\tpadding: 2px 6px;\n"
        . "\tdisplay: block;\n"
        . "\twidth: 100%;\n"
        . "\tbox-sizing: border-box;\n"
        . "}\n\n";

$output = $common . implode("\n", array_map(
    fn($f) => generateBlock($f['name'], $f['color'], $f['textColor']),
    $folders
));

file_put_contents($output_file_name, $output);
echo "$output_file_name generated with success !\n";