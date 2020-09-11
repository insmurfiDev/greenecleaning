<?php namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait AjaxUploadImagesTrait {


    public function ajaxUploadImages(Request $request)
    {
        $entry = $this->crud->getEntry($request->input('id'));
        //$attribute_name = $entry->upload_multiple['images'];
        //$attribute_name = $entry->uploadMultipleImagesToDisk['attribute'];
        $attribute_name='images';
        $files = $request->file($attribute_name);
        $file_count = count($files);

        $entry->{$attribute_name} = $files;
        $entry->save();

        return response()->json([
            'success' => true,
            'message' => ($file_count>1)?'Uploaded '.$file_count.' images.':'Image uploaded',
            'images' => $entry->{$attribute_name}
        ]);
    }


    public function ajaxReorderImages(Request $request)
    {
        $entry = $this->crud->getEntry($request->input('entry_id'));
        $entry->updateImageOrder($request->input('order'));

        return response()->json([
            'success' => true,
            'message' => 'New image order saved.'
        ]);
    }


    public function ajaxDeleteImage(Request $request)
    {
        $image_id = $request->input('image_id');
        $image_path = $request->input('image_path');
        $entry = $this->crud->getEntry($request->input('entry_id'));

        //$disk = $this->crud->getFields('update', $entry->id)['images']['disk'];
        $disk='public';

        // delete the image from the db
        $entry->removeImage($image_id, $image_path, $disk);

        return response()->json([
            'success' => true,
            'message' => 'Image deleted.'
        ]);
    }
}
