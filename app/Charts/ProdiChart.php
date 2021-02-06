<?php
declare(strict_types=1);
namespace App\Charts;
use App\Models\Biodata;
use App\Models\Faculty;
use App\Models\Study;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
class ProdiChart extends BaseChart
{
    public ?string $name = 'prodi_chart';
    public ?string $routeName = 'prodi_chart';
    //public ?array $middlewares = ['auth'];
    public function handler(Request $request): Chartisan
    {
        $maba = Biodata::with(['getprodi', 'getprodi.faculty'])->get();
        dd($maba);
        // $collection = collect($prodi);
        // $plucked =  $collection->pluck('name');
        // return Chartisan::build()
        //     ->labels([$plucked->values()])
        //     ->dataset('Sample', [$plucked->values()])
        //     ->dataset('Sample 2', [3, 2, 1]);
    }
}
