<?php

namespace App\Jobs;
use App\Models\item_image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;


class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $announcement_image_id;
    public function __construct($announcement_image_id)
    {
      $this->announcement_image_id=$announcement_image_id;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i= item_image::find($this->announcement_image_id);

if (!$i){

return;
    }
$path=str_replace('storage/', '', $i->image);


$image= file_get_contents(storage_path('app/public/'. $path));
// Imposta la variabile di ambiente GOOGLE_APPLICATION_CREDENTIALS
// al path del credentials file

putenv('GOOGLE_APPLICATION_CREDENTIALS='. base_path('google_credential.json'));

$imageAnnotator= new ImageAnnotatorClient();

$response= $imageAnnotator->labelDetection($image);
$labels = $response->getLabelAnnotations();
if($labels){
    $result=[];
    foreach($labels as $label){
        $result[] = $label ->getDescription();
    }


$i->labels=$result;
$i->save();
}
$imageAnnotator->close();




    }
}