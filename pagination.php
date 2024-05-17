<?php
$directory = './';
$files = array_diff(scandir($directory), array('..', '.'));
$pdfFiles = array_filter($files, function ($file) {
    return pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
});
$pdfFiles = array_values($pdfFiles); 
$string = implode(", ", $pdfFiles);

$itemsPerPage = 5;
$totalItems = count($pdfFiles);
$totalPages = ceil($totalItems / $itemsPerPage);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max($page, 1); 
$page = min($page, $totalPages); 
$offset = ($page - 1) * $itemsPerPage;
$currentFiles = array_slice($pdfFiles, $offset, $itemsPerPage);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        width:100%;
        min-height:100vh;
    }
    .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination strong {
            margin: 0 5px;
            padding: 10px 15px;
            text-decoration: none;
            color: #1d3684;
            background-color: #fff;
            border: 1.5px solid #1d3684;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .pagination a:hover {
            background-color: #1d3684;
            color:#fff;
        }
        .pagination strong {
            background-color: #6c757d;
            /* border-color: #6c757d; */
        }
        .pagination strong.current {
            background-color: #1d3684;
            color: #fff;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0 auto;
            display:flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            gap:12px;
        }
        ul li {
            margin: 5px 0;
        }
        .files{
            position: relative;
            left:500px;
            display:flex;
            gap:12px;
            flex-direction:column;
        }
        .file{
            display:flex;
            gap:12px;
        }
</style>
<body>
<div class="container">
    <div class="files">
        <?php foreach ($currentFiles as $file): ?>
            <div class="file">
                <ion-icon name="document-outline"></ion-icon>
                <a href="<?= htmlspecialchars($directory . '/' . $file) ?>"><?= htmlspecialchars($file) ?></a>
            </div>
        <?php endforeach; ?>
    </div>
    
    <?php 
    // Calculate the previous and next page numbers with circular behavior
    $prevPage = ($page > 1) ? $page - 1 : $totalPages;
    $nextPage = ($page < $totalPages) ? $page + 1 : 1;
    ?>
    
    <div class="pagination">
        <a href="?page=<?= $prevPage ?>">Previous</a>
        
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i == $page): ?>
                <strong class="current"><?= $i ?></strong>
            <?php else: ?>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        
        <a href="?page=<?= $nextPage ?>">Next</a>
    </div>
</div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>






                           