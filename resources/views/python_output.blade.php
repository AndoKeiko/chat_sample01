<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python Output</title>
</head>
<body>
    <h1>Python Script Output:</h1>
    <p>Command: {{ $command }}</p>
    <p>Python Path: {{ $pythonPath }}</p>
    <p>Script Path: {{ $scriptPath }}</p>
    <p>Return Value: {{ $returnVar }}</p>
    <h2>Output:</h2>
    <pre>{{ $output ?: 'No output' }}</pre>
</body>
</html>