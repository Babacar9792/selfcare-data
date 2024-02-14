<?php


namespace App\Traits;

use Illuminate\Support\Facades\Crypt;


trait SlugTrait
{


    public function encodeSlug(int $userId, string $slug): string
    {
        return Crypt::encryptString($userId . '-' . $slug);
    }

    public function decodeSlug(string $encryptedSlug): array
    {
        $decryptedSlug = Crypt::decryptString($encryptedSlug);
        $parts = explode('-', $decryptedSlug);
        return [
            "slug" => $parts[1],
            "id" => $parts[0]
        ];
    }
}
