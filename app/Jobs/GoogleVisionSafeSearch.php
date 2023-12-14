<?php

namespace App\Jobs;

use App\Models\item_image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $announcement_image_id;
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = item_image::find($this->announcement_image_id);

        if (!$i) {

            return;
        }
        $path = str_replace('storage/', '', $i->image);


        $image = file_get_contents(storage_path('app/public/' . $path));
        // Imposta la variabile di ambiente GOOGLE_APPLICATION_CREDENTIALS
        // al path del credentials file

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();

        $response = $imageAnnotator->safeSearchDetection($image);

        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();

        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();

        $violence = $safe->getViolence();

        $racy = $safe->getRacy();

        // echo json_encode([Sadult, Smedical, Sspoof, Sviolence, Sracy]);

        $likelihoodName = [
            'text-secondary bi bi-circle',
            'text-success bi bi-check-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-warning bi bi bi-exclamation-circle-fill',
            'text-warning bi bi bi-exclamation-circle-fill',
            'text-danger bi bi-x-circle-fill'
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
    }
}
