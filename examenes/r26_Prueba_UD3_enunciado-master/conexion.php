<?php



function readIniFile($file = "db_settings.ini"): array
{
    if (!$settings = parse_ini_file($file, TRUE))
        throw new exception('Unable to open ' . $file . '.');
    return $settings;
}

function getConnection(): PDO
{
    $settings = readIniFile();

    $dsn = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];

    $conn = new PDO($dsn, $settings['database']['username'], $settings['database']['password']);
    return $conn;

}