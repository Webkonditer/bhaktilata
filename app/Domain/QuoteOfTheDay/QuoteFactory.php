<?php

namespace App\Domain\QuoteOfTheDay;

class QuoteFactory
{
    public function makeFromArray($data)
    {
        $quote = new Quote();
        $quote->fill($data);

        return $quote;
    }
}