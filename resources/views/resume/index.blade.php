@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="panel">
        <div class="panel-heading">
          <h4>{{ trans('resume.create_resume') }}</h4>
        </div>
        <div class="panel-body">
          @if ($errors->any())
              <div class="alert alert-warning">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div class="panel panel-primary">
            <div class="panel-heading">
              使用提示
            </div>
            <div class="panel-body">
              如果您第一次使用SAM系统，您需要在下方表格填写完整信息。<br>
              若您之前已在其他社团处登记过您的信息，则您只需要输入您的邮箱（横线下方不需要填写），之前的信息会自动发送给当前社团。
              <br>强烈建议您使用相同邮箱注册SAM账号，管理您的简历并查看社团招新进展。
            </div>
          </div>

              <form method="post" action="{{ URL::action('ResumeController@save') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">{{ trans('resume.email') }}</label>
                  <input type="email" @if(Auth::check()) value="{{ Auth::user()->email }}" readonly  @endif class="form-control" id="email" name="email">
                </div>
                <hr>
                <div class="form-group">
                  <label for="name">{{ trans('resume.true_name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="contact">{{ trans('resume.contact') }}</label>
                  <input type="text" class="form-control" id="contact" name="contact">
                </div>
                <div class="form-group">
                  <label for="stunumber">{{ trans('resume.student_number') }}</label>
                  <input type="text" class="form-control" id="stunumber" name="student_number">
                </div>
                <div class="form-group">
                  <label for="addinfo">{{ trans('resume.additional_info') }}</label>
                  <textarea id="addinfo" class="form-control" name="additional_info" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">{{ trans('resume.submit') }}</button>
              </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
