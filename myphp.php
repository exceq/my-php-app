<?php

trait Named
{
    public function SayMyName()
    {
        return $this->name;
    }
}

interface Speaker
{
    function Speak();
}

class Animal implements Speaker
{
    use Named;
    private string $phrase;
    private string $name;

    protected function __construct(string $phrase, string $name)
    {
        $this->phrase = $phrase;
        $this->name = $name;
    }

    function Speak()
    {
        print("{$this->phrase}! I am {$this->name}.");
    }
}

class Cat extends Animal
{
    public function __construct()
    {
        parent::__construct("Meow", "Cat");
    }
}

class Dog extends Animal
{
    public function __construct()
    {
        parent::__construct("Woof", "Dog");
    }
}

class Fox extends Animal
{

    public function __construct()
    {
        parent::__construct("yayaya", "Fox");
    }
}


$animals = [new Cat(), new Dog(), new Fox()];

foreach ($animals as $animal) {
    echo $animal->SayMyName();
    echo PHP_EOL;
}