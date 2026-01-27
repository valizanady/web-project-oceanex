<?php
/**
 * Router for PHP Built-in Server
 * Handles clean URLs without .html extension
 */

$request_uri = $_SERVER['REQUEST_URI'];
$request_path = parse_url($request_uri, PHP_URL_PATH);

// Remove trailing slash
$request_path = rtrim($request_path, '/');

// If empty (homepage), serve index.html
if (empty($request_path) || $request_path === '/') {
    $request_path = '/index';
}

// Try to find the corresponding .html file
$file_path = __DIR__ . $request_path . '.html';

if (file_exists($file_path)) {
    // Serve the HTML file
    $content = file_get_contents($file_path);
    header('Content-Type: text/html; charset=utf-8');
    echo $content;
    exit;
}

// Check if it's a directory with index.html
if (is_dir(__DIR__ . $request_path)) {
    $index_file = __DIR__ . $request_path . '/index.html';
    if (file_exists($index_file)) {
        $content = file_get_contents($index_file);
        header('Content-Type: text/html; charset=utf-8');
        echo $content;
        exit;
    }
}

// If file exists as requested, serve it (for CSS, JS, images, etc.)
$direct_file = __DIR__ . $request_uri;
if (file_exists($direct_file) && is_file($direct_file)) {
    return false; // Let PHP built-in server handle it
}

// 404 - Not Found
http_response_code(404);
echo "<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 100px;
            background: #f5f5f5;
        }
        h1 {
            color: #062351;
        }
        a {
            color: #b8860b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>404 - Page Not Found</h1>
    <p>The page you are looking for does not exist.</p>
    <p><a href='/'>← Back to Homepage</a></p>
</body>
</html>";
