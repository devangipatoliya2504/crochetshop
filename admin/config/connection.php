<?php
// Ensure mysqli doesn't throw uncaught exceptions on errors for legacy PHP compatibility
if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}

// Auto-detect environment: InfinityFree Online Hosting vs Localhost (UwAmp / XAMPP)
$is_online = isset($_SERVER['HTTP_HOST']) && (
    strpos($_SERVER['HTTP_HOST'], 'infinityfree') !== false ||
    strpos($_SERVER['HTTP_HOST'], 'epizy') !== false ||
    strpos($_SERVER['HTTP_HOST'], 'rf.gd') !== false ||
    strpos($_SERVER['HTTP_HOST'], '42web') !== false ||
    ($_SERVER['HTTP_HOST'] !== 'localhost' && strpos($_SERVER['HTTP_HOST'], '127.0.0.1') === false)
);

if ($is_online) {
    $candidates = [
        ['host' => 'sql110.infinityfree.com', 'user' => 'if0_43258627', 'pass' => 'Utl3LCFvwgiv1c', 'name' => 'if0_43258627_crochetshop', 'port' => 3306],
        ['host' => '127.0.0.1', 'user' => 'root', 'pass' => 'root', 'name' => 'crochetshop', 'port' => 8000],
    ];
} else {
    $candidates = [
        ['host' => '127.0.0.1', 'user' => 'root', 'pass' => 'root', 'name' => 'crochetshop', 'port' => 8000],
        ['host' => '127.0.0.1', 'user' => 'root', 'pass' => '', 'name' => 'crochetshop', 'port' => 3306],
        ['host' => 'sql110.infinityfree.com', 'user' => 'if0_43258627', 'pass' => 'Utl3LCFvwgiv1c', 'name' => 'if0_43258627_crochetshop', 'port' => 3306],
    ];
}

$con = null;
foreach ($candidates as $cand) {
    try {
        $test_con = @mysqli_connect($cand['host'], $cand['user'], $cand['pass'], $cand['name'], $cand['port']);
        if ($test_con && !mysqli_connect_errno()) {
            $con = $test_con;
            break;
        }
    } catch (\Throwable $e) {
        // Continue to next candidate
    }
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Polyfill old mysql_* functions removed in PHP 7.0+ / PHP 8.x
if (!function_exists('mysql_connect')) {
    function mysql_connect($server = '127.0.0.1', $username = 'root', $password = 'root', $new_link = false, $client_flags = 0) {
        global $con;
        if ($con && $con instanceof mysqli) {
            return $con;
        }
        $ports = [8000, 3306];
        foreach ($ports as $port) {
            try {
                $c = @mysqli_connect($server, $username, $password, '', $port);
                if ($c) {
                    $con = $c;
                    return $c;
                }
            } catch (\Throwable $e) {}
        }
        return false;
    }
}

if (!function_exists('mysql_select_db')) {
    function mysql_select_db($database_name, $link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if (!$c) return false;
        return @mysqli_select_db($c, $database_name);
    }
}

if (!function_exists('mysql_query')) {
    function mysql_query($query, $link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if (!$c) return false;
        return @mysqli_query($c, $query);
    }
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $result_type = MYSQLI_BOTH) {
        if (!$result || !($result instanceof mysqli_result)) return false;
        return mysqli_fetch_array($result, $result_type);
    }
}

if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result) {
        if (!$result || !($result instanceof mysqli_result)) return false;
        return mysqli_fetch_assoc($result);
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result) {
        if (!$result || !($result instanceof mysqli_result)) return 0;
        return mysqli_num_rows($result);
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error($link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if (!$c) return mysqli_connect_error();
        return mysqli_error($c);
    }
}

if (!function_exists('mysql_close')) {
    function mysql_close($link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if ($c && $c instanceof mysqli) {
            return @mysqli_close($c);
        }
        return true;
    }
}

if (!function_exists('mysql_insert_id')) {
    function mysql_insert_id($link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if (!$c) return 0;
        return mysqli_insert_id($c);
    }
}

if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($unescaped_string, $link_identifier = null) {
        global $con;
        $c = ($link_identifier instanceof mysqli) ? $link_identifier : $con;
        if (!$c) return addslashes($unescaped_string);
        return mysqli_real_escape_string($c, $unescaped_string);
    }
}

if (!function_exists('mysql_data_seek')) {
    function mysql_data_seek($result, $row_number) {
        if (!$result || !($result instanceof mysqli_result)) return false;
        return @mysqli_data_seek($result, $row_number);
    }
}
?>
