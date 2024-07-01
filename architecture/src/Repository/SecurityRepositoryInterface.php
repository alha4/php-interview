<?php

namespace App\Repository;

interface SecurityRepositoryInterface
{
  public function getSecretKey(): string;
  public function saveSecretKey(string $secretKey): void;
}
