<?php

namespace App\Http\Controllers;

use Parser;
use App\Service\SaveToBDService;
use App\Models\Parser as ModelParser;
use App\Console\Commands\ParserCommand;

class ParserController extends Controller
{
    public $service;

    public function __construct(SaveToBDService $service)
    {
        $this->service = $service;
    }

    public function __invoke($path = 'public/xml/data_light.xml')
    {
        $data = Parser::parser($path);
        if (count(ModelParser::all()) > count($data)) {
            ModelParser::truncate();
            echo "\nДанные обновлены\n";
        }
        foreach ($data as $key => $value) {
            $old_value = ModelParser::where('id', '=', $value['id'])->first();
            if (!$old_value) {
                $this->service->create($value);
            }
            else {
                $this->service->update($value, $old_value);
            }
        }

        echo "\nПарсер отработал успешно\n\n";
    }
}
