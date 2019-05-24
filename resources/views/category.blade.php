@extends('admin.layouts.master')

@section('title')
    Department
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-list"></span> Department
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin Panel</a></li>
                <li class="active">Department</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @if(Session('info'))
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
                        </div>
                    </div>
                @endif
              <div class="col-md-8">
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                      Department / Data
                  </div>
                  <div class="panel-body">
                      <div class="table">
                          <table class="table table-hover">
                              <tr>
                                  <td>Id</td>
                                  <td>Department</td>
                                  <td>Created Dated</td>
                                  <td>Action</td>

                              </tr>
                              @foreach($cat as $cats)
                                  <tr>
                                      <td>{{$cats->id}}</td>
                                      <td>{{$cats->cat_name}}</td>
                                      <td>{{$cats->created_at->diffForHumans()}}</td>
                                      <td>
                                          <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#e{{$cats->id}}"><i class="fa fa-edit"></i></a>
                                          <input type="hidden" name="id" value="{{$cats->id}}">
                                          <div class="modal" tabindex="-1" id="e{{$cats->id}}" role="dialog">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header bg-primary">
                                                          <h5 class="modal-title">Edit "{{$cats->cat_name}}'</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                         <form method="post" action="{{route('updateDepartment',['cat'=>$cats->id])}}">

                                                             <div class="form-group">
                                                             <label for="cat_name" class="control-label">Department Name</label>
                                                             <input type="text" class="form-control" name="cat_name" value="{{$cats->cat_name}}">
                                                             </div>
                                                             <div class="modal-footer">
                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                 <button type="submit" class="btn btn-primary">Save changes</button>
                                                             </div>
                                                             @csrf
                                                         </form>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                          <a href="#" data-toggle="modal" data-target="#d{{$cats->id}}" class="text-danger btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                          <!-- Delete Modal -->
                                          <div class="modal fade" id="d{{$cats->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                  <form method="post" action="{{route('department.delete')}}">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                              <h4 class="modal-title" style="color: red" id="myModalLabel"><i class="fa fa-warning" style="color: red"></i> confirm delete data</h4>
                                                          </div>
                                                          <div class="modal-body text-danger">
                                                              <input type="hidden" name="id" value="{{$cats->id}}">
                                                              Are you sure want to delete this letter no of <b>"{{$cats->letter_no}}"</b>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <button type="submit" class="btn btn-primary">Confirm</button>
                                                          </div>

                                                      </div>
                                                      {{csrf_field()}}
                                                  </form>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                          </table>
                      </div>
                  </div>
              </div>
              </div>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Create Department
                        </div>
                        <div class="panel-body">
                            <form method="post" action="{{route('postDepartment')}}">
                                <div class="form-group">
                                    <label for="cat_name" class="control-label" >Department Name</label>
                                    <input type="text" id="cat_name" name="cat_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('script')

@stop