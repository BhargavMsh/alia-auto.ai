<?php

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'ok' => false,
        'message' => 'Method not allowed.'
    ]);

    exit;
}

$input = file_get_contents('php://input');

if (!$input) {
    http_response_code(400);

    echo json_encode([
        'ok' => false,
        'message' => 'No request data received.'
    ]);

    exit;
}

$data = json_decode($input, true);

if (!is_array($data)) {
    http_response_code(400);

    echo json_encode([
        'ok' => false,
        'message' => 'Invalid JSON request.'
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Python executable
|--------------------------------------------------------------------------
|
| Change this if required.
|
*/

$python = 'python3';

/*
|--------------------------------------------------------------------------
| Python contact script
|--------------------------------------------------------------------------
*/

$script = __DIR__ . DIRECTORY_SEPARATOR .
          'backend' . DIRECTORY_SEPARATOR .
          'send_contact.py';


if (!file_exists($script)) {
    http_response_code(500);

    echo json_encode([
        'ok' => false,
        'message' => 'Contact mail service is unavailable.'
    ]);

   // exit;
}


/*
|--------------------------------------------------------------------------
| Start Python
|--------------------------------------------------------------------------
*/

$descriptorSpec = [
    0 => ['pipe', 'r'], // stdin
    1 => ['pipe', 'w'], // stdout
    2 => ['pipe', 'w']  // stderr
];

$command = '"' . $python . '" "' . $script . '"';

$process = proc_open(
    $command,
    $descriptorSpec,
    $pipes,
    __DIR__
);


if (!is_resource($process)) {
    http_response_code(500);

    echo json_encode([
        'ok' => false,
        'message' => 'Unable to start mail service.'
    ]);

  //  exit;
}


/*
|--------------------------------------------------------------------------
| Send form JSON to Python stdin
|--------------------------------------------------------------------------
*/

fwrite(
    $pipes[0],
    json_encode($data)
);

fclose($pipes[0]);


/*
|--------------------------------------------------------------------------
| Read Python response
|--------------------------------------------------------------------------
*/

$output = stream_get_contents($pipes[1]);
$errorOutput = stream_get_contents($pipes[2]);

fclose($pipes[1]);
fclose($pipes[2]);

$exitCode = proc_close($process);


if ($exitCode !== 0) {

    error_log(
        'ALIA Contact Python Error: ' . $errorOutput
    );

    http_response_code(500);

    echo json_encode([
        'ok' => false,
        'message' => 'Unable to send your request. Please try again.'
    ]);

  //  exit;
}


$result = json_decode(
    trim($output),
    true
);


if (!is_array($result)) {
    error_log(
        'Invalid Python response: ' . $output
    );

    http_response_code(500);

    echo json_encode([
        'ok' => false,
        'message' => 'Invalid response from mail service.'
    ]);

  //  exit;
}


if (empty($result['ok'])) {
    http_response_code(400);
}


echo json_encode($result);