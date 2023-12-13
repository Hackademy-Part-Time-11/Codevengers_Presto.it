<?php

namespace App\Jobs;

use App\Models\item_image;
use Spatie\Image\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;

class RemoveFaces implements ShouldQueue
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
        $path = storage_path('app/public/' . str_replace('storage/', '', $i->image));


        $image = file_get_contents($path);
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();
        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }
            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];
            $image = Image::load($path);

            $image->watermark(base_path('public/images/censured.png'))
            ->watermarkPosition('top-left')
            ->watermarkPadding($bounds[0][0],$bounds[0][1])
            ->watermarkWidth($w,Manipulations::UNIT_PIXELS)
            ->watermarkHeight($h,Manipulations::UNIT_PIXELS)
            ->watermarkFit(Manipulations::FIT_STRETCH);
            $image->save($path);
        }
        $imageAnnotator->close();
    }
}
