<?php

namespace components;

use traits\GoogleTrait;

class Application
{
    use GoogleTrait;

    public function __construct(AbstractRequest $request)
    {
        $request->parse();
        $request->print();

        $this->makeTransaction();
    }

    public function test(TestableInterface $object)
    {
        $object->varDump();
    }
}
