<?php

namespace Application\MyComponents;

use PHPUI\Core\UIComponent;
use PHPUI\Resources\UICssResource;

class MyAvatar extends UIComponent
{
    public readonly string $firstName;
    public readonly string $lastName;
    public readonly string $profileImageURL;

    public function __construct(string $firstName, string $lastName, string $profileImageURL = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profileImageURL = $profileImageURL;

        $this->setTemplate('views/avatar.php');

        $this->getResources()->add(
            new UICssResource('load-multiple-times.css', ResourceLocation::HEAD->value)
            // new UIInlineJsResource('alert("im over here now!");', MyResourceLocation::BODY->value)
        );
    }

    public function getVariables(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'profileImageURL' => $this->profileImageURL,
        ];
    }
}
