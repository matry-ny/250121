<?php

require_once __DIR__ . '/lib/files_render.php';

$rout = __DIR__ . '/storage/' . $_GET['rout'];
$mimeType = mime_content_type($rout);

downloadFile($rout, $mimeType);
