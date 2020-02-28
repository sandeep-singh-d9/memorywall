@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>@lang('language.product')</h2>
    </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('Admin.errors.errorMessage')
            <div class="card">
                <div class="header">
                    <h2>User <a href="{{URL::to('users/create')}}"
                            class="pull-right btn btn-primary">Add User</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users) and (count($users) > 0))
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <!-- <td>{{ $user->id }} </td> -->
                                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>

                                    <td class="switch">
                                        <label>
                                            <input type="checkbox"
                                                onclick="changeStatus(this.value, <?php echo $user->id; ?> )"
                                                value="{{$user->status}}"
                                                <?php if ($user->status == '1') {echo 'checked';}?>>
                                            <span class="lever"></span>
                                        </label>
                                    </td>
                                    <td width="15%" style="text-align: center;">
                                        <a href="{{ route('users.edit', $user->id) }}" class="tool_tip">
                                            <i class="material-icons-outlined" data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Edit">edit</i>
                                        </a>
                                        @if($user->id)
                                        <?php $route = URL::to('users/' . $user->id);
$token = csrf_token();
?>
                                        <a href="#" class="tool_tip"
                                            onclick="deleteValue('<?php echo $route; ?>', this)">
                                            <i class="material-icons-outlined iconDelete" data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="Delete">delete</i>
                                        </a>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" align="center">
                                        record not found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>

<script>
    function confirmDelete() {
    return confirm("Are you sure want to delete user?");
}
function changeStatus(value,id){

    //$('#errorAlertMessage').empty('')
    //$conf = confirm("<?php echo __('language.statusMessage'); ?>")
        if(value == 1){
            value = 0
        }else{

            value = 1
        }
        $.ajax({
            type: 'POST',
            url: 'userStatus/' + id,
            headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
            data: {
                'status' : value
            },
            success: function(msg){
                $('#errorAlertMessage').empty();
                $('#errorAlertMessage').append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg.success+'</div>');
            },
            error: function(request,msg,error) {
                $('#errorAlertMessage').empty();
                // handle failure
                $('#errorAlertMessage').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+error+'</div>');
                // $(this).parent('tr').remove();
                // setTimeout(function(){ location.reload(); }, 1000);
            }

        });

    }

</script>
@endsection