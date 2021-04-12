<?php

declare(strict_types=1);

/**
 * Class User
 *
 * @property int $level
 * @property int $grade
 * @property int $size
 */
class User
{
    private static $count = 0;

    public const TYPE = 'person';

    private string $name;
    protected ?int $age = null;
    protected string $gender;
    private array $properties = [];

    public static float $discount = 0;

    public function __construct(string $name, string $gender, ?int $age = null)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;

        self::$count++;
    }

    public function __clone(): void
    {
        self::$count++;
    }

    public function __set(string $name, $value): void
    {
        $properties = ['level', 'grade', 'size'];
        if (in_array($name, $properties)) {
            $this->properties[$name] = $value;
        } else {
            throw new MyException('Property is not allowed');
        }
    }

    public function __get(string $name)
    {
        return $this->properties[$name] ?? null;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function printInfo(): void
    {
//        self::qwerty();
        var_dump(self::TYPE);
        $this->test();
        echo "INFO: {$this->name}, {$this->gender}, {$this->age} years old<br>";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function makeCoffee(): void
    {
        echo 'Here is yor coffee<br>';
    }

    public function getDiscount(): float
    {
        return self::$discount;
    }

    public function getType(): string
    {
        return static::TYPE;
    }

    public function __destruct()
    {
        var_dump('Object is over');
    }

    private function test()
    {
        var_dump($this->name);
    }

    private function qwerty()
    {
        echo 'OK<br>';
    }
}
