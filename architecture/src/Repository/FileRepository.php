<?php

namespace App\Repository;

final class FileRepository implements SecurityRepositoryInterface
{
  public function getSecretKey(): string
  {
    echo 'get secret from file', PHP_EOL;
    return 'secret in file';
  }

  public function saveSecretKey(string $secretKey): void
  {

    echo 'saved secret in file', PHP_EOL;
  }
}
