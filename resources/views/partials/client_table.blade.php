<div class="table-responsive">
    <table id="dataTableExample" class="table">
      <thead>
        <tr>
          <th>Owner Image</th>
          <th>Owner Name</th>
          <th>Owner Email</th>
          <th>Owner Phone</th>
          <th>Designation</th>
          <th>Company Name</th>
          <th>Location</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @if (count($datalist)>0)
			    @foreach($datalist as $row)
          @if ($row->owner_image != '')
          <td class="text-center"><div class="table_col_image"><img src="{{ asset('uploads/image/' . $row->owner_image) }}" /></div></td>
          @else
          <td class="text-center"><div class="table_col_image"><img src="{{ asset('admin') }}/images/others/placeholder.jpg" /></div></td>
          @endif
          <td>{{$row->owner_name}} </td>
          <td>{{$row->owner_email}}</td>
          <td>{{$row->owner_phone}}</td>
          <td>{{$row->designation}}</td>
          <td>{{$row->company_name}}</td>
          <td>{{$row->location}}</td>
          @if ($row->status == 1)
          <td class="text-center"><div class="btn btn-success text-center ">Publish</div></td>
          @else
          <td class="text-center"><div class="btn btn-danger text-center">Pendind</div></td>
          @endif
          
          <td>
            <a onclick="onEdit({{ $row->id }})" class="dropdown-item btn btn-success" href="javascript:void(0);">Edit</a>
            <a onclick="onDelete({{ $row->id }})" class="dropdown-item" href="javascript:void(0);" class="dropdown-item btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td class="text-center" colspan="7">{{ __('No data available') }}</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>