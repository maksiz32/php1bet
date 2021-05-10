<?php
/*
Разработайте класс корзины (Cart) с методами для добавления, удаления товаров, а также с методом вычисления полной стоимости корзины, с учётом того, что некоторые товары могут представлять из себя комплекты других товаров.
*/
class Cart {
    private array $basket;

    public function addProduct(Product $prod): self
    {
        $this->basket[$prod['title']] = [$prod['price'], $prod['component']];
        return $this;
    }

    public function delProduct(Product $prod): bool
    {
        if ($this->baskey[$prod['title']]) {
            unset($this->baskey[$prod['title']]);
            return true;
        } else {
            return false;
        }
    }
    
    public function sumCart(): float
    {
        $sum = 0;
        foreach($this->basket as $bas) {
            $sum += $bas['price'];
        }
        return $sum;
    }
}