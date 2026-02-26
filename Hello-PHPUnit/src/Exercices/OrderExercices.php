<?php

namespace App\Exercices;

class OrderExercices
{
    private string $customerName;
    private array $items = [];
    private float $discount = 0.0;
    private bool $validated = false;

    public function __construct(string $customerName)
    {
        $this->setCustomerName($customerName);
    }

    /* =======================
        GETTERS / SETTERS
    ======================= */

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): void
    {
        $customerName = trim($customerName);

        if ($customerName === "") {
            throw new \InvalidArgumentException("Customer name empty");
        }

        $this->customerName = $customerName;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): void
    {
        if ($discount < 0 || $discount > 0.5) {
            throw new \InvalidArgumentException("Discount invalid");
        }

        $this->discount = $discount;
    }

    public function isValidated(): bool
    {
        return $this->validated;
    }

    /* =======================
        MÉTHODES MÉTIER
    ======================= */

    public function addItem(string $name, float $price, int $quantity): void
    {
        if ($this->validated) {
            throw new \RuntimeException("Order already validated");
        }

        if ($price <= 0) {
            throw new \InvalidArgumentException("Invalid price");
        }

        if ($quantity <= 0) {
            throw new \InvalidArgumentException("Invalid quantity");
        }

        $this->items[] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    public function validate(): void
    {
        if (empty($this->items)) {
            throw new \RuntimeException("Cannot validate empty order");
        }

        $this->validated = true;
    }

    /**
     * Méthode intéressante à tester
     * Génère un résumé texte basé sur l'état interne
     */
    public function getSummary(): string
    {
        $count = 0;

        foreach ($this->items as $item) {
            $count += $item['quantity'];
        }

        $status = $this->validated ? "VALIDATED" : "PENDING";

        return sprintf(
            "%s | items:%d | total:%.2f | %s",
            $this->customerName,
            $count,
            $this->getTotal(),
            $status
        );
    }

    public function getTotal(): float
    {
        $total = 0.0;

        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        if ($this->discount > 0) {
            $total *= (1 - $this->discount);
        }

        return round($total, 2);
    }
}