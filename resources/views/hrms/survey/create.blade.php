@extends('layouts.admin')
@section('content')

<!-- This script is used to allow only number in the bill amount field -->
<script>
  function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
</script>

<script>
  $(function()
{
    $("#myform").validate(
      {
        rules: 
        {
          item: 
          {
            required: true
          }
        }
      });	
});
</script>



<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<script>
  function calc1() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
  document.getElementById('student_amount').value = textValue1 * textValue2;   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

 

      document.getElementById('tb_total').value = textValue1 * textValue2 + textValue3 * textValue4 
      + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

   function calc2() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  
  var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

    
  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('teacher_amount').value = textValue3 * textValue4; 

  

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }   

  function calc3() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;


  document.getElementById('adult_amount').value = textValue5 * textValue6; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

  function calc4() 
  {
    var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;



    var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('addon1_amount').value = textValue7 * textValue8; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }  
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Employee Survey</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

          <li class="breadcrumb-item"><a href="{{route('hrms.survey.index')}}">Survey</a></li>


        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">

    <form class="needs-validation" name="myform" id="myform" novalidate method="post"
      action="{{ route('hrms.survey.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">A. HUMAN RESOURCE FUNCTION AND POLICIES</p>
        <div class="card-body">

          <div class="form-group">

            <div class="row">
              <label class="col-lg-7" for=""> 1. Staff issues are handled confidentially, fairly, and in a timely
                manner. <br>
                يتم التعامل مع قضايا الموظفين بسرية ونزاهة وفي الوقت المناسب.
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="a1" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة
                  </option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة
                  </option>

                </select>
                <div class="clear-fix"></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. There are clear human resource policies that are understood by
                all staff <br>
                هناك سياسات موارد بشرية واضحة يفهمها جميع الموظفين
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="a2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة
                  </option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة
                  </option>

                </select>
                <div class="clear-fix"></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. The human resource systems in this organization are fair and
                work well. <br>
                أنظمة الموارد البشرية في هذه المنظمة عادلة وتعمل بشكل جيد
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="a3" required>
                  
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
                <div class="clear-fix"></div>
              </div>
            </div>
          </div>









        </div>



      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">B. PROFESSIONAL DEVELOPMENT</p>
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">1. I believe that the training policy here is fair. <br>
                أعتقد أن سياسة التدريب هنا عادلة.
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="b1" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. I am satisfied that this organization provides all staff with training
                opportunities. <br>
                أنا مرتاح لأن هذه المنظمة توفر التدريب لجميع الموظفين
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="b2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. I am satisfied that this organization provides me with meaningful
                opportunities for career development. <br>
                أنا مرتاح لأن هذه المنظمة توفر لي فرصًا ذات مغزى للتطوير الوظيفي
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="b3" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>










        </div>
      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">C. PERFORMANCE MANAGEMENT</p>
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">1. My manager/supervisor provides me with clear direction. <br>
                مديري / المشرف يقدم لي توجيهات واضحة
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="c1" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. My manager/supervisor provides me with constructive feedback <br> 
                يقدم لي مديري / المشرف تعليقات واضحة
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="c2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. My manager/supervisor holds regular performance reviews with
                me. <br>
                يقوم مديري / المشرف بإجراء مراجعات منتظمة معي
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="c3" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>










        </div>
      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">D. COMMUNICATIONS</p>
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">1. My organization communicates directly with me (i.e. they have
                commented on my work; they have asked what motivates me, etc.). <br>
                تتواصل منظمتي معي مباشرةً (أي أنهم علقوا على عملي ؛ وسألوا عما يحفزني ، وما إلى ذلك).
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="d1" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. I feel part of the organization (i.e. someone regularly
                communicates the company's "big picture" and my role in achieving
                it). <br>
                أشعر بأنني جزء من المؤسسة (أي أن شخصًا ما ينقل بانتظام "الصورة الكبيرة" للشركة ودوري في تحقيقها)
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="d2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. The goals, values, and objectives of the organization have been
                clearly identified for me. <br>
                لقد تم تحديد أهداف المنظمة وقيمها وغاياتها بوضوح لي
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="d3" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>










        </div>
      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">E. EMPLOYEE BENEFITS AND COMPENSATION</p>
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">1. I believe that salaries are fair and there are no anomalies or
                favouritism. <br>
                أعتقد أن الرواتب عادلة وليس هناك شذوذ أو محاباة
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="e1" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. Salaries are competitive compared to other similar
                organizations. <br>
                الرواتب تنافسية مقارنة بالمنظمات الأخرى المماثلة
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="e2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>
                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. We have many different benefits in addition to salary. <br>
                لدينا العديد من المزايا المختلفة بالإضافة إلى الراتب
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="e3" required>
                <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                <option value="Agree">Agree - يوافق </option>
                <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                <option value="Disagree">Disagree - لا يوافق </option>
                <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>
                </select>
              </div>

            </div>
          </div>










        </div>
      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">F. EMPLOYEE RELATIONS, WELFARE, AND FULFILLMENT</p>
        <div class="card-body">

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">1. I feel that management cares about employees and take an
                interest in them. <br>
                أشعر أن الإدارة تهتم بالموظفين </label>
              <div class="col-lg-3">
                <select class="custom-select" name="f1" required>
                <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                <option value="Agree">Agree - يوافق </option>
                <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                <option value="Disagree">Disagree - لا يوافق </option>
                <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>

                </select>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">2. I observe that employees trust and respect management. <br>
                ألاحظ أن الموظفين يثقون ويحترمون الإدارة
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="f2" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <label class="col-lg-7" for="">3. I observe that there are good working relations and teamwork at
                most levels in most departments. <br>
                ألاحظ أن هناك علاقات عمل جيدة وعمل جماعي على معظم المستويات في معظم الإدارات
              </label>
              <div class="col-lg-3">
                <select class="custom-select" name="f3" required>
                  <option value="" selected disabled hidden>Please select - يرجى التحديد</option>
                  <option value="Strongly agree">Strongly agree - موافق بشدة</option>
                  <option value="Agree">Agree - يوافق </option>
                  <option value="Neither agree nor disagree">Neither agree nor disagree - محايد</option>
                  <option value="Disagree">Disagree - لا يوافق </option>
                  <option value="Strongly disagree">Strongly disagree - لا أوافق بشدة</option>
                </select>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="card bg-light text-dark">
        <p class="bg-primary text-white">Others</p>
        <div class="card-body">
          <div class="form-group">
            <div class="row">
              <div class="col">
                <textarea class="form-control" placeholder="Enter your other comments - اكتب تعليقاتك الأخرى
                " name="comments" rows="4" id="comment"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>










      <div class="form-group">
        <input type="submit" class="btn btn-primary" Value="Save">
        <a href="{{route('hrms.survey.index')}}" class="btn btn-warning" role="button">Cancel</a>
      </div>
    </form>
  </div>
</section>

@endsection