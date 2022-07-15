<?php

namespace App\Console\Commands;

use Parser;
use App\Models\Parser as ModelParser;
use Illuminate\Console\Command;
use App\Service\SaveToBDService;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activates the controller for parsing the XML file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    public $service;

    public function __construct(SaveToBDService $service)
    {
        $this->service = $service;
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->ask('What is path? (Press Enter for default: public/xml/data_light.xml)');
        if (!$path) {
            $path = 'public/xml/data_light.xml';
        }

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
