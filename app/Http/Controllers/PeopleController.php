<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Models\People;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PeopleController extends Controller
{

	public function index()
	{
		return view('people');
	}

    /**
     * @return AnonymousResourceCollection
     *
     * First get people list from database and if not found in database,
     * Then fetch them from Airtable Api and cache them for subsequent requests.
     */
    public function list(): AnonymousResourceCollection
    {
        $people = People::list();

        if ($people->isEmpty())
            $people = $this->fetchAndCachePeople();

        return PeopleResource::collection($people);
	}//..... end of list() .....//

    /**
     * @return Collection|\Illuminate\Support\Collection
     *
     * Fetch records from Airtable and then insert them into Database.
     */
    private function fetchAndCachePeople(): Collection | \Illuminate\Support\Collection
    {
        $airTablePeople = (new \App\Services\People())->get();

        if ($airTablePeople and isset($airTablePeople['records'])) {
            $people = [];

            foreach ($airTablePeople['records'] as $record)
                $people[] = [
                    'airtable_id'   => $record['id'],
                    'name'          => $record['fields']['Name'] ?? '',
                    'email'         => $record['fields']['Email'] ?? '',
                    'photo'         => json_encode($record['fields']['Photo'] ?? []),
                    'status'        => 1
                ];

            People::bulkInsert($people);

            return People::list();
        }//..... end if() ....//

        return collect([]);
	}//..... end of fetchAndCachePeople() .....//
}
