<?php
$DEFAULT_PAGESIZE = 10;
$pagesize = isset($_GET['size']) ? intval($_GET['size']) : $DEFAULT_PAGESIZE;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
$offset = ($page-1) * $pagesize;
?>