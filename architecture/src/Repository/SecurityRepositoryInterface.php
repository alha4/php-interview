<?php

namespace Aarchitecture\Repository;

interface SecurityRepositoryInterface
{
  public function getSecretKey(): string;
  public function saveSecretKey(string $secretKey): void;
}
