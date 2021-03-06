<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style>
        body {
            background-color: #000;
        }

        html,
        body {
            height: 100%;
        }

        .imagebg {
            background-image: url("/images/mixing-desk-351478_1920.jpg");



            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-filter: blur(3px);
            filter: blur(3px);
            opacity: 0.6;
            filter: alpha(opacity=60);
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 20px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
        }

    </style>

    <style>
        #orig_article_block {
            position: fixed;
            left: 0px;
            bottom: 0px;
            height: 60px;
            width: 100%;
            background: #222;
            color: #fff;
            padding: 10px;
        }

        #orig_article_block a {
            color: #fff;
            text-decoration: underline;
        }

        /* IE 6 */
        * html #orig_article_block {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe=document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
        }

    </style>


</head>

<body>
    <div class="container">
        <div class="imagebg"></div>
        <div class="row " style="margin-top: 50px">
            <div class="col-md-6 col-md-offset-3 form-container">
                <div class="login-logo" align="center">
                    <img src={{asset('dist/img/tclogo1.png class=img-circle elevation-2 alt=Logo')}}>
                </div>

                <h2>Feedback</h2>
                <p> Please provide your feedback below: </p>



                <form class="needs-validation" name="myform" id="myform" novalidate method="post"
                    action="{{ route('job.jobfeedback.store') }}" enctype="multipart/form-data" autocomplete="off"
                    autofill="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>How do you rate your overall experience?</label>
                            <p>
                                <label class="radio-inline">
                                    <input type="radio" name="fb_experience" id="radio_experience" value="Excellent">
                                    Excellent
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="fb_experience" id="radio_experience" value="Good">
                                    Good
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="fb_experience" id="radio_experience" value="Poor">
                                    Poor
                                </label>
                            </p>

                            @error('fb_experience')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="comments"> Comments:</label>
                            <textarea class="form-control" type="textarea" name="fb_comments" id="fb_comments"
                                placeholder="Your Comments" maxlength="6000" rows="4"></textarea>

                            @error('fb_comments')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name"> Your Name:</label>
                            <input type="text" class="form-control" id="fb_name" name="fb_name"
                                value="{{ app('request')->input('n') }}" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="mobile"> Mobile:</label>
                            <input type="text" class="form-control" id="fb_mobile" name="fb_mobile"
                                value="{{ app('request')->input('m') }}" required>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="fb_name" name="fb_job_number"
                        value="{{ app('request')->input('j') }}" required>


                    @error('fb_job_number')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="hidden" class="form-control" id="fb_comp_code" name="fb_comp_code"
                        value="{{ app('request')->input('c') }}" required>

                    <div class="row">
                        <div class="col-sm-12 form-group">


                            <input type="submit" class="btn btn-lg btn-warning btn-block" Value="Post">
                        </div>
                    </div>
                </form>
                <div id="success_message" style="width:100%; height:100%; display:none; ">
                    <h3>Posted your feedback successfully!</h3>
                </div>
                <div id="error_message" style="width:100%; height:100%; display:none; ">
                    <h3>Error</h3> Sorry there was an error sending your form.
                </div>
            </div>
        </div>
    </div>
</body>

</html>
