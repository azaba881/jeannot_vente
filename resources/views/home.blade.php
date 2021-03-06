@extends('layouts.global')

@section('content') 

<style>
    input {
    padding: 5px;
    width: 100%;
    font-size: 18px;
    font-family: Raleway;
    border: 1px solid #0080ff;
  }

  form
  {
      padding:20px;
      
  }
</style>
                <!-- .row --> 
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">VENTE TOTALE</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$stavent}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">UTILISATEURS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$utilisateur}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            
                            <ul class="list-inline two-part">
                                <li>
                                    <canvas id="pieChart" class="chartjs-render-monitor"></canvas>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">911</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
                <div class="row" style="margin:0px important!;width:100%;margin-left:20px;"> 
                 
                        <a data-toggle="modal" data-target="#exampleModal" href="https://wrappixel.com/templates/ampleadmin/" style="font-size:18px;" target="_blank" class="btn btn-info hidden-xs hidden-sm waves-effect waves-light" > Cr??er une offre</a>
                               
                </div><br><br>
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                    <option>March 2017</option>
                                    <option>April 2017</option>
                                    <option>May 2017</option>
                                    <option>June 2017</option>
                                    <option>July 2017</option>
                                </select>
                            </div>
                            <h3 class="box-title">HISTORIQUE DES VENTES</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>N??</th>
                                            <th>PRODUIT</th>
                                            <th>NOMBRE</th>
                                            <th>PRIX</th>
                                            <th>DATE ET HEURE</th>
                                            <th>VENDEUR</th>
                                            @if (Auth()->User()->role == "admin")
                                            <th>ACTION</th>
                                            @endif
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vente as $vente)
                                            
                                        <tr>
                                            <td>{{$vente->id}}</td>
                                            <td class="txt-oflo" style="text-transform:uppercase">{{$vente->produit}}</td>
                                            <td>{{$vente->nombre}}</td>
                                            <td class="txt-oflo">{{$vente->prix}} FCFA</td>
                                            <td><span class="">{{$vente->created_at}}</span></td>
                                            <td><span  style="color:#098ddf;text-transform:uppercase">{{$vente->caissier}}</span></td>
                                            @if (Auth()->User()->role == "admin")
                                            <td style="text-align:center;"><span class="text-danger text-center" ><i class="fa fa-pencil text-success"></i> </span></td>
                                            @endif                                            
                                        </tr> 
                                        
                                        @endforeach
                                        <tr style="background-color: rgb(228, 228, 228);color:black">
                                            <td>TOTAUX</td>                              
                                            <td></td>                              
                                            <td>{{$sommo}}</td>                              
                                            <td>{{$somme}} FCFA</td>                              
                                            <td></td>                              
                                            <td></td>                              
                                            <td></td>                              
                                          </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                
            </div>
            <!-- /.container-fluid -->

            <div class="modal fade" id="exampleModal" tabindex="-1"  >
                <div class="modal-dialog">
                    <div class="modal-content" >
                    <div class="form-input-content">
                        <div class="card login-form mb-0" >
                            <div class="card-body pt-5">
                             <form method="POST" class="mt-3 mb-5 login-input" action="{{route('vente')}}" enctype="multipart/form-data">
                            @csrf            
                            <div class="form-group row">
                                <label for="produit" class="col-md-12 col-form-label">NOM DU PRODUIT</label>
            
                                <div class="col-md-12">
                                    <input id="produit" style="height: 50px;border-radius:0"  type="text" class="form-control @error('produit') is-invalid @enderror" name="produit" value="{{ old('produit') }}" required autocomplete="produit" autofocus>
            
                                    @error('produit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="nombre" class="col-md-12 col-form-label">NOMBRE</label>
            
                                <div class="col-md-12">
                                    <input id="nombre" style="height: 50px;border-radius:0"  type="number" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
            
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row">
                                <label for="prix" class="col-md-12 col-form-label">PRIX DU PRODUIT</label>
            
                                <div class="col-md-12">
                                    <input id="prix" style="height: 50px;border-radius:0"  type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>
            
                                    @error('prix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                                   
             
                            <div class="form-group">
                                
                                    <button  type="submit" style="background-color: #098ddf;width:100%;color:white;" class="btn" style="width: 100%;padding-top:15px;padding-bottom:15px;">
                                       CR??ER UNE VENTE
                                    </button>
                            </div>
                           
                        </form>  
                    </div>
                </div>
                </div>
            </div>
                    
                </div>
            </div>

            <script>
                let ctxLine,
                    ctxBar,
                    ctxPie,
                    optionsLine,
                    optionsBar,
                    optionsPie,
                    configLine,
                    configBar,
                    configPie,
                    lineChart;
                barChart, pieChart;
                // DOM is ready
                $(function () {
                    updateChartOptions();
                    drawLineChart(); // Line Chart
                    drawBarChart(); // Bar Chart
                    drawPieChart(); // Pie Chart
                    drawCalendar(); // Calendar
        
                    $(window).resize(function () {
                        updateChartOptions();
                        updateLineChart();
                        updateBarChart();
                        reloadPage();
                    });
                })
            </script>
            <script src="js/Chart.min.js"></script>

            @endsection
            