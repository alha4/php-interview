<?php

namespace App\Repository;

final class CloudRepository implements SecurityRepositoryInterface
{

  public function getSecretKey(): string
  {
    echo 'getting secret key: in cloud';
    return 'secret_key in cloud';
  }

  public function saveSecretKey(string $secretKey): void
  {

    echo 'saving secret key: in cloud';
  }
}
