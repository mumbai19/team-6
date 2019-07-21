@extends ('layouts.dashboard')
@section('page_heading','Assign Roles')
@section('section')
    
    {{-- Search faculty   --}}
    {{ Form::open(['action' => 'AdminController@displayFaculty', 'method'=>'POST']) }}
    <div class="input-group custom-search-form col-sm-8">
        <input type="text" class="form-control" placeholder="Search Faculty" name="faculty" id="faculty" required>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="Search">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
    
    <input type="hidden" name="hidden_eid" class="hidden_eid" id="hidden_eid">

    <div class="suggestion"></div>
    {{ Form::close() }}

    
    @if(isset($faculty))
        @if(isset($roles))
            <h3>Name : {{$faculty['first_name']}} {{$faculty['last_name']}}</h3><br>
            <h3 id="eid">EID : {{$faculty['e_id']}}</h3><br><br><hr>
            <h4>Assigned Roles</h4>

            <div class="input-group custom-search-form col-sm-4">
                <input type="number" class="form-control" placeholder="Add Role" name="add_role" id="add_role" required>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" name="addToList" onclick="addToList()">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div><br><br>
            {{ Form::open(['action' => 'AdminController@insertRole', 'method'=>'POST']) }}
            
            <ul class="list-group" id="list">
                @foreach($roles as $role)
                    <li class="list-group-item" id="role-{{$role['roles_id']}}">{{$role['roles_id']}}
                        <button class="btn btn-default pull-right" type="button" name="remove" onclick="remove(this.id)" id="{{$role['roles_id']}}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="row"><br><br>
                <button type="submit" class="btn btn-success col-sm-3 col-sm-offset-4">Save Changes</button>
            </div>
            <input type="hidden" name="hidden_eid_new" class="hidden_eid_new" id="hidden_eid_new">
            <input type="hidden" name="hidden_role" class="hidden_role" id="hidden_role">
            {{ Form::close() }}
        @endif
    @endif
    

@stop
<script type="text/javascript">
    var roles=[];
    // Real time Suggestions 
    $(document).ready(function()
    {
        $(document).on('keyup','#faculty',function()
        {
            var staff_name = $(this).val();
            var tr = $(this).parent().parent();
            if(staff_name.length > 1)
            {
                console.log(staff_name);
                $.ajax(
                {
                    type:'get',
                    url:'{!!URL::to('staff/faculty/match')!!}',
                    data:{'term': staff_name},
                    success:function(match){
                        console.log(match);
                        console.log(match['e_id']);
                        var cc_name = match['first_name']+' '+match['last_name'];
                        if(cc_name != "undefined undefined")
                        {
                            tr.find('.suggestion').html(cc_name);
                            tr.find('hidden_eid').val(match['e_id']);
                        }
                        else
                        {
                            tr.find('.suggestion').html("Not Found");
                        }
                        $(document).on('change','#faculty',function()
                        {
                            if(cc_name != "undefined undefined")
                            {
                                tr.find('#faculty').val(cc_name);
                                tr.find('.suggestion').html('');
                                tr.find('.hidden_eid').val(match['e_id']);
                            }
                        });
                    },
                    error:function(){
                        console.log("Error");
                    }
                });
            }
        });

        
    });

    function addToList()
    {
        var role = $('#add_role').val();
        var eid_full = $('#eid').html();
        var tr = $('#add_role').parent().parent().parent();
        tr.find('#list').append('<li class="list-group-item" id="new_role">'+role+'</li>');
        var eid = eid_full.substring(5, 9);
        console.log("eid = "+eid);
        console.log("role = "+role);
        $('#hidden_eid_new').val(eid);
        // $('#hidden_role').val(role);
        roles.push(role);
        $('#hidden_role').val(JSON.stringify(roles));
                
    }

    function remove(id)
    {
        var t = "#role-"+id;
        var rem = $(t).remove();
        var eid = $('#eid').html().substring(5, 9);
        $.ajax(
        {
            type:'get',
            url:'{!!URL::to('staff/admin/remove')!!}',
            data:{'eid': eid,'role':id},
            success:function(match)
            {
                alert(match);
            },
            error:function()
            {
                console.log("Error");
            }
        });
    }

</script>