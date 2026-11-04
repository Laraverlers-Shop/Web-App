<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use RuntimeException;

trait HasCode
{
    protected static function bootHasCode(): void
    {
        static::creating(function (Model $model) {
            if ($model->getKey() !== null) {
                return;
            }

            $prefix = static::$codePrefix;
            $key = $model->getKeyName();

            $lastCode = static::query()
                ->where($key, 'like', $prefix.'-%')
                ->orderByDesc($key)
                ->value($key);

            $number = $lastCode === null
                ? 1
                : ((int) substr($lastCode, strlen($prefix) + 1)) + 1;

            if ($number > 999999) {
                throw new RuntimeException('Code limit reached.');
            }

            $model->setAttribute(
                $key,
                $prefix.'-'.str_pad(
                    (string) $number,
                    6,
                    '0',
                    STR_PAD_LEFT
                )
            );
        });
    }
}