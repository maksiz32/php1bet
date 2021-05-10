<?php
class Product {
    private string $title;
    private ?float $price;
    private ?array $components;

    function __construct(string $title, ?float $price, ?array $components) 
    {
        $this->title = $title;
        ($price) ? $this->price = $price : $this->price = 0.0;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        if ($this->components) {
            $price = 0;
            foreach ($this->components as $prod) {
                $price += $prod->getPrice();
            }
        }
        $this->price = $price;
        return $this;
    }

    public function getComponents(): ?array
    {
        return $this->components;
    }

    public function setComponents(array $components): self
    {
        if (is_array($components) && count($components) > 1) {
            $this->components = $components;
        }
        return $this;
    }
}