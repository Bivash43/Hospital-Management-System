@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">
                Hello Admin!!
            </h3>
        </div>
        <div class="card-body">
            <div class="col-12">
                <h1>Welcome to Dashboard</h1>
                <div>
                <canvas id="myChart"></canvas>
                </div>
            </div>

            <!-- /.row -->
        </div>
<script>
  const ctx = document.getElementById('myChart');


  new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ['Jan' , 'Feb' , 'Mar' , 'Apr' , 'Jun'],
        datasets: [
            {
            label: 'Doctor',
            data:  JSON.parse('{!! $doctor !!}'),
            fill: false,
            borderColor: 'rgb(52, 171, 235)',
            tension: 0.1
            },
            {
            label: 'Patient',
            data: JSON.parse('{!! $patient !!}'),
            fill: false,
            borderColor: 'rgb(195, 52, 235)',
            tension: 0.1
            }
    ]},
  });
</script>
    </div>
@endsection