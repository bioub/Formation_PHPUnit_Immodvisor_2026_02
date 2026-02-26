<?php

namespace AppTests\Exercices;

use App\Exercices\OrderExercices;
use PHPUnit\Framework\TestCase;

class OrderExercicesTest extends TestCase
{
    protected OrderExercices $order;
    public function setUp(): void {
        $this->order = new OrderExercices('John');
    }

    public function testGetTotal() {

        $this->order->addItem('Product 1', 10, 1);
        $this->order->addItem('Product 2', 20, 1);

        $this->assertEquals(30, $this->order->getTotal());
    }
}
