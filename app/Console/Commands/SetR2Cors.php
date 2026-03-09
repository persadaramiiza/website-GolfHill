<?php

namespace App\Console\Commands;

use Aws\S3\S3Client;
use Illuminate\Console\Command;

class SetR2Cors extends Command
{
    protected $signature = 'r2:set-cors';
    protected $description = 'Set CORS policy on the Cloudflare R2 bucket to allow browser image loading';

    public function handle(): int
    {
        $client = new S3Client([
            'version'                 => 'latest',
            'region'                  => 'auto',
            'endpoint'                => config('filesystems.disks.r2.endpoint'),
            'use_path_style_endpoint' => false,
            'credentials'             => [
                'key'    => config('filesystems.disks.r2.key'),
                'secret' => config('filesystems.disks.r2.secret'),
            ],
        ]);

        $bucket = config('filesystems.disks.r2.bucket');

        $client->putBucketCors([
            'Bucket' => $bucket,
            'CORSConfiguration' => [
                'CORSRules' => [
                    [
                        'AllowedOrigins' => ['*'],
                        'AllowedMethods' => ['GET', 'HEAD'],
                        'AllowedHeaders' => ['*'],
                        'MaxAgeSeconds'  => 3600,
                    ],
                ],
            ],
        ]);

        $this->info("CORS policy applied to bucket [{$bucket}] successfully.");

        return self::SUCCESS;
    }
}
