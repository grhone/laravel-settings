<?php

namespace Grhone\LaravelSettings\Traits;

use Grhone\LaravelSettings\Models\Setting;

trait HasSettings
{
    public function settings()
    {
        return $this->morphMany(Setting::class, 'model');
    }

    public function getSetting($key, $default = null)
    {
        $setting = $this->settings()->where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public function setSetting($key, $value)
    {
        $setting = $this->settings()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        return $setting;
    }
    
    public function deleteSetting($key)
    {
        $setting = $this->settings()->where('key', $key)->first();
        if ($setting) {
            return $setting->delete();
        }
        return false;
    }
}
