<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Comment;
class UrlImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            // Assuming the URL is in the first column (adjust the index accordingly)
            $url = $row[0] ?? ' ';

            // Extract the domain from the URL
            $parsedUrl = parse_url($url);
            $domain = $parsedUrl['host'] ?? null;

            // Check if the entry already exists in the database based on the domain
            $existingEntry = Comment::firstOrCreate(
                ['domain' => $domain],
                [
                    'comment_url' => $url,
                    'status' => 'Working',
                ]
            );

            // If the entry already exists, you can skip it or handle it accordingly
            if (!$existingEntry->wasRecentlyCreated) {
                continue; // Skip to the next iteration
            }
        }

    }

     /**
     * Clean the URL by removing non-printable characters.
     *
     * @param string|null $url
     * @return string|null
     */
    private function cleanUrl(?string $url): ?string
    {
        if ($url) {
            // Remove non-printable characters
            $url = preg_replace('/[^\p{L}\p{N}\s]/u', '', $url);
        }

        return $url;
    }
}