<?php

namespace App\Repository;

final class RedisRepository implements SecurityRepositoryInterface
{
  public function getSecretKey(): string
  {
    echo 'key loaded from Redis';
    return 'secret in Redis';
  }

  public function saveSecretKey(string $secretKey): void
  {
    echo 'key saved in Redis';
  }
}
