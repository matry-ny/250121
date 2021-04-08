<?php

declare(strict_types=1);

class User
{
    public const TYPE = 'person';

    protected string $name;
    protected ?int $age = null;
    protected string $gender;

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

    private function test()
    {
        var_dump($this->name);
    }

    private function qwerty()
    {
        echo 'OK<br>';
    }
}
