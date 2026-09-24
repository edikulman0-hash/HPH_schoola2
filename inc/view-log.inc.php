<?php
$logPath = 'log/' . PATH_LOG;

/* Очистка файла журнала */
if (isset($_GET['clear'])) {
    if (file_exists($logPath)) {
        file_put_contents($logPath, '');
    }
    echo "<script>window.location.href='index.php?id=log';</script>";
    exit;
}

/* Вывод списка посещений */
if (file_exists($logPath)) {
    $logLines = file($logPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if (!empty($logLines)) {
        echo "<ol>";
        foreach ($logLines as $line) {
            $parts = explode('|', $line);
            if (count($parts) >= 3) {
                $dt = date('d-m-Y H:i:s', (int)$parts[0]);
                $page = htmlspecialchars($parts[1]);
                $ref = htmlspecialchars($parts[2]);
                
                echo "<li>$dt &ndash; $page &rarr; $ref</li>";
            }
        }
        echo "</ol>";
    } else {
        echo "<p>Журнал посещений пуст.</p>";
    }
} else {
    echo "<p>Файл журнала не найден.</p>";
}
?>

<br />
<p>
    <a href="index.php?id=log&clear=1" style="display:inline-block; padding: 6px 12px; background: #d9534f; color: white; text-decoration: none; border-radius: 4px;">
        Очистить журнал
    </a>
</p>