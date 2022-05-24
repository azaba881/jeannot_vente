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
                <!-- /.row -->
           <br>
                
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
                                            <th>N°</th>
                                            <th>NOM ET PRENOM</th>
                                            <th>EMAIL</th>
                                            <th>TYPE D'UTILISATEUR</th>
                                            <th>DATE D'ENREGISTREMENT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                            
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td class="txt-oflo" ><span style="text-transform:uppercase;">{{$user->name}} {{$user->prenom}}</span></td>
                                            <td style="text-transform: uppercase">{{$user->email}}</td>
                                            <td class="txt-oflo" style="text-transform: uppercase">{{$user->role}}</td>
                                            <td><span class="" style="text-transform:uppercase;">{{$user->created_at}}</span></td>
                                        </tr>
                                        @endforeach
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

            
            @endsection
            