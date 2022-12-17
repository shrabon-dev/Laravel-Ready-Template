@extends('layouts.masterdashboard')
@section('dashboard_body')
<div class="container my-32pt">
    <div class="row my-32pt">
        <div class="col-lg-12 d-flex align-items-center">
            <div class="flex" style="max-width: 100%">

                <div class="card m-0">

                    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-employee-name" data-lists-values="[&quot;js-lists-values-employee-name&quot;, &quot;js-lists-values-employer-name&quot;, &quot;js-lists-values-projects&quot;, &quot;js-lists-values-activity&quot;, &quot;js-lists-values-earnings&quot;]">

                        <table class="table mb-0 thead-border-top-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 37px;">ID</th>
                                    <th style="width: 37px;">Profile</th>
                                    <th style="width: 37px;">Name</th>
                                    <th style="width: 37px;">Email</th>
                                    <th style="width: 37px;">Phone Number</th>
                                    <th style="width: 37px;">Status</th>
                                    <th style="width: 37px;">Change St.</th>
                                    <th style="width: 37px;">Action</th>

                                </tr>
                            </thead>
                            <tbody class="list" id="toggle">




                                @forelse ($users->where('user_type','subadmin') as $user)
                                    <tr>
                                        <td class="text-50 js-lists-values-activity small">{{ $loop->index+1 }}</td>
                                        <td class="text-50 js-lists-values-activity small">
                                            @if ($user->profile_photo)
                                               <img width="50" height="50" src="{{ asset('uploads/profile') }}/{{ $user->profile_photo }}" alt="">
                                            @else
                                            <img width="50" height="50" src="{{ Avatar::create($user->name)->toBase64() }}" />
                                            @endif
                                        </td>
                                        <td class="text-50 js-lists-values-activity small">{{ $user->name }}</td>
                                        <td class="text-50 js-lists-values-activity small">{{ $user->email }}</td>
                                        <td class="text-50 js-lists-values-activity small">@if ($user->phone)
                                            {{ $user->phone }}
                                        @else
                                            N/A
                                        @endif </td>
                                        <td class="text-50 js-lists-values-activity small">
                                            @if ($user->status == 'active')
                                                <span style="font-size: 14px" class="badge text-white bg-primary">{{ $user->status }}</span>
                                            @else
                                                <span style="font-size: 14px" class="badge text-white  bg-danger">{{ $user->status }}</span>
                                            @endif

                                        </td>

                                        <style>
                                            input[type="checkbox"] {
  display: none;
}

label .switch {
  background: linear-gradient(90deg, #757f9a 0%, #d7dde8 100%);
  width:60px;
  border-radius: 50px;
  padding: 5px;
  position: relative;
  border: 2px #fff solid;
}

input[type="checkbox"] + label .bar {
  background: linear-gradient(90deg, #da4453 0%, #89216b 100%);
  height: 12px;
  width: 12px;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
}
input[type="checkbox"]:checked + label .bar {
  background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
  /* margin-left: auto; */
  transform: translateX(30px);
}

label:active .bar {
  /* background-color: red; */
  box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0.322);
}

                                        </style>

                                        <td class="text-50 js-lists-values-activity small">
                                            <form  action="{{ route('user.status.update',$user->id) }}" method="post">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <input type="checkbox" onchange="this.form.submit()" @if ($user->status == 'active')
                                                checked
                                                @endif  name="status" id="switch">
                                                <label for="switch">
                                                  <div class="switch">
                                                    <div class="bar"></div>
                                                  </div>
                                                </label>
                                            </form>
                                        </td>

                                        <td class="text-50 js-lists-values-activity small d-flex justify-content-start py-4 align-item-start">
                                            {{-- <a href="{{ Route('category.edit',$user->id) }}" style="color:rgb(0, 209, 216);font-size:16px;display:inline-block;margin-right:10px"> <i class="fas fa-edit"></i> </a> --}}
                                            <form  action="{{ route('user.list.delete',$user->id) }}" method="post">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <button class="delete" type="submit" style="background: transparent;border:none;color:red;font-size:16px">
                                                    <i class="fas fa-trash-alt"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" >
                                            <p class="bg-danger text-white text-center py-2">Here is no category yet!</strong>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script_body')

<script>
    $(document).ready(function(){
        $('.delete').click(function(e){

            var form =  $(this).closest("form");
            e.preventDefault();

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            }
            })
        })
    })
</script>

<script>
    @if(session('session'))

    $(document).ready(function(){

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        background:'#00BCC2',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('session') }}'
        })

    })
@endif
</script>
@endsection
