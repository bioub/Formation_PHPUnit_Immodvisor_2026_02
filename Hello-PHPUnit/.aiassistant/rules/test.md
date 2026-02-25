---
apply: always
---

# Rules for Units tests

## Format

Follow the Arrange / Act / Assert pattern explicitly

Exemple :

```php
public function testIsPositiveWithZero()
{
    $number = 0;
    $result = ValidatorExercices::isPositive($number);
    $this->assertFalse($result);
}
```