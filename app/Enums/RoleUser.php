<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RoleUser extends Enum
{
    // Role: Teacher => 1, Student => 2
    const Student = 1;
    const Teacher = 2;
}
