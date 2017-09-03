<?php
declare(strict_types=1);

namespace App\Forms;

interface FieldInterface
{
    public function getCode(): string;

    public function render(): string;

    public function isValid(): bool;

    public function getValue();

    public function setParent(FormInterface $form);

    public function rules();

    public function placeholder(): string;

    public function isVisible(): bool;
}
