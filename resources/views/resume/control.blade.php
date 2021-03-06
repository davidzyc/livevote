@extends('layouts.control_center')

@section('control_content')

          <h1>{{ trans('resume.manage_resume_sent_out') }}</h1>

          @if (session('success'))
          <div class="card text-white card-success">
            <div class="card-header">
              {{ trans('resume.success') }}
            </div>
            <div class="card-body">
              {{ trans('resume.detach_success') }}
            </div>
          </div>
          @endif

          <hr>
          <div class="row">
            @foreach($orgs as $org)
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{ $org->organization_name }}</h4>
                </div>
                <div class="card-body">
                  <p>{!! Purifier::clean($org->organization_description) !!}</p>
                  <div class="col-md-6"><i class="fa fa-user-o" aria-hidden="true"></i> {{ $org->user->name }}</div>
                  <div class="col-md-6"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $org->organization_contact }}</div>
                </div>
                <div class="card-footer">
                  <form action="{{ URL::action('ResumeController@detach', ['id' => $org->id]) }}" method="post">
                    <a href="{{ url('org', $org->id) }}" class="btn btn-primary">{{ trans('org.detail') }}</a>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">{{ trans('resume.detach') }}</button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>
@endsection
