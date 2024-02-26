<?php

namespace App\Actions;

use App\Models\Personality;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;

class ImportDeputies
{
    use AsAction;

    public string $commandSignature = 'import:deputies';

    public function handle()
    {
        //read local json file and insert into database
        $json = file_get_contents('deputies.json');
        $data = json_decode($json, true);
        $deputies = [];
        foreach ($data["departments"] as $department) {
            foreach ($department["deputies"] as $deputy){
                if ($deputy["name"])
                $deputyData = [
                    'full_name' => $deputy['name'] ?? null,
                    'profession' => "Député",
                    'phone' => $deputy['phone'] ?? null,
                    'full_address' => $deputy['address'] ?? null,
                    'departmentName' => $department['departmentName'] ?? $department['department'] ?? null,
                    'departmentNumber' => $department['departmentNumber'] ?? '00',
                    'party' => $deputy['party'] ?? null,
                    'constituency' => $this->getConstituencyNumber($deputy['constituency']),
                    'urls' => json_encode($deputy['urls'] ?? []),
                    "fax" => $deputy['fax'] ?? null,
                    "email" => $deputy['email'] ?? null,
                    "additionalPhone" => $deputy['additionalPhone'] ?? null,
                    "additionalFax" => $deputy['additionalFax'] ?? null,
                    "additionalAddress" => $deputy['additionalAddress'] ?? null,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
                $deputies[] = $deputyData;
            }
        }
        Personality::insert($deputies);

    }

    public function getConstituencyNumber($string): ?string
    {
        $pattern = '/(\d+)e\s+circ/';
        preg_match($pattern, $string, $matches);

        return $matches[1] ?? $this->getConstituency($string) ?? null;
    }

    public function getConstituency(string $input): ?int
    {
        preg_match("/\((\d+)[eère]* circonscription\)/", $input, $matches);
        return isset($matches[1]) ? intval($matches[1]) : null;
    }

    public function asCommand(Command $command): void
    {
        echo $this->handle();
    }
}
