<?php
$logPath = 'log/' . PATH_LOG;

if (file_exists($logPath)) {
    $logLines = file($logPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    echo "<ol>";
    foreach ($logLines as $line) {
        $parts = explode('|', $line);
        if (count($parts) >= 3) {
            $dt = date('d-m-Y H:i:s', (int)$parts[0]);
            $page = htmlspecialchars($parts[1]);
            $ref = htmlspecialchars($parts[2]);
            
            echo "<li>$dt - $page &rarr; $ref</li>";
        }
    }
    echo "</ol>";
} else {
    echo "<p>Журнал посещений пуст.</p>";
}
?>