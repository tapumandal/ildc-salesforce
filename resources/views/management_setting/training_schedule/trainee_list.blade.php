@extends('layouts.dashboard')
@section('page_heading','')
@section('section')

<div class="col-sm-12">

    <div class="col-sm-12" style="padding-left: 0px;">
        <h2 >Training Schedule</h2>
        <hr>
    </div>

    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
        <tr>
            <th class="">Training Name</th>
            <th class="">Start Date</th>
            <th class="">End date</th>
            <th class="">Time</th>
            <th class="">Description</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $schedule->trainingName->name }}</td>
                <td>{{ $schedule->start_date }}</td>
                <td>{{ $schedule->end_date }}</td>
                <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                <td>{{ $schedule->trainingName->description }}</td>
            </tr>

        </tbody>
    </table>



    <div class="col-sm-12" style="padding-left: 0px;">
        <h2 >Trainee List</h2>
        <hr>
    </div>

    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
            <tr>
                <th class="">Serial</th>
                <th class="">Name</th>
                {{--<th class="">Schedule Name</th>--}}
                <th class="">Mobile No</th>
                <th class="">Email</th>
                <th class="">Thana</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($trainees as  $trainee)

                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $trainee->trainee->first_name }} {{ $trainee->trainee->last_name }}</td>
                    <td>{{ $trainee->trainee->mobile_no }}</td>
                    <td>{{ $trainee->trainee->email }}</td>
                    <td>{{ $trainee->trainee->thana }}</td>
                    <td><a href="{{ route('trainee_remove_action', [$schedule->id, $trainee->trainee->application_no]) }}">Remove</a></td>
                </tr>
                @php($i++)
        @endforeach
        </tbody>
    </table>
</div>
@endsection