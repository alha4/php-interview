<?php

namespace App\Repository;

final class MysqlRepository implements SecurityRepositoryInterface
{

  public function getSecretKey(): string
  {
    echo 'get secret key from DB Mysql';
    return 'secret in DB Mysql';
  }

  public function saveSecretKey(string $secretKey): void
  {
    echo 'save secret key in DB Mysql';
  }
}
