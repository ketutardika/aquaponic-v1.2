<div class="row">
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th><strong>Date</strong></th>
                    @foreach($datalogs as $date => $devices)
                        @foreach($devices as $device)
                            <th><strong>{{ $device->device_name }}</strong></th>
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
</div>
