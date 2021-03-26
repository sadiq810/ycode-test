<?php


namespace App\Repositories;


use App\Models\People;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PeopleRepository
{
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
     * @return Collection
     * Fetch records from database.
     */
    public static function list(): Collection
    {
        return People::all();
    }//..... end of list() .....//

    /**
     * @param $data
     * @return mixed
     * Create new one.
     */
    public function create(array $data): People
    {
        return People::create($data);
    }//..... end of create() ...../
}
