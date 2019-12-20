<?php

declare(strict_types=1);

namespace GrumPHP\Exception;

use GrumPHP\Task\TaskInterface;

class TaskConfigResolverException extends RuntimeException
{
    public static function unkownTask(string $task): self
    {
        return new self('Could not load config resolver for task: "'.$task.'". The task is not known.');
    }

    public static function unkownClass(string $class): self
    {
        return new self(
            sprintf(
                'Could not load config resolver for class: "%s". Expected an instance of: "%s"',
                $class,
                TaskInterface::class
            )
        );
    }

    public static function deprectatedTask(string $taskName): self
    {
        return new self(
            'Your configuration contains the old task interface for task "'.$taskName.'".' . PHP_EOL
            . 'This task cannot be used in current setup.' . PHP_EOL
            . 'Please upgrade your extension(s) or fall back to a previous version of GrumPHP.' . PHP_EOL . PHP_EOL
        );
    }
}
