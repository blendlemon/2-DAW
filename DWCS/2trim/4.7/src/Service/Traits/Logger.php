<?php
namespace App\Service\Traits;
trait Logger {
    private string $nivelLog = 'INFO';
    private string $fileName = 'app.log';

    public function log(string $mensaje, ?string $nivel = null, ?string $fileName=null): void {
        $nivel = $nivel?? $this->nivelLog;
        $fileName = $fileName?? $this->fileName;
      //comprueba si el directorio log existe si no lo crea, despues escribe los logs pertinentes en el
      if (!\is_dir(\dirname(__DIR__,3)). \DIRECTORY_SEPARATOR . 'log') {
        mkdir(\dirname(__DIR__,3) . \DIRECTORY_SEPARATOR . 'log', 0777, true);
      }
        error_log("[$nivel] " . date('Y-m-d H:i:s') . " - " . $mensaje . "\n", 3, \dirname(__DIR__, 3) . \DIRECTORY_SEPARATOR . 'log' .  \DIRECTORY_SEPARATOR . $fileName);
}