<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $guarded = ['id'];

    /**
     * @return Collection
     * Fetch records from database.
     */
    public static function list(): Collection
    {
        return People::all();
    }//..... end of list() .....//

    /**
     * @param $records
     * Bulk insert.
     */
    public static function bulkInsert($records): void
    {
        try {
            People::insert($records);
        } catch (\Exception $exception) {
            Log::error('Could not insert records into database: '. $exception->getMessage());
        }//..... end of try-catch() .....//
    }//...... end of bulkInsert() .....//

    /**
     * @param $photo
     * @return array|mixed
     * Photo field accessor.
     */
    public function getPhotoAttribute($photo)
    {
        return $photo ? json_decode($photo, true) : [];
    }//..... end of getPhotoAttribute() .....//
}
