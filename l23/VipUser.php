<?php

final class VipUser extends User
{
    public const TYPE = 'VIP_person';

    public function toArray(): array
    {
        $data = [];
        foreach($this as $name => $value) {
            $data[$name] = $value;
        }

        return $data;
    }

    public function makeCoffee(): void
    {
        echo 'Give me my coffee<br>';
    }

    public function getDiscount(): float
    {
        return parent::getDiscount() + 5;
    }
}
