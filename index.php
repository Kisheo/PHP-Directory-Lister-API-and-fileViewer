<?php
$baseDir = __DIR__; // Root directory is the current directory of the script

function listDirectory($dir) {
    $result = [];
    $files = scandir($dir);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        
        $path = "$dir/$file";
        $result[] = [
            'name' => $file,
            'isFile' => is_file($path)
        ];
    }
    
    return $result;
}

$requestPath = isset($_GET['path']) ? $_GET['path'] : '';
$absPath = realpath($baseDir . '/' . $requestPath);

if ($absPath === false || strpos($absPath, realpath($baseDir)) !== 0) {
    http_response_code(404);
    echo json_encode(['error' => 'Path not found']);
    exit;
}

if (is_file($absPath)) {
    $fileInfo = pathinfo($absPath);
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $fileInfo['basename'] . '"');
    readfile($absPath);
    exit;
}

header('Content-Type: application/json');
echo json_encode(listDirectory($absPath));
