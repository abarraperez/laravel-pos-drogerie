@extends('backend.layout.app') 

    @section('content')
           <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!-- begin Search form-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-inline" action="#" method="get">
                                                <div class="form-group mb-12">
                                                    <label for="inputPassword2" class="sr-only">Buscar</label>
                                                    <input type="text" class="form-control" id="inputPassword2" placeholder="Buscar" name="search">
                                                </div>
                                                <button type="submit" class="btn btn-primary mb-6">Buscar</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3  col-lg-offset-3">

                                            <a href="{{route('user.create')}}" class="btn btn-success">+ Agregar Nuevo </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h2>UsuariosX</h2>
                                    <div class="responsive-table-plugin" style="padding-bottom: 15px;">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Success!</strong> {{Session::get('success')}}
                                        </div>    
                                        @endif
                                        
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th data-priority="1">Name</th>
                                                        <th>Image</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                       
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($users))
                                                           
                                                       
                                                        @foreach ($users as $user)
                                                           
                                                     
                                                    <tr>
                                                        <th>{{$user->id}}</th>
                                                        <td>{{uppercase($user->name)}}</td>
                                                        <td><img  style="width:60px;height:60px;" 
                                                        src="{{asset('images/'.Auth::user()->thumbnail)}}" alt=""></td>
                                                        <td><a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-bordred-primary waves-effect  width-md waves-light">Edit</a></td>
                                                        <td><p  onclick="event.preventDefault();document.getElementById('del-form-{{$user->id}}').submit()" class="btn btn-bordred-danger waves-effect  width-md waves-light">Delete</p></td>

                                                        <form id="del-form-{{$user->id}}" action="{{url('user/'.$user->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$user->id}}">
                                                           
                                                        </form>
                                                        

                                                       
                                                    </tr>
                                                      @endforeach

                                                       @endif
                                                    </tbody>
                                                </table>
                                            </div>


    
                                        </div>

                                    </div>
                                    {{$users->links()}}
                                </div>

                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

               

      @endsection()