<?php
/**
 * @var \App\Domain\QuoteOfTheDay\Quote $quote
 */
?>
<div class="quote-of-the-day">
    <h3 class="quote-of-the-day__title">Шрила Прабхупада <a class="text-theme-colored" href="/today">сегодня:</a></h3>
    @if ($quote->date)
        <span class="quote-of-the-day__date"><i class="fa fa-calendar mr-5 text-theme-colored"></i> {{$quote->date->format('d.m.Y')}}</span>
    @endif
    @if ($quote->location)
        <span class="quote-of-the-day__location"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> {{$quote->location}}</span>
    @endif

    <p class="quote-of-the-day__text">
        {!! nl2br($quote->text) !!}
    </p>
    @if ($quote->author)
        <p class="quote-of-the-day__author">{{ $quote->author }}</p>
    @endif
</div>