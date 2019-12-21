<?php

/**
 * Class Cook
 */
abstract class Cook
{
    /**
     * @return Food
     */
    abstract public function getFood(): Food;

    /**
     *
     */
    public function toCook()
    {
        $cook = $this->getFood();
        $cook->toCook();
    }
}

/**
 * Interface Food
 */
interface Food
{
    /**
     * @return mixed
     */
    public function toCook();
}

/**
 * Class Sushi
 */
class Sushi implements Food
{
    /**
     * @return mixed|void
     */
    public function toCook()
    {
        echo 'sushi ready!!!';
    }
}

/**
 * Class Pizza
 */
class  Pizza implements Food
{

    /**
     * @inheritDoc
     */
    public function toCook()
    {
        echo 'pizza ready!!!';
    }
}

/**
 * Class SushiCook
 */
class SushiCook extends Cook
{
    /**
     * @return Food
     */
    public function getFood(): Food
    {
        return new Sushi();
    }
}

/**
 * Class PizzaCook
 */
class PizzaCook extends Cook
{

    /**
     * @return Food
     */
    public function getFood(): Food
    {
        return new Pizza();
    }
}

/**
 * Class Restaurant
 */
class Restaurant
{
    /**
     * @param Cook $cook
     */
    public function toCookFood(Cook $cook){
        $cook->toCook();
    }
}

$restaurant = new Restaurant();
$restaurant->toCookFood(new SushiCook());
$restaurant->toCookFood(new PizzaCook());
