<?php
namespace App\Attribute;

use Attribute;

/**
 * Create own attribute RequestBody.
*/
#[Attribute(Attribute::TARGET_PARAMETER)]
class RequestBody
{
}
