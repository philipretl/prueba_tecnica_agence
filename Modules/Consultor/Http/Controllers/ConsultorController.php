<?php

namespace Modules\Consultor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
use Modules\Consultor\Charts\ConsultorChart;
use Modules\Results\Result;
class ConsultorController extends Controller
{
    private $consultorService;
    public function __construct(ConsultorServiceInterface $consultorService){
      $this->consultorService=$consultorService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function reporte(Request $request){
      $result= new Result();
      $result= $this->consultorService->calcularGanancias($request->all(),$result,'api');

      switch ($result->getStatus()) {
        case 'SUCCESS':
          return view('consultor::reportes')
          ->with('fecha_inicial',$result->getDataAll()['fecha_inicial'])
          ->with('fecha_final',$result->getDataAll()['fecha_final'])
          ->with('reportes',$result->getDataAll()['consultores'])
          ->with('consultores',$result->getDataAll()['consultores']);
          break;

        case 'ERR_FORM' :
            return back()->withInput($request->all())
             ->withErrors($result->getAllError());

        break;
        default:
          return redirect()->route('consultor.dashboard');
        break;
      }

    }

    public function index()
    {
      $result= new Result();
      $result= $this->consultorService->consultoresActivos();

      switch ($result->getStatus()) {

        case 'SUCCESS':
            return view('consultor::consultor')
            ->with('consultores',$result->getDataAll()['consultoresActivos']);
          break;
        case 'EMPTY' :
            return view('consultor::consultor');
          break;
        default:
          return redirect()->route('consultor.dashboard');
        break;

      }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

     public function reporteDesempenio(Request $request){

       $result= new Result();
       $result= $this->consultorService->generarReporteDesempenio($request->all());

       switch ($result->getStatus()) {

         case 'SUCCESS':
             return view('consultor::graficos')
            // ->with('desempenio_chart','holi');
             ->with('chart',$result->getDataAll()['desempenio_chart']);
           break;
         case 'EMPTY' :
           return view('consultor::graficos')
            ->with('mensaje','No hay graficos que mostrar');
           //->with('desempenio_chart',$result->getDataAll()['desempenio_chart']);
           break;
         default:
           return redirect()->route('consultor.dashboard');
         break;

       }
     }
     public function reporteGanancia(Request $request){

       $result= new Result();
       $result= $this->consultorService->generarReporteGanancia($request->all());

       switch ($result->getStatus()) {

         case 'SUCCESS':
             return view('consultor::graficos')
            // ->with('desempenio_chart','holi');
             ->with('chart',$result->getDataAll()['ganancia_chart']);
           break;
         case 'EMPTY' :
           return view('consultor::graficos')
            ->with('mensaje','No hay graficos que mostrar');
           //->with('desempenio_chart',$result->getDataAll()['desempenio_chart']);
           break;
         default:
           return redirect()->route('consultor.dashboard');
         break;

       }
     }
}
