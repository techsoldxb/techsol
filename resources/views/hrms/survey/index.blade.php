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
          <h3 class="card-title">Employee Survey


            <a href="{{ route('hrms.survey.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>


          <div class = "row"> 
            <div class="col-lg">
          <ul class="list-group">
            <li class="list-group-item list-group-item-success">A. HUMAN RESOURCE FUNCTION AND POLICIES <br>
              1. Staff issues are handled confidentially, fairly, and in a timely manner. <br>
              2. There are clear human resource policies that are understood by all staff. <br>
              3. The human resource systems in this organization are fair and work well.
            </li>
          </div>
          <div class="col-lg">
            <li class="list-group-item list-group-item-secondary">B. PROFESSIONAL DEVELOPMENT <br>
              1. I believe that the training policy here is fair. <br>
              2. I am satisfied that this organization provides all staff with training opportunities. <br>
              3. I am satisfied that this organization provides me with meaningful opportunities for career development.
            </li>
          </div>
          </div>

          <div class = "row"> 
            <div class="col-lg">

            <li class="list-group-item list-group-item-info">C. PERFORMANCE MANAGEMENT <br>
              1. My manager/supervisor provides me with clear direction. <br>
              2. My manager/supervisor provides me with constructive feedback. <br>
              3. My manager/supervisor holds regular performance reviews with me.
            </li>
          </div>
          <div class="col-lg">
            <li class="list-group-item list-group-item-warning">D. COMMUNICATIONS <br>
              1. My organization communicates directly with me (i.e. they have commented on my work; they have asked
              what motivates me, etc.). <br>
              2. I feel part of the organization (i.e. someone regularly communicates the company's "big picture" and my
              role in achieving it). <br>
              3. The goals, values, and objectives of the organization have been clearly identified for me.
            </li>
          </div>
        </div>

        <div class = "row"> 
          <div class="col-lg">

            <li class="list-group-item list-group-item-danger">E. EMPLOYEE BENEFITS AND COMPENSATION <br>
              1. I believe that salaries are fair and there are no anomalies or favouritism. <br>
              2. Salaries are competitive compared to other similar organizations. <br>
              3. We have many different benefits in addition to salary.
            </li>
          </div>
          <div class="col-lg">

            <li class="list-group-item list-group-item-primary">F. EMPLOYEE RELATIONS, WELFARE, AND FULFILLMENT <br>
              1. I feel that management cares about employees and take an interest in them. <br>
              2. I observe that employees trust and respect management. <br>
              3. I observe that there are good working relations and teamwork at most levels in most departments.
            </li>
          </div>
        </div>

          </ul>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th> ID </th>
                <th> Name </th>
                <th> Date </th>

                <th> A.1 </th>
                <th> A.2 </th>
                <th> A.3 </th>

                <th> B.1 </th>
                <th>B.2</th>
                <th>B.3</th>

                <th>C.1</th>
                <th>C.3</th>
                <th>C.3</th>

                <th>D.1</th>
                <th>D.3</th>
                <th>D.3</th>

                <th>E.1</th>
                <th>E.3</th>
                <th>E.3</th>

                <th>F.1</th>
                <th>F.3</th>
                <th>F.3</th>

              </tr>
            </thead>
            <tbody>

              @if(count($survey))

              @foreach($survey as $c)

              <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->user_name }}</td>
                <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>

                <td>{{ $c->a1 }}</td>
                <td>{{ $c->a2 }}</td>
                <td>{{ $c->a3 }}</td>

                <td>{{ $c->b1 }}</td>
                <td>{{ $c->b2 }}</td>
                <td>{{ $c->b3 }}</td>

                <td>{{ $c->c1 }}</td>
                <td>{{ $c->c2 }}</td>
                <td>{{ $c->c3 }}</td>

                <td>{{ $c->d1 }}</td>
                <td>{{ $c->d2 }}</td>
                <td>{{ $c->d3 }}</td>

                <td>{{ $c->e1 }}</td>
                <td>{{ $c->e2 }}</td>
                <td>{{ $c->e3 }}</td>

                <td>{{ $c->f1 }}</td>
                <td>{{ $c->f2 }}</td>
                <td>{{ $c->f3 }}</td>







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
                <th> Name </th>
                <th> Date </th>

                <th> A.1 </th>
                <th> A.2 </th>
                <th> A.3 </th>

                <th> B.1 </th>
                <th>B.2</th>
                <th>B.3</th>

                <th>C.1</th>
                <th>C.3</th>
                <th>C.3</th>

                <th>D.1</th>
                <th>D.3</th>
                <th>D.3</th>

                <th>E.1</th>
                <th>E.3</th>
                <th>E.3</th>

                <th>F.1</th>
                <th>F.3</th>
                <th>F.3</th>

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