<?php

function sortFileType($a, $b): int
{
    if (is_dir($a)) {
        return is_dir($b) ? strnatcasecmp($a, $b) : -1;
    }

    if (is_dir($b)) {
        return 1;
    }

    $aExt = pathinfo($a, PATHINFO_EXTENSION);
    $bExt = pathinfo($b, PATHINFO_EXTENSION);

    if ($aExt === $bExt) {
        return strnatcasecmp($a, $b);
    }

    return strcasecmp($aExt, $bExt);
}
