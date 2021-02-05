<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Study;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ProdiChart extends BaseChart
{
    public ?string $name = 'prodi_chart';
    public ?string $routeName = 'back';
    public ?string $prefix = 'back';

    //public ?array $middlewares = ['auth'];

    public function handler(Request $request): Chartisan
    {
        $prodi = Study::select(['name'])->get()->toArray();
        return Chartisan::build()
            ->labels($prodi)
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}