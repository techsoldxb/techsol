@extends('layouts.admin')
@section('content')



<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Supplier Master
                        <a href="{{ route('pos.suppliers.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> ID </th>
                                <th> Supplier Name</th>
                                <th> Telephone </th>
                                <th>Contact Person</th>
                                <th>Created Date </th>
                                <th> Created User </th>
                                <th>Status</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($supplier))

                            @foreach($supplier as $c)

                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->supp_name }}</td>
                                <td class="text-right font-weight-bold">{{ $c->supp_tel}}</td>
                                <td>{{ $c->supp_contact }}</td>
                                <td> {{ $c->supp_created_uid }} </td>

                                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>


                                <td>

                                    @if($c->supp_status =='0')
                                    <div class="text-danger">
                                        Inactive
                                    </div>
                                    @elseif($c->supp_status =='1')
                                    Active
                                    @else
                                    Status Error
                                    @endif

                                </td>




                                <td>




                                    <a href="{{ route('job.jobfault.edit',$c->id) }}">
                                        <i class="fa fa-edit"></i>

                                    </a>



                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">

                                        <!-- /.Delete <i class="fa fa-trash text-red"></i > -->


                                    </a>
                                    <form action="{{ route('job.jobfault.destroy', $c->id)}}" method="POST">
                                        @method('DELETE')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>

                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="11">No Record Found</td>
                            </tr>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>


                                <th> ID </th>
                                <th> Supplier Name</th>
                                <th> Telephone </th>
                                <th>Contact Person</th>
                                <th>Created Date </th>
                                <th> Created User </th>
                                <th>Status</th>
                                <th> Action </th>

                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection
