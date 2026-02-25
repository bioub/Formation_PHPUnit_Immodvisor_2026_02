<?php

namespace App\Exercices;

class ExceptionExercices
{
    public static function safeDivide(int $a, int $b): float
    {
        if ($b === 0) {
            throw new \InvalidArgumentException("Division by zero");
        }

        if ($a === 0) {
            return 0;
        }

        return $a / $b;
    }

    public function getArrayValue(array $data, int $index)
    {
        if (empty($data)) {
            throw new \RuntimeException("Array is empty");
        }

        if (!array_key_exists($index, $data)) {
            throw new OutOfBoundsException("Index not found");
        }

        return $data[$index];
    }

    public function validatePassword(string $password): bool
    {
        if ($password === "") {
            throw new \InvalidArgumentException("Password empty");
        }

        if (strlen($password) < 8) {
            throw new \LengthException("Password too short");
        }

        if (!preg_match('/[A-Z]/', $password)) {
            throw new \DomainException("Missing uppercase");
        }

        if (!preg_match('/[0-9]/', $password)) {
            throw new \DomainException("Missing digit");
        }

        return true;
    }

    public function processTransaction(float $amount, bool $isBlocked, ?string $token): string
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Invalid amount");
        }

        if ($isBlocked) {
            throw new \RuntimeException("Account blocked");
        }

        $log = "START";

        try {

            if ($token === null) {
                throw new \LogicException("Token missing");
            }

            if ($token === "expired") {
                throw new \UnexpectedValueException("Token expired");
            }

            if ($amount > 10000) {
                throw new \OverflowException("Limit exceeded");
            }

            if ($amount === 13.37) {
                throw new \Exception("Suspicious amount");
            }

            $log .= "-SUCCESS";
            return "OK";

        } catch (\UnexpectedValueException $e) {

            $log .= "-RETRY";
            return "RETRY";

        } catch (\OverflowException $e) {

            $log .= "-MANUAL";
            return "MANUAL_REVIEW";

        } catch (\Exception $e) {

            $log .= "-FAILED";
            return "FAILED";

        } finally {
            $log .= "-FINALLY";
        }
    }
}