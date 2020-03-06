<?php

namespace Modules\Consultor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
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
      $result= $this->consultorService->calcularGanancias($request->all(),$result);

      switch ($result->getStatus()) {
        case 'SUCCESS':
            return view('consultor::consultor')->with('data',$result->getDataAll());
          break;
        case 'EMPTY_CONSULTORS' :
            flash('Seleccione al menos un consultor')->error();
            return redirect()->back();
          break;

        default:
          $response= $this->errorResponse(
              $result->getAllError(),
              $result->getAllMessage(),
              $result->getCode(),
              'exist conflict whit the request, please check the errors and messages'
          );
          break;
      }
      return $response;
    }

    public function index()
    {
      $result= new Result();
      $result= $this->consultorService->consultoresActivos();

      switch ($result->getStatus()) {
        case 'SUCCESS':
            return view('consultor::consultor')->with('data',$result->getDataAll());
          break;
        case 'EMPTY' :
            return view('consultor::consultor');
          break;

        default:
          $response= $this->errorResponse(
              $result->getAllError(),
              $result->getAllMessage(),
              $result->getCode(),
              'exist conflict whit the request, please check the errors and messages'
          );
          break;
      }
      return $response;

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('consultor::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('consultor::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('consultor::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
