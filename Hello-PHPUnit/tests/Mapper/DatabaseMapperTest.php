<?php

namespace AppTests\Mapper;

use App\Gateway\DatabaseGatewayInterface;
use App\Mapper\DatabaseMapper;
use PHPUnit\Framework\TestCase;

class DatabaseMapperTest extends TestCase
{


    public function testFindAllWithRealDependency()
    {
        $pdo = new \PDO('mysql:host=localhost', 'root', '');
        $gateway = new \App\Gateway\DatabaseGateway($pdo);
        $mapper = new DatabaseMapper($gateway);

        $result = $mapper->findAll();

        $this->assertCount(18, $result);
    }

    public function testFindAllWithFakeDependency()
    {
        $gateway = new \App\Gateway\DatabaseGatewayFake(['test1', 'test2', 'test3']);
        $mapper = new DatabaseMapper($gateway);

        $result = $mapper->findAll();

        $this->assertCount(3, $result);
    }

    public function testFindAllWithStubDependency()
    {
        // Arrange
        $stub = $this->createStub(DatabaseGatewayInterface::class);
        $stub->method('listDbs')->willReturn(['test1', 'test2', 'test3']);
        $mapper = new DatabaseMapper($stub);

        // Act
        $result = $mapper->findAll();

        // Assert
        $this->assertCount(3, $result);
    }

    public function testFindAllWithMockDependency()
    {
        // Arrange / Assert
        $stub = $this->createMock(DatabaseGatewayInterface::class);
        $stub->expects($this->once())->method('listDbs')->willReturn(['test1', 'test2', 'test3']);
        $mapper = new DatabaseMapper($stub);

        // Act
        $result = $mapper->findAll();

        // Assert
        $this->assertCount(3, $result);
    }
}
