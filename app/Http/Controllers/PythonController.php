<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
  public function runPython()
  {
      $pythonPath = env('PYTHON_PATH', 'python3');
      $scriptsDir = env('PYTHON_SCRIPTS_DIR', 'python_scripts');
      $scriptPath = base_path($scriptsDir . '/hello.py');
  
      if (!file_exists($scriptPath)) {
          return view('python_output', [
              'output' => "Error: Script file not found at $scriptPath",
              'command' => "File check",
              'pythonPath' => $pythonPath,
              'scriptPath' => $scriptPath,
              'returnVar' => 1
          ]);
      }
  
      $output = [];
      $returnVar = 0;
      exec("$pythonPath $scriptPath 2>&1", $output, $returnVar);
      $output = implode("\n", $output);
  
      return view('python_output', [
          'output' => $output,
          'command' => "$pythonPath $scriptPath",
          'pythonPath' => $pythonPath,
          'scriptPath' => $scriptPath,
          'returnVar' => $returnVar
      ]);
  }
}