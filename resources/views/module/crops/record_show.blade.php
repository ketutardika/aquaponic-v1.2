@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Crops</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chart Data {{ $crops->crop_name}}</li>
  </ol>
</nav>

<div class="row">
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Record Data {{ $crops->crop_name}}</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    
    <a href="{{ route('crops.record_export_excel', $crops->id ) }}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Export Record Data
    </a>
  </div>
</div>
</div>

<div class="row">
    <form action="" method="post" id="filter-form">
    @csrf
    
    <div class="input-group mb-3">    
        <div class="input-group-prepend">
          <span class="input-group-text" id=""><label for="date-range-picker">Date Range:</label></span>
        </div>    
        <input type="text" class="form-control" name="date_range" id="date-range-picker" value="{{ $thisMonth }}">        
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
    
</form>
</div>

<div class="row">
  <div class="col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <canvas id="chartjsLine" class="table"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
        <tr>
            <th>Date</th>
            @foreach($datalogs as $date => $devices)
                @foreach($devices as $device)
                    <th>{{ $device->device_name }}</th>
                @endforeach
                @break
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($datalogs as $date => $devices)
            <tr>
                <td>{{ $date }}</td>
                @foreach($devices as $device)
                    <td>{{ $device->avg_data_reading }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
            </table>
        </div>
    </div>
</div>
</div>



<div class="row">

</div>


@endsection

@push('plugin-scripts')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
@endpush

@push('custom-scripts')

  <script>
$(document).ready(function() {
    var table = $('#dataTableExample').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('crops.record_show_pivot', $crops->id) }}',
            data: function(d) {
                d.date_range = $('#date-range-picker').val();
            }
        },
        columns: [
            {data: 'date', name: 'date'},
            @foreach($datalogs as $datalog)
                @foreach($datalog as $key => $value)
                    {data: '{{$value->device_id}}', name: '{{$value->device_id}}'},
                @endforeach
                @break
            @endforeach
        ],
        "aLengthMenu": [
          [5, 10, 20, 50, -1],
          [5, 10, 20, 50, "All"]
        ],
        order: [[0, 'desc']],
        "iDisplayLength": 10,
        "columnDefs": [
              { width: 10, targets: 3 }
          ],
        "language": {
          search: ""
        }
    });

    var options = {
        'Today': [moment(), moment()],
        'This Week': [moment().startOf('week'), moment().endOf('week')],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'This Year': [moment().startOf('year'), moment().endOf('year')]
    };

    var start = moment().subtract(1, 'months');
    var end = moment().add(1,'days');

    var startDate = start;
    var endDate = end;

    var chartData = [];
    let myChart;

    var timeFormat = 'YYYY-MM-DD';

    $.ajax({
        url: '{{ route('crops.record_show_pivot_chart', $crops->id) }}',
        type: 'GET',
        data: {
            start_date: startDate.format('YYYY-MM-DD'),
            end_date: endDate.format('YYYY-MM-DD')
        },
        success: function(response) {
            chartData = response;

            var ctx = document.getElementById('chartjsLine').getContext('2d');

            myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: chartData.datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                        title:      {
                            display: true,
                            text:    "Chart.js Time Scale"
                        },
                    scales:     {
                            xAxes: [{
                                type:       "time",
                                time:       {
                                    format: timeFormat,
                                    tooltipFormat: 'll'
                                },
                                scaleLabel: {
                                    display:     true,
                                    labelString: 'Date'
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display:     true,
                                    labelString: 'value'
                                }
                            }]
                        }
                }
            });
        }
    });

    $('#date-range-picker').daterangepicker({
        startDate: start,
        endDate: end,
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        },
        ranges: options
    });

    $('#date-range-picker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        var start = picker.startDate;
        var end = picker.endDate;
        $.ajax({
            url: '{{ route('crops.record_show_pivot_chart', $crops->id) }}',
            type: 'GET',
            data: {
                start_date: start.format('YYYY-MM-DD'),
                end_date: end.format('YYYY-MM-DD')
            },
            success: function(response) {
                chartData = response;
                myChart.data.labels = chartData.labels;
                myChart.data.datasets = chartData.datasets;
                myChart.update();
            }
        });
        $('#filter-form').submit();        
    });

    $('#date-range-picker').on('cancel.daterangepicker', function(ev, picker) {
        var start = picker.startDate;
        var end = picker.endDate;

        $.ajax({
            url: '{{ route('crops.record_show_pivot_chart', $crops->id) }}',
            type: 'GET',
            data: {
                start_date: startDate.format('YYYY-MM-DD'),
                end_date: endDate.format('YYYY-MM-DD')
            },
            success: function(response) {
                chartData = response;
                myChart.data.labels = chartData.labels;
                myChart.data.datasets = chartData.datasets;
                myChart.update();
            }
        });
        $(this).val('');
        $('#filter-form').submit();        
    });

    $('#filter-form').submit(function(e) {
        e.preventDefault();
        table.draw();
        myChart.update();
    });
});

</script>
@endpush