<?php

declare(strict_types=1);

namespace App\Enums;

use App\DataObjects\Skill;

enum SkillLevel: string
{
    case Beginner = 'Beginner';
    case Intermediate = 'Intermediate';
    case Advanced = 'Advanced';
    case Expert = 'Expert';

    public static function fromString(string $level): ?SkillLevel
    {
        return match (strtolower($level)) {
            'beginner', 'novice', 'junior' => self::Beginner,
            'intermediate', 'mid-level' => self::Intermediate,
            'advanced', 'senior' => self::Advanced,
            'expert', 'master' => self::Expert,
            default => null,
        };
    }

    public function title(): string
    {
        return match ($this) {
            self::Beginner => 'Beginner',
            self::Intermediate => 'Intermediate',
            self::Advanced => 'Advanced',
            self::Expert => 'Expert',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Beginner => 'bg-gray-200 text-gray-800',
            self::Intermediate => 'bg-blue-200 text-blue-800',
            self::Advanced => 'bg-green-200 text-green-800',
            self::Expert => 'bg-yellow-200 text-yellow-800',
        };
    }
}
