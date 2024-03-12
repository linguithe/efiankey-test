<?php

function checkDownload($memberType) {
    static $lastDownload = 0;
    static $ignoreCount = null;
    $currentTime = time();

    if ($memberType != "member" && $memberType != "non-member") {
        return "Invalid member type!";
    }

    if ($ignoreCount === null) {
        $ignoreCount = $memberType == "member" ? 2 : 0;
    }

    if ($ignoreCount == 0) {
        if ($currentTime - $lastDownload < 5) {
            return "Too many downloads!";
        }
    } else {
        $ignoreCount--;
    }

    $lastDownload = $currentTime;
    return "Your download is starting...";
}

// Testing
echo checkDownload("member") . "\n";
sleep(2);
echo checkDownload("member") . "\n";
echo checkDownload("member") . "\n";

// echo checkDownload("non-member") . "\n";
// echo checkDownload("non-member") . "\n";
// sleep(6);
// echo checkDownload("non-member") . "\n";

// echo checkDownload("invalid-type") . "\n";
?>