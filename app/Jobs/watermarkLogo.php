<?php

namespace App\Jobs;

use App\Models\item_image;
use Spatie\Image\Image;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;

class watermarkLogo implements ShouldQueue
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


            $image = Image::load($path);

            $image->watermark(base_path('public/images/logo.png'))
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkOpacity(50)
            ->watermarkPadding(5, 5, Manipulations::UNIT_PERCENT)
            ->watermarkHeight(20,Manipulations::UNIT_PERCENT)
            ->watermarkHeight(20,Manipulations::UNIT_PERCENT)
            ->watermarkFit(Manipulations::FIT_CONTAIN);
            $image->save($path);
        
    }
}
